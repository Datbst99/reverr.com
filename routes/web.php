<?php

use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TopProductController;
use App\Http\Controllers\UserController;
use Facade\FlareClient\Api;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::resource('/course', CourseController::class);

Route::get('/', [ClientController::class, 'index'])->name('client.home');
Route::get('/{id}/{slug_cate}.html', [ClientController::class, 'cate'])->name('client.cate');
Route::get('/chi-tiet/{id}/{slug_detail}.html', [ClientController::class, 'detail'])->name('client.detail');
Route::get('/search', [ClientController::class, 'search'])->name('client.search');
Route::match(['post', 'get'], '/add-mail', [ClientController::class, 'mail'])->name('client.mail');

Route::get('/update/ma-giam-gia/{code}', function($code){
   return view('client.discount.'.$code);
});

Route::apiResource('api/users', ApiUserController::class);
Route::apiResource('api/posts', ProductController::class);


Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
        // Admin
    Route::group(['middleware' => ['role:admin_post|system_admin']], function () {
        Route::view('/dashboard', 'admin.index');
    });
    Route::group(['middleware' => ['role:system_admin']], function () {
        Route::get('/add-user', [UserController::class, 'add'])->name('user.add');
        Route::get('/show-user', [UserController::class, 'index'])->name('user.show');
        Route::get('/delete-user/{id}', [UserController::class, 'delete']);
        Route::match(['post', 'get'], '/edit-user/{id}', [UserController::class, 'edit']);
        Route::match(['post', 'get'], '/store-user', [UserController::class, 'store'])->name('user.store');

        //    // Categories
        Route::get('/add-cate', [CategoryController::class, 'add'])->name('cate.add');
        Route::match(['post', 'get'], '/store-cate', [CategoryController::class, 'store'])->name('cate.store');
        Route::get('/edit-cate/{id}', [CategoryController::class, 'edit']);
        Route::get('/delete-cate/{id}', [CategoryController::class, 'delete']);
    });
        // Post
    Route::group(['middleware' => ['role:system_admin|admin_post']], function () {
        Route::get('/show-post', [PostController::class, 'index'])->name('post.show');
        Route::get('/add-post', [PostController::class, 'add'])->name('post.add');
        Route::match(['get', 'post'], '/store-post', [PostController::class, 'store'])->name('post.store');
        Route::get('/edit-post/{id}', [PostController::class, 'edit'])->name('post.edit');
        Route::get('/delete-post/{id}', [PostController::class, 'delete'])->name('post.delete');
    });

        // Product
    Route::group(['middleware' => ['role:system_admin|admin_product']], function () {
        Route::get('/show-product', [TopProductController::class, 'index'])->name('product.show');
        Route::get('/add-product', [TopProductController::class, 'add'])->name('product.add');
        Route::match(['post', 'get'], '/store-product', [TopProductController::class, 'store'])->name('product.store');
        Route::get('/delete-product/{id}', [TopProductController::class, 'delete'])->name('product.delete');
        Route::get('/edit-product/{id}', [TopProductController::class, 'edit'])->name('product.edit');
    });




});


require __DIR__ . '/auth.php';
