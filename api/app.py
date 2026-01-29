from flask import Flask, jsonify
from flask_cors import CORS
from pathlib import Path

app = Flask(__name__)
CORS(app)

DATA = Path(__file__).resolve().parents[1] / 'data' / 'products.json'

@app.route('/products')
def products():
    if not DATA.exists():
        return jsonify([])
    import json
    return jsonify(json.loads(DATA.read_text(encoding='utf-8')))

if __name__ == '__main__':
    app.run(debug=True)
