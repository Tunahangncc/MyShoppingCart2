<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShoppingBagController;
use App\Http\Controllers\ContactMessageController;

Route::get('/', [GeneralController::class, 'redirectHome'])->name('RedirectHome');


Route::group(['prefix' => 'customer'], function (){
    Route::name('customer')->group(function () {
        Route::get('home', [CustomerController::class, 'showHomePage'])->name('Home');

        Route::get('products', [CustomerController::class, 'showProductsPage'])->name('Products');

        Route::get('products/details/{id}', [ProductController::class, 'showProductDetails'])->name('ProductDetails');

        Route::get('about-us', [CustomerController::class, 'showAboutUsPage'])->name('AboutUs');

        Route::get('contact', [CustomerController::class, 'showContactPage'])->name('Contact');

        Route::get('products/category/{id}', [CategoryController::class, 'showSelectedCategory'])->name('ShowSelectedCategory');

        Route::middleware(['isLogin'])->group(function () {
            //Login
            Route::get('login', [CustomerController::class, 'showLoginPage'])->name('Login');
            Route::post('login', [AuthenticationController::class, 'customerLoginPost'])->name('LoginPost');

            Route::get('register', [CustomerController::class, 'showRegisterPage'])->name('Register');
        });

        Route::middleware(['isCustomer'])->group(function () {
            Route::get('profile', [CustomerController::class, 'showProfilePage'])->name('Profile');

            //Profile Route
            Route::get('profile/edit', [CustomerController::class, 'showProfileEditPage'])->name('ProfileEdit');
            Route::put('profile/edit', [ProfileController::class, 'EditProfile'])->name('ProfileEditPut');

            Route::get('profile/address', [CustomerController::class, 'showProfileAddressPage'])->name('ProfileAddress');
            Route::put('profile/address', [ProfileController::class, 'EditAddress'])->name('ProfileEditAddress');

            Route::get('profile/add-product', [CustomerController::class, 'showProfileAddProductPage'])->name('ProfileAddProduct');
            Route::post('profile/add-product', [ProfileController::class, 'AddProduct'])->name('ProfileAddProductPost');

            Route::get('profile/edit-product', [CustomerController::class, 'showProfileEditProductPage'])->name('ProfileEditProduct');
            Route::get('profile/edit-product/{id}', [CustomerController::class, 'showProfileEditSelectedProductPage'])->name('ProfileEditSelectedProduct');
            Route::put('profile/edit-product/{id}', [ProfileController::class, 'EditSelectedProduct'])->name('ProfileEditSelectedProductPut');

            Route::delete('profile/delete-product/{id}', [ProfileController::class, 'DeleteProduct'])->name('ProfileDeleteProduct');

            Route::get('profile/message-box', [CustomerController::class, 'showMessageBoxPage'])->name('ProfileMessageBox');
            Route::delete('profile/message-box/delete-message/{id}', [ProfileController::class, 'DeleteMessage'])->name('ProfileMessageBoxMessageDelete');

            Route::get('profile/shopping-bag', [CustomerController::class, 'showShoppingBagPage'])->name('ProfileShoppingBag');
            Route::get('profile/shopping-bag/order-now', [ShoppingBagController::class, 'orderNow'])->name('ProfileShoppingBagOrderNow');

            //Product Description Page
            Route::post('products/add-product/{id}', [ProductController::class, 'addProductToCart'])->name('AddProductToCart');

            Route::get('product/like-product', [ProductController::class, 'likeProduct'])->name('LikeProduct');


            //Contact Message Page
            Route::post('contact', [ContactMessageController::class, 'sendMessage'])->name('SendMessagePost');
        });
    });

    Route::get('sign-out', [AuthenticationController::class, 'signOut'])->name('SignOut');
});
