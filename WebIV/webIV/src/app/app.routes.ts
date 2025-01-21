import { Routes } from '@angular/router';
import { ProductListComponent } from './products/product-list/product-list.component';
import { ProductAddComponent } from './products/product-add/product-add.component';
import { ProductEditComponent } from './products/product-edit/product-edit.component';

export const routes: Routes = [
    { path: 'products', component: ProductListComponent },
    { path: 'products/add', component: ProductAddComponent },
    { path: 'products/edit/:id', component: ProductEditComponent },
    { path: '', redirectTo: 'products', pathMatch: 'full' },
    { path: '**', redirectTo: 'products' }
];
