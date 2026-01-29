# Simple dev helpers for dealobar

.PHONY: venv crawl api frontend all

venv:
	python3 -m venv .venv
	.source .venv/bin/activate && pip install -r scripts/requirements.txt && pip install -r api/requirements.txt

crawl: venv
	.source .venv/bin/activate && python scripts/crawl_demo.py

api: venv
	.source .venv/bin/activate && FLASK_APP=api/app.py flask run

frontend:
	cd frontend && npm install && npm run dev

all: crawl api frontend
