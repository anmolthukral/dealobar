"""
Example crawler that scrapes a demo product listing page (local or remote) and writes products to ../data/products.json
This is intentionally simple — adapt selectors for real e-commerce sites. Always respect robots.txt and ToS.
"""
import json
import requests
from bs4 import BeautifulSoup
from pathlib import Path

OUT = Path(__file__).resolve().parents[1] / 'data'
OUT.mkdir(exist_ok=True)

URL = 'https://web.archive.org/web/20190510120000/https://demo.opencart.com/index.php?route=product/category&path=20'  # archived demo site with sample products

resp = requests.get(URL, timeout=10)
resp.raise_for_status()

soup = BeautifulSoup(resp.text, 'lxml')
products = []
for card in soup.select('.product-layout'):
    a = card.select_one('h4 a')
    name = a.text.strip() if a else 'Unnamed'
    link = a['href'] if a and a.has_attr('href') else ''
    price_el = card.select_one('.price')
    # image (if any)
    img_el = card.select_one('img')
    img_src = ''
    if img_el and img_el.has_attr('src'):
        img_src = requests.compat.urljoin(URL, img_el['src'])
    price_text = price_el.text.strip() if price_el else ''
    # try extract price and ex-price
    prices = [p.strip() for p in price_text.split('\n') if p.strip()]
    if len(prices) == 2:
        # special price and old price
        try:
            special = float(prices[0].replace('$', '').strip())
            old = float(prices[1].replace('$', '').strip())
        except Exception:
            special = None
            old = None
    else:
        try:
            special = float(prices[0].replace('$', '').strip()) if prices else None
            old = None
        except Exception:
            special = None
            old = None

    discount = None
    if old and special:
        discount = round((old - special) / old * 100)

    products.append({
        'name': name,
        'link': link,
    'price': special,
        'old_price': old,
        'discount': discount,
    'image': img_src,
    })

OUT_FILE = OUT / 'products.json'
with OUT_FILE.open('w', encoding='utf-8') as f:
    json.dump(products, f, indent=2, ensure_ascii=False)

print(f'Wrote {len(products)} products to {OUT_FILE}')
