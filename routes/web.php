<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Categories;
use App\Products;

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


// ----------------------- Category Routes --------------------------

// create new category
Route::get('/api/category', function(){
    return view('category_creation');
});
Route::post('/api/category', [CategoriesController::class, 'create_category']);


// get all categories
Route::get('/api/categories', [CategoriesController::class, 'get_all_categories'])->name('categories.get_all_categories');


// get category by id
Route::get('/api/categories/{id}', [CategoriesController::class, 'get_category_by_id']);


// update category
Route::get('/api/categories_up/{id}', function($id){
     $category = Categories::findOrFail($id);
     return view('category_update', compact('category'));
})->name('categories.update_category');
Route::put('/api/categories_up/{id}', [CategoriesController::class, 'update_category'])->name('categories.update_category');


// delete a category
Route::delete('/api/categories_del/{id}', [CategoriesController::class, 'delete_category'])->name('categories.delete_category');




// ------------------------ Product Routes -----------------------------
// create new product
Route::get('/api/product', function(){
    return view('product_creation', ['Categories' => Categories::all()]);
});
Route::post('/api/product', [ProductsController::class, 'create_product']);


// get all products
Route::get('/api/products', [ProductsController::class, 'get_all_products'])->name('products.get_all_products');


// get product by id
Route::get('/api/products/{id}', [ProductsController::class, 'get_product_by_id']);


// update a product
Route::get('/api/products_up/{id}', function($id){
    $product = Products::findOrFail($id);
    $Categories = Categories::all();

    return view('product_update', compact('product', 'Categories'));
})->name('products.update_product');
Route::put('/api/products_up/{id}', [ProductsController::class, 'update_product'])->name('products.update_product');


// delete a product
Route::delete('/api/products_del/{id}', [ProductsController::class, 'delete_product'])->name('products.delete_product');





