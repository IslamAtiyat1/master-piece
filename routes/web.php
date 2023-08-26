<?php

use Illuminate\Support\Facades\Auth;
// use App\Http\Livewire\Frontend\Product\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InboxController;
use App\Http\Livewire\Frontend\Profile;

Auth::routes();

Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {

Route::get('/', 'index');
Route::get('search', 'searchProducts');
Route::get('/collections','categories' );
Route::get('/collections/{category_slug}','products');
Route::get('/profile','profile')->name('profile');
Route::get('/collections/{category_slug}/{product_slug}','productView');


});

Route::controller(App\Http\Controllers\Frontend\CustomProductController::class)->group(function () {
    Route::get('/customcategories', 'customcategories' );
    Route::get('/customcategories/{category_slug}','create');
    Route::get('/customcategories/{category_slug}/{product_slug}', 'customproductView');
    Route::get('/customproducts', 'index');
    Route::get('/customproducts/create', 'create');
    Route::post('/customproducts', 'store');
    Route::get('customproducts/{category_slug}','index')->name('custom_products.index');


    });

Route::get('/signup', [SignUpController::class, 'showSignUpForm'])->name('signup');
Route::post('/signup', [SignUpController::class, 'signUp'])->name('signup.post');


Route::post('/add-to-cart/{productId}', [App\Http\Livewire\Frontend\Product\View::class, 'addToCart'])->name('addToCart');

// Route::get('/profile', Profile::class)->name('profile');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// search


Route::middleware (['auth'])->group (function () {
    Route::get('wishlist', [App\Http\Controllers\Frontend\wishlistController::class, 'index']);
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
Route::match(['get', 'post'], 'checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index'])->name('checkout');
    Route::get('/payment', [App\Http\Controllers\Frontend\PaymentController::class, 'index'])->name('payment.index');
    Route::post('/payment/store', [App\Http\Controllers\Frontend\PaymentController::class, 'store'])->name('payment.store');
     Route::get('orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
     Route::get('orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class, 'show']);
//     Route::get('profile', [App\Http\Controllers\Frontend\UserController::class, 'show']);
    });
    Route::get('thank-you', [App\Http\Controllers\Frontend\FrontendController::class, 'thankyou'])->name('thankyou');


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('profile', [App\Http\Controllers\Admin\DashboardController::class, 'profile']);
// Route::get('/profile','profile')->name('profile');

    // Category Routes
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category)/edit', 'edit');
        Route::put('/category/[category}', 'update');
    });
    //
    Route::controller(App\Http\Controllers\Admin\CustomCategoryController::class)->group(function () {
        Route::get('/customcategory', 'index');
        Route::get('/customcategory/create', 'create');
        Route::post('/customcategory', 'store');
        Route::get('/customcategory/{category}/edit', 'edit');
        Route::put('/customcategory/{category}', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('products/{product_id}/delete', 'destroy');
        Route::get('product-image/{product_image_id}/delete', 'destroyImage');

        Route::post('product-color/{prod_color_id}', 'updateProdColorQty');
        Route::get('product-color/{prod_color_id}/delete', 'deleteProdColor');
    });
    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/create', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color_id}', 'update');
        Route::get('colors/{color_id}/delete', 'destroy');

    });
//size
Route::controller(App\Http\Controllers\Admin\SizeController::class)->group(function () {
    Route::get('/size', 'index');
    Route::get('/size/create', 'create');
    Route::post('/size/create', 'store');

});
//orders
Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
    Route::get('/orders', 'index');
    Route::get('/orders/{orderId}', 'show');
    Route::put('/orders/{orderId}', 'updateOrderStatus');
});
});
