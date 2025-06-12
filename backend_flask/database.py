from supabase import create_client
from dotenv import load_dotenv
import os

# Load environment variables
load_dotenv()

SUPABASE_URL = os.getenv("SUPABASE_URL")
SUPABASE_KEY = os.getenv("SUPABASE_KEY")

# Debugging - Print values
print("Supabase URL:", SUPABASE_URL)
print("Supabase Key:", SUPABASE_KEY)

if not SUPABASE_URL or not SUPABASE_KEY:
    raise ValueError("❌ Supabase URL or Key not found! Check your .env file.")

supabase = create_client(SUPABASE_URL, SUPABASE_KEY)

def update_guests_event_id(default_event_id):
    """
    Update guests with null event_id to the given default_event_id.
    """
    guests = supabase.table('guests').select('*').is_('event_id', None).execute().data
    for guest in guests:
        supabase.table('guests').update({'event_id': default_event_id}).eq('id', guest['id']).execute()
    print(f"Updated {len(guests)} guests with event_id = {default_event_id}")

def insert_event_with_guests(event_data, guests):
    """
    Insert an event and associated guests with correct event_id foreign key.
    """
    result = supabase.table('event').insert(event_data).execute()
    event_id = result.data[0]['id'] if result.data else None
    if event_id:
        for guest in guests:
            supabase.table('guests').insert({
                'name': guest.get('name'),
                'phone': guest.get('phone'),
                'email': guest.get('email'),
                'qr_code': guest.get('qr_code', None),
                'event_id': event_id
            }).execute()
    return event_id

if __name__ == "__main__":
    # Insert a test event
    test_event = {
        "event_name": "Test Event",
        "place": "Test Venue",
        "date": "2024-06-10"
    }
    print("Inserting test event:", test_event)
    result = supabase.table('event').insert(test_event).execute()
    event_id = result.data[0]['id'] if result.data else None
    # Insert a test guest with event_id
    test_guest = {"name": "Manual Script User", "phone": "5551234567", "email": "scriptuser@example.com", "event_id": event_id}
    print("Inserting test guest:", test_guest)
    supabase.table('guests').insert(test_guest).execute()
    # Retrieve all guests
    guests = supabase.table('guests').select('*').execute().data
    
    # Retrieve all events
    events = supabase.table('event').select('*').execute().data
    print("All events in database:")
    for event in events:
        print(event)
        
    print("All guests in database:")
    
    for guest in guests:
        print(guest)
