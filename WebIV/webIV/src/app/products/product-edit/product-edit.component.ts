import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { ProductService } from '../product.service';
import { Product } from '../product.model';

@Component({
  selector: 'app-product-edit',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './product-edit.component.html',
  styleUrls: ['./product-edit.component.css']
})
export class ProductEditComponent implements OnInit {
  product: Product | undefined;

  constructor(
    private route: ActivatedRoute,
    private productService: ProductService,
    private router: Router
  ) { }

  ngOnInit(): void {
    // Termék betöltése az ID alapján
    const id = Number(this.route.snapshot.paramMap.get('id'));
    this.productService.getProductById(id).subscribe(data => {
      this.product = data;
    });
  }

  saveProduct(): void {
    if (this.product) {
      this.productService.updateProduct(this.product).subscribe(() => {
        this.router.navigate(['/products']); // Visszairányítás a terméklistára
      });
    }
  }

  cancelEdit(): void {
    this.router.navigate(['/products']); // Mégse gomb -> vissza a listára
  }
}
