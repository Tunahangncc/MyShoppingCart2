<?php

use Illuminate\Support\Facades\App;

//Customer Controller
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShoppingBagController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\LanguageController;

//Admin Controller
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductOperationsController;
use App\Http\Controllers\AdminProfileSettingsController;
use App\Http\Controllers\AdminWebsiteUsersController;
use App\Http\Controllers\AdminCategoryOperationsController;

Route::get('/', [GeneralController::class, 'redirectHome'])->name('RedirectHome');


Route::group(['prefix' => 'customer'], function (){
    Route::name('customer')->group(function () {
        Route::get('home', [CustomerController::class, 'showHomePage'])->name('Home');

        Route::get('products', [CustomerController::class, 'showProductsPage'])->name('Products');

        Route::get('products/details/{id}', [ProductController::class, 'showProductDetails'])->name('ProductDetails');

        Route::get('about-us', [CustomerController::class, 'showAboutUsPage'])->name('AboutUs');

        Route::get('contact', [CustomerController::class, 'showContactPage'])->name('Contact');

        Route::get('products/category/{id}', [CategoryController::class, 'showSelectedCategory'])->name('ShowSelectedCategory');

        Route::get('products/top-user/{id}', [CustomerController::class, 'showTopUserProducts'])->name('ShowTopUserProducts');

        Route::middleware(['isLogin'])->group(function () {
            //Login
            Route::get('login', [CustomerController::class, 'showLoginPage'])->name('Login');
            Route::post('login', [AuthenticationController::class, 'customerLoginPost'])->name('LoginPost');

            Route::get('register', [CustomerController::class, 'showRegisterPage'])->name('Register');
            Route::post('register', [AuthenticationController::class, 'customerRegisterPost'])->name('RegisterPost');
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

    Route::get('switch/language/{locale}', [LanguageController::class, 'setLanguage'])->name('SwitchLanguage');
});

Route::group(['prefix' => 'admin'], function () {
    Route::name('admin')->group(function () {
        Route::middleware(['isLogin'])->group(function () {
            //Login
            Route::get('login', [AdminController::class, 'showLoginPage'])->name('Login');
            Route::post('login', [AuthenticationController::class, 'adminLoginPost'])->name('LoginPost');
        });

        Route::middleware(['isAdmin'])->group(function () {
            Route::get('dashboard', [AdminController::class, 'showDashboardPage'])->name('Dashboard');

            Route::get('profile/customer/{id}', [AdminController::class, 'showCustomerProfilePage'])->name('CustomerProfilePage');
            Route::get('profile/admin/{id}', [AdminController::class, 'showAdminProfilePage'])->name('AdminProfilePage');

            Route::get('product/details/{id}', [AdminController::class, 'showSelectedProductDetailsPage'])->name('SelectedProductDetails');

            Route::get('profile-settings', [AdminController::class, 'showProfileSettingsPage'])->name('ProfileSettings');
            Route::put('profile-settings', [AdminProfileSettingsController::class, 'updateProfile'])->name('ProfileSettingsPut');

            Route::get('website-users', [AdminController::class, 'showWebsiteUsersPage'])->name('WebsiteUsers');
            Route::get('website-users/delete/admin/{id}', [AdminWebsiteUsersController::class, 'deleteAdmin'])->name('DeleteAdmin');
            Route::get('website-users/delete/user/{id}', [AdminWebsiteUsersController::class, 'deleteUser'])->name('DeleteUser');

            //Product Operations
            Route::get('product-operations', [AdminController::class, 'showProductOperationsPage'])->name('ProductOperations');

            Route::post('product-operations/create-product', [AdminProductOperationsController::class, 'createProduct'])->name('ProductOperationsCreateProduct');

            Route::get('product-operations/edit-product/{id}', [AdminController::class, 'showSelectedProductEditPage'])->name('ProductOperationsEdit');
            Route::put('product-operations/edit-product/{id}', [AdminProductOperationsController::class, 'updateProduct'])->name('ProductOperationsEditPut');

            Route::delete('product-operations/delete-product/{id}', [AdminProductOperationsController::class, 'deleteProduct'])->name('ProductOperationsDeleteProduct');

            Route::get('product-operations/go-back', [AdminController::class, 'returnProductOperations'])->name('ReturnProductOperations');

            //Category Operations
            Route::get('category-operations', [AdminController::class, 'showCategoryOperationsPage'])->name('CategoryOperations');

            Route::post('category-operations/create-category', [AdminCategoryOperationsController::class, 'createCategory'])->name('CategoryOperationsCreateCategory');

            Route::get('category-operations/edit-category/{id}', [AdminController::class, 'showSelectedCategoryEditPage'])->name('CategoryOperationsEdit');
            Route::put('category-operations/edit-category/{id}', [AdminCategoryOperationsController::class, 'editCategory'])->name('CategoryOperationsEditPut');

            Route::delete('category-operations/delete-category/{id}', [AdminCategoryOperationsController::class, 'deleteCategory'])->name('CategoryOperationsDeleteCategory');

            Route::get('category-operations/go-back', [AdminController::class, 'returnCategoryOperations'])->name('ReturnCategoryOperations');

            Route::get('sign-out', [AuthenticationController::class, 'signOut'])->name('SignOut');
        });
    });
});
