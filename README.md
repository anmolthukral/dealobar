Dealobar

Simple e-commerce aggregator prototype.

Structure:

- scripts/: Python crawlers that scrape product lists (examples provided)
- api/: small Flask app serving scraped products as JSON
- frontend/: Vite + React CSR app that fetches products and displays product cards (links open target page)

How to run:

- Run crawlers to generate `data/products.json`:

  - python3 -m venv venv
  - source venv/bin/activate
  - pip install -r scripts/requirements.txt
  - python scripts/crawl_demo.py

- Start API server (optional):

  - cd api
  - pip install -r requirements.txt
  - FLASK_APP=app.py flask run

- Start frontend:
  - cd frontend
  - npm install
  - npm run dev

Note: Crawlers are basic examples; adapt selectors to real e-commerce sites and obey robots.txt and terms of service.

Additional notes:

- The crawler now attempts to extract product image URLs (if present) and stores them in `data/products.json` as `image`.
- The API server enables CORS so the frontend can fetch `/products` during development.
- The frontend has a Vite proxy config so calls to `/products` are forwarded to `http://localhost:5000` in dev.
