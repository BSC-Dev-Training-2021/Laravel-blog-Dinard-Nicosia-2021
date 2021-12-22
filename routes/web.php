<?php

use App\Http\Controllers\BlogCont;
use App\Http\Controllers\blogPostController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\LaravelBlogsController;
use App\Http\Controllers\LBlogsController;
use App\Http\Controllers\postCont;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\postCont;

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

Route::get('about', function () {
    return view('others.about');
})->name('others.about');

Route::group(['prefix' => 'admin'], function () {
    Route::get('blog-post', function () {
        return view('admin.blog-post');
    })->name('admin.blog-post');
    Route::post('create', function (\Illuminate\Http\Request $request, Illuminate\Validation\Factory $validator) {
        $validation = $validator->make($request->all(),
        [
            'title' => 'required|min:10',
            'content' => 'required|min:20'
        ]);
        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
        }
        return redirect()
        ->route('admin.blog-post')
        // $request->input('title')
        ->with('notif', 'new created Blog: '. $request->input('title'));
    })->name('create');
});

Route::get('contact', function(){
    return view('others.contact');
})->name('others.contact');

// Route::get('article/{id}', function($id){
//     $data = [
//         'id' => $id
//     ];
//     return view('blog.article', ['data' => $data]);
//     //return $data;
// })->name('blog.article');

// Route::get('/home', function () {
//     return view('blog.welcome');
// })->name('blog.welcome');

Route::get('article/{id}', [blogPostController::class, 'showById'])->name('blog.article');
Route::get('/',[blogPostController::class,'show'] )->name('blog.welcome');