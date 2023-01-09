<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin\AdminDashboradComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserDashboradComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',HomeComponent::class)->name('home.index');
Route::get ('/shop',ShopComponent::class)->name('shop');
Route::get ('/cart',CartComponent::class)->name('shop.cart');
Route::get ('/checkout',CheckoutComponent::class)->name('shop.checkout');
Route::get ('/product/{slug}',DetailsComponent::class)->name('product.details');
Route::middleware('auth')->group(function () {
    Route::get('/user/dashborad',UserDashboradComponent::class)->name('user.dashborad');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','authadmin')->group(function () {
    Route::get('/admin/dashborad',AdminDashboradComponent::class)->name('admin.dashborad');
    
});

require __DIR__.'/auth.php';