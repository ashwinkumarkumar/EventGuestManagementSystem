from flask import Flask, jsonify, request
from flask_cors import CORS
from database import supabase  # Import Supabase connection
import qrcode
from io import BytesIO
import base64
from Core.qrcode_sub.qr_code_generator import generate_qr_codes_from_db

app = Flask(__name__)
CORS(app)

@app.route("/api/hello", methods=["GET"])
def hello():
    return jsonify({"message": "Flask is connected!"})

@app.route("/api/guests", methods=["GET"])
def get_guests():
    response = supabase.table("guests").select("*").execute()
    return jsonify(response.data)

@app.route('/api/guests', methods=['POST'])
def add_guests():
    data = request.json
    guests = data.get('guests', [])
    print("Received guests payload:", guests)  # Debug log
    # Get valid event ids
    events = supabase.table('event').select('id').execute().data
    valid_event_ids = {event['id'] for event in events}
    # Validate all guests have valid event_id
    for guest in guests:
        event_id = guest.get('event_id')
        try:
            event_id_int = int(event_id)
        except Exception:
            print(f"Invalid event_id type for guest: {guest}")  # Debug log
            return jsonify({'status': 'error', 'message': 'event_id must be an integer'}), 400
        if not event_id or event_id_int not in valid_event_ids:
            print(f"Invalid event_id for guest: {guest}")  # Debug log
            return jsonify({'status': 'error', 'message': 'Valid event_id is required for each guest'}), 400
    # Prepare guest records for batch insert
    guest_records = [{
        'name': guest.get('name'),
        'phone': guest.get('phone'),
        'email': guest.get('email'),
        'qr_code': guest.get('qr_code', None),
        'event_id': guest.get('event_id')
    } for guest in guests]
    try:
        # Insert guests one by one to isolate errors
        for guest in guest_records:
            supabase.table('guests').insert(guest).execute()
    except Exception as e:
        print(f"Error inserting guests: {e}")  # Debug log
        return jsonify({'status': 'error', 'message': f'Failed to insert guests: {str(e)}'}), 500
    # Trigger QR code generation after guests are inserted
    generate_qr_codes_from_db()
    return jsonify({'status': 'success'})

@app.route('/api/generate_qr', methods=['POST'])
def generate_qr():
    data = request.json
    value = data.get('value', '')
    qr = qrcode.make(value)
    buffered = BytesIO()
    qr.save(buffered, format="PNG")
    img_str = base64.b64encode(buffered.getvalue()).decode("utf-8")
    return jsonify({'image': img_str})

@app.route('/api/generate_guest_qrs', methods=['POST'])
def generate_guest_qrs():
    data = request.json
    guests = data.get('guests', [])
    results = []
    for guest in guests:
        name = guest.get('name', '')
        phone = guest.get('phone', '')
        email = guest.get('email', '')
        value = f"Name: {name}, Phone: {phone}, Email: {email}"
        qr = qrcode.make(value)
        buffered = BytesIO()
        qr.save(buffered, format="PNG")
        img_str = base64.b64encode(buffered.getvalue()).decode("utf-8")
        results.append({
            'name': name,
            'phone': phone,
            'email': email,
            'qr_image': img_str
        })
    return jsonify({'guests': results})

@app.route('/api/generate_qrs_from_db', methods=['POST'])
def generate_qrs_from_db():
    guests = supabase.table('guests').select('*').execute().data
    results = []
    for guest in guests:
        name = guest.get('name', '')
        phone = guest.get('phone', '')
        email = guest.get('email', '')
        value = f"Name: {name}, Phone: {phone}, Email: {email}"
        qr = qrcode.make(value)
        buffered = BytesIO()
        qr.save(buffered, format="PNG")
        img_str = base64.b64encode(buffered.getvalue()).decode("utf-8")
        # Store QR code in the database
        supabase.table('guests').update({'qr_code': img_str}).eq('id', guest['id']).execute()
        results.append({
            'name': name,
            'phone': phone,
            'email': email,
            'qr_code': img_str
        })
    return jsonify({'guests': results})

@app.route('/api/test_db', methods=['GET'])
def test_db():
    # Insert a test guest
    test_guest = {"name": "Test User", "phone": "1234567890", "email": "test@example.com"}
    supabase.table('guests').insert(test_guest).execute()
    # Retrieve all guests
    guests = supabase.table('guests').select('*').execute().data
    return jsonify({'guests': guests})

@app.route('/api/events', methods=['POST'])
def create_event():
    data = request.json
    # Expecting: event_name (text), place (text), date (date or timestamp), guests (list)
    event_name = data.get('event_name')
    place = data.get('place')
    date = data.get('date')
    guests = data.get('guests', [])
    # Insert event into the event table
    result = supabase.table('event').insert({
        'event_name': event_name,
        'place': place,
        'date': date
    }).execute()
    event_id = result.data[0]['id'] if result.data else None
    # Insert guests with event_id
    for guest in guests:
        supabase.table('guests').insert({
            'name': guest.get('name'),
            'phone': guest.get('phone'),
            'email': guest.get('email'),
            'qr_code': guest.get('qr_code', None),
            'event_id': event_id
        }).execute()
    return jsonify({'status': 'success', 'event': result.data[0] if result.data else None, 'event_id': event_id})

@app.route('/api/events/<int:event_id>/guests', methods=['GET'])
def get_guests_by_event(event_id):
    response = supabase.table('guests').select('*').eq('event_id', event_id).execute()
    return jsonify(response.data)

if __name__ == "__main__":
    app.run(debug=True)
