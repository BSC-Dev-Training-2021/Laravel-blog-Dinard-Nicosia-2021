<?php

use App\Http\Controllers\BlogPostCategoryController;
use App\Http\Controllers\blogPostController;
use App\Http\Controllers\CategoryTypeController;
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
// the first line display in the url
// the second line route the file locale_get_region
// the last one is the naming the route which you will call in the header
// Route::get('/', function () {
//     return view('blog.welcome');
// })->name('blog.welcome');

Route::get('about', 
function () {
    return view('others.about');
})->name('others.about');

Route::group(['prefix' => 'admin'], function () {
    Route::get('category', [CategoryTypeController::class, 'showInCategoryPage'])->name('admin.category');
    Route::get('blog-post', [CategoryTypeController::class, 'show'])->name('admin.blog-post');
    Route::post('store', [blogPostController::class, 'store'])->name('create');
    Route::post('store/category', [CategoryTypeController::class, 'store'])->name('create-category');
    Route::post('update/category', [CategoryTypeController::class, 'update'])->name('update-category');
    Route::get('update/category/{id}/{name}', function($id, $name){
        return view('admin.category-update',['id'=>$id, 'name'=>$name]);
    })->name('update-category-page');
    Route::post('delete',[CategoryTypeController::class, 'delete'])->name('delete');

});

Route::get('contact', function () {
    return view('others.contact');
})->name('others.contact');

Route::get('article/{id}', [blogPostController::class, 'showById'],)->name('blog.article');

Route::get('/', [blogPostController::class, 'show'])->name('blog.welcome');

Route::get('*', [CategoryTypeController::class, 'show'])->name('cat.welcome');

Route::get('category/{id}',[BlogPostCategoryController::class, 'sortBlogPostByCategory'])->name('category');
