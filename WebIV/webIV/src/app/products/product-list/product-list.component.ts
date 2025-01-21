import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { ProductService } from '../product.service';
import { Product } from './../product.model';

@Component({
  selector: 'app-product-list',
  standalone: true, // Standalone komponens
  imports: [CommonModule, RouterModule], // Hozzáadjuk a szükséges modulokat
  templateUrl: './product-list.component.html',
  styleUrls: ['./product-list.component.css']
})
export class ProductListComponent implements OnInit {
  products: Product[] = [];

  constructor(private productService: ProductService) { }

  ngOnInit(): void {
    this.productService.getProducts().subscribe(data => {
      this.products = data;
    });
  }

  deleteProduct(id: number): void {
    this.productService.deleteProduct(id).subscribe(success => {
      if (success) {
        this.products = this.products.filter(product => product.id !== id);
      }
    });
  }
}
