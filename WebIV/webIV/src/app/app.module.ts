import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { RouterModule } from '@angular/router'; // IMPORTÁLD A RouterModule-T
import { FormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { routes } from './app.routes'; // ÚTVONALAK IMPORTÁLÁSA
import { ProductsModule } from '../../../webIV/src/app/products/product.model';

@NgModule({
    declarations: [AppComponent],
    imports: [
        BrowserModule,
        RouterModule.forRoot(routes), // ÚTVONALAK REGISZTRÁLÁSA
        FormsModule,
        ProductsModule
    ],
    providers: [],
    bootstrap: [AppComponent]
})
export class AppModule { }
