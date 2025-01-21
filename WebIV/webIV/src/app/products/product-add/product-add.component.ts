import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router'; // RouterModule importálása
import { Router } from '@angular/router';
import { ProductService } from '../product.service';
import { Product } from '../product.model';

@Component({
  selector: 'app-product-add',
  standalone: true,
  imports: [CommonModule, FormsModule, RouterModule], // RouterModule hozzáadása
  templateUrl: './product-add.component.html',
  styleUrls: ['./product-add.component.css']
})
export class ProductAddComponent {
  newProduct: Product = { id: 0, name: '', price: 0, description: '' };

  constructor(private productService: ProductService, private router: Router) { }

  addProduct(): void {
    this.productService.addProduct(this.newProduct).subscribe(() => {
      this.router.navigate(['/products']);
    });
  }
}
