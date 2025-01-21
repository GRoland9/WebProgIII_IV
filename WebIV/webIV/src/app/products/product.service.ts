import { Injectable } from '@angular/core';
import { Observable, of } from 'rxjs';
import { Product } from './product.model';

@Injectable({
  providedIn: 'root'
})
export class ProductService {
  private products: Product[] = [
    { id: 1, name: 'Termék 1', price: 1000, description: 'Ez az első termék.' },
    { id: 2, name: 'Termék 2', price: 2000, description: 'Ez a második termék.' },
    { id: 3, name: 'Termék 3', price: 3000, description: 'Ez a harmadik termék.' }
  ];

  // Termékek lekérdezése
  getProducts(): Observable<Product[]> {
    return of(this.products);
  }

  // Egyetlen termék lekérdezése ID alapján
  getProductById(id: number): Observable<Product | undefined> {
    const product = this.products.find(p => p.id === id);
    return of(product);
  }

  // Új termék hozzáadása
  addProduct(product: Product): Observable<Product> {
    product.id = this.products.length + 1;
    this.products.push(product);
    return of(product);
  }

  // Termék frissítése
  updateProduct(updatedProduct: Product): Observable<Product> {
    const index = this.products.findIndex(p => p.id === updatedProduct.id);
    if (index !== -1) {
      this.products[index] = updatedProduct;
      return of(updatedProduct);
    }
    return of(undefined as unknown as Product);
  }

  // Termék törlése
  deleteProduct(id: number): Observable<boolean> {
    const index = this.products.findIndex(p => p.id === id);
    if (index !== -1) {
      this.products.splice(index, 1);
      return of(true);
    }
    return of(false);
  }
}
