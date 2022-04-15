<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',\App\Http\Livewire\HomeComponent::class)->name('home');
Route::get('/shop',\App\Http\Livewire\ShopComponent::class)->name('shop');
Route::get('/checkout',\App\Http\Livewire\CheckoutComponent::class)->name('checkout');
Route::get('/cart',\App\Http\Livewire\CartComponent::class)->name('cart');
Route::get('/wishlist',\App\Http\Livewire\WishlistComponent::class)->name('wishlist');
Route::get('/thankYou',\App\Http\Livewire\ThankyouComponent::class)->name('thankYou');
Route::get('singleCategory/{category:slug}',\App\Http\Livewire\SingleCategoryComponent::class)->name('singleCategory');
Route::get('singleProduct/{product:slug}',\App\Http\Livewire\SingleProductComponent::class)->name('singleProduct');



Route::middleware(['auth:sanctum','admin'])->prefix('admin')->group(function (){

        Route::get('categories',\App\Http\Livewire\Admin\AdminCategoryComponent::class)->name('admin.categories');
        Route::get('category/add',\App\Http\Livewire\Admin\AdminAddCategoryComponent::class)->name('admin.category.add');
        Route::get('category/edit/{category:slug}',\App\Http\Livewire\Admin\AdminEditCategoryComponent::class)->name('admin.category.edit');

    Route::get('products',\App\Http\Livewire\Admin\AdminProductComponent::class)->name('admin.products');
    Route::get('product/add',\App\Http\Livewire\Admin\AdminAddProductComponent::class)->name('admin.product.add');
    Route::get('product/edit/{product:slug}',\App\Http\Livewire\Admin\AdminEditProductComponent::class)->name('admin.product.edit');

    Route::get('homeSlider',\App\Http\Livewire\Admin\AdminHomeSliderComponent::class)->name('admin.HomeSlider');
    Route::get('homeSlider/add',\App\Http\Livewire\Admin\AdminAddHomeSliderComponent::class)->name('admin.HomeSlider.add');
    Route::get('homeSlider/edit/{homeSlider}',\App\Http\Livewire\Admin\AdminEditHomeSliderComponent::class)->name('admin.HomeSlider.edit');
    Route::get('onSale',\App\Http\Livewire\Admin\AdminSaleComponent::class)->name('admin.onSale');
    Route::get('HomeCategory',\App\Http\Livewire\Admin\AdminHomeCategoryComponent::class)->name('admin.homeCategory');

    Route::get('coupons',\App\Http\Livewire\Admin\AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('coupon/add',\App\Http\Livewire\Admin\AdminAddCouponComponent::class)->name('admin.coupon.add');
    Route::get('coupon/edit/{coupon}',\App\Http\Livewire\Admin\AdminEditCouponComponent::class)->name('admin.coupon.edit');
    Route::get('orders',\App\Http\Livewire\Admin\AdminOrdersComponent::class)->name('admin.orders');
    Route::get('orderDetails/{order}',\App\Http\Livewire\Admin\AdminOrderDetailComponent::class)->name('admin.orderDetails');
});



Route::middleware(['auth:sanctum', 'verified'])->group(function (){

    Route::get('dashboard',function (){
        return view('dashboard');
    })->name('dashboard');

    Route::get('user/myOrders',\App\Http\Livewire\User\UserOrdersComponent::class)->name('user.orders');
    Route::get('user/orderDetails/{order}',\App\Http\Livewire\User\UserOrderDetailsComponent::class)->name('user.orderDetails');

});






