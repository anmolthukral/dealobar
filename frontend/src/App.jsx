import React, {useEffect, useState} from 'react'

export default function App(){
  const [products, setProducts] = useState([])
  useEffect(()=>{
    fetch('/products')
      .then(r=>r.json())
      .then(data=> setProducts(data))
      .catch(()=> setProducts([]))
  },[])

  const filtered = products.filter(p=> (p.discount||0) >= 50)

  return (
    <div className="app">
      <header><h1>Dealobar</h1><p>Products with discount ≥ 50%</p></header>
      <main className="grid">
            {filtered.map((p,i)=> (
              <a key={i} className="card" href={p.link} target="_blank" rel="noreferrer">
                {p.image ? (
                  <img src={p.image} alt="" className="thumb"/>
                ) : (
                  <div className="thumb placeholder">No image</div>
                )}
                <h3>{p.name}</h3>
                <div className="meta">{p.discount ? p.discount + '% off' : '---'}</div>
                <div className="price">{p.price ? '$'+p.price : 'Price N/A'}</div>
              </a>
            ))}
        {filtered.length === 0 && <div className="empty">No products with ≥50% discount</div>}
      </main>
    </div>
  )
}
