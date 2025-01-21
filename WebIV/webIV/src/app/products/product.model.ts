import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { CommonModule } from '@angular/common';
import { ProductListComponent } from './product-list/product-list.component';
import { ProductAddComponent } from './product-add/product-add.component';
import { ProductEditComponent } from './product-edit/product-edit.component';

@NgModule({
    imports: [
        CommonModule,
        RouterModule, // Útvonalak támogatása
        ProductListComponent, // Standalone komponens importálása
        ProductAddComponent,  // Standalone komponens importálása
        ProductEditComponent  // Standalone komponens importálása
    ]
})
export class ProductsModule { }

// src/app/products/product.model.ts
export interface Product {
    id: number;
    name: string;
    price: number;
    description: string;
}
