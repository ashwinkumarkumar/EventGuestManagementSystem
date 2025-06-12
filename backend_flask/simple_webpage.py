from flask import Flask

app = Flask(__name__)

@app.route('/')
def home():
    return """
    <html>
        <head>
            <title>Simple Flask Webpage</title>
        </head>
        <body>
            <h1>Welcome to the Simple Flask Webpage!</h1>
            <p>This is a basic Flask app serving a simple webpage.</p>
        </body>
    </html>
    """

if __name__ == '__main__':
    app.run(debug=True)
