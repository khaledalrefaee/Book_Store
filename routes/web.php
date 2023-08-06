<?php

use App\Http\Controllers\back\BookController;
use App\Http\Controllers\back\CategoryController;
use App\Http\Controllers\back\OrderController;
use App\Http\Controllers\back\ShipController;
use App\Http\Controllers\back\SliderController;
use App\Http\Controllers\back\UserController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\CheckoutController;
use App\Http\Controllers\front\homeController;
use App\Models\back\Order;
use App\Models\Ship_city;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});


Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {

    return view('backend.index');
})->name('dashboard');


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {


    return view('front.front_index');
});


Route::group(['prefix'=> 'admin'], function(){

    Route::get('/logout',[AdminController::class,'destroy'])->name('Logout');
    //book

    Route::get('/books',[BookController::class,'index'])->name('all.books');
    Route::get('/books/create',[BookController::class,'create'])->name('create.book');
    Route::post('/books/store',[BookController::class,'store'])->name('store.book');
    Route::get('/books/show/{id}',[BookController::class,'show'])->name('book.show');
    Route::get('/books/edit/{id}',[BookController::class,'edit'])->name('book.edit');
    Route::POST('/book/update{id}',[BookController::class,'update'])->name('book.update');
    Route::get('/books/destroy/{id}',[BookController::class,'destroy'])->name('book.destroy');

    //user

    Route::get('/users',[UserController::class,'index'])->name('all.users');
    Route::get('/user/show/{id}',[UserController::class,'show'])->name('user.show');
    Route::get('/user/destroy/{id}',[UserController::class,'destroy'])->name('user.destroy');

    //category

    Route::get('Category/categories',[CategoryController::class,'index'])->name('Category');
    Route::get('Category/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('Category/store',[CategoryController::class,'store'])->name('catygory.store');
    Route::get('catygory/show/{id}',[CategoryController::class,'show'])->name('catygory.show');
    Route::get('catygory/edite/{id}',[CategoryController::class,'edit'])->name('catygory.edite');
    Route::post('category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('catygory/delete/{id}',[CategoryController::class,'destroy'])->name('catygory.destroy');

    //slider

    Route::get('/sliders',[SliderController::class,'index'])->name('all.sliders');
    Route::get('/slider/create',[SliderController::class,'create'])->name('create.slider');
    Route::post('/slider/store',[SliderController::class,'store'])->name('slider.store');
    Route::get('/slider/show/{id}',[SliderController::class,'show'])->name('slider.show');
    Route::get('/slider/edit/{id}',[SliderController::class,'edit'])->name('slider.edite');
    Route::POST('/slider/update{id}',[SliderController::class,'update'])->name('slider.update');
    Route::get('/slider/destroy/{id}',[SliderController::class,'destroy'])->name('slider.destroy');

    //ship

    Route::get('/division/view', [ShipController::class, 'DivisionView'])->name('manage-cities');

    Route::post('/division/store', [ShipController::class, 'DivisionStore'])->name('division.store');

    Route::get('/division/edit/{id}', [ShipController::class, 'DivisionEdit'])->name('division.edit');

    Route::post('/division/update/{id}', [ShipController::class, 'DivisionUpdate'])->name('division.update');

    Route::get('/division/delete/{id}', [ShipController::class, 'DivisionDelete'])->name('division.delete');

//addres

    Route::get('/district/view', [ShipController::class, 'DistrictView'])->name('manage-addresses');

    Route::post('/district/store', [ShipController::class, 'DistrictStore'])->name('district.store');

    Route::get('/district/edit/{id}', [ShipController::class, 'DistrictEdit'])->name('district.edit');

    Route::post('/district/update/{id}', [ShipController::class, 'DistrictUpdate'])->name('district.update');

    Route::get('/district/delete/{id}', [ShipController::class, 'DistrictDelete'])->name('district.delete');

//pending

    Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending-orders');

    Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');


    Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');

    Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');

    Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');

    Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');

//

    Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');

    Route::get('/confirm/picked/{order_id}', [OrderController::class, 'ConfirmToPicked'])->name('confirm.picked');

    Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked.shipped');

    Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped.delivered');

    //PDF
    
    Route::get('/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');


});

//front
Route::get('books',[BookController::class,'index']);
Route::get('books/category/{id}',[homeController::class,'book_by_category'])->name('book.by.cat');
Route::get('book/{id}',[homeController::class,'book_details'])->name('book.details');

//cart

Route::post('/cart/data/store/{id}',[CartController::class,'addToCart']);
Route::get('/get-myCart-product',[CartController::class,'myCart']);
Route::get('/my-cart',[CartController::class,'cartPage'])->name('cart.page');
Route::get('/cart-remove/{rowId}',[CartController::class,'cartRemove']);

//checkout

Route::get('checkout',[CartController::class,'CheckoutCreate'])->name('checkout');
Route::post('checkout/store',[CheckoutController::class,'CheckoutStore'])->name('checkout.store');


Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);


Route::get('/user/logout', [homeController::class,'userLogout'])->name('user.logout');


Route::get('/static/order', [homeController::class,'order_static'])->name('static.order');

Route::get('/home/', [homeController::class,'home_not'])->name('home');
