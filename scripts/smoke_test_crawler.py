import json
from scripts.crawl_demo import run_crawl

if __name__ == '__main__':
    # run the crawl and check output
    run_crawl()
    with open('data/products.json') as f:
        data = json.load(f)
    print(f'Products written: {len(data)}')
    # basic check
    if not data:
        print('No products found — check selectors or target URL')
    else:
        print('Sample product:', data[0].get('name'))
