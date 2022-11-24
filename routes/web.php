<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

/**
 * Blog Routes
 */

Route::get('/blog', [\App\Http\Controllers\BlogPostController::class, 'index'])->name('blog.homepage');
Route::get('/blog/{id}', [\App\Http\Controllers\BlogPostController::class, 'show'])->where(['id' => '[0-9]+'])->name('blog.show');
Route::get('about_us',[App\Http\Controllers\BlogPostController::class,'about_us'])->name('blog-about-us.view');
Route::get('contact',[App\Http\Controllers\BlogPostController::class,'contact'])->name('blog-contact.view');
Route::get('contact/create',[App\Http\Controllers\BlogPostController::class,'create'])->name('blog-contact-create.view');
Route::post('contact/create',[App\Http\Controllers\BlogPostController::class,'store'])->name('blog-contact-store.view');


/**
 * Admin Panel Routes
 */

Auth::routes();

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashBoardController::class, 'index'])->name('admin.dashboard');
    Route::get('/contact', [App\Http\Controllers\Admin\DashBoardController::class, 'contact'])->name('admin.contact');
    Route::get('about-us', [App\Http\Controllers\Admin\AboutUseController::class, 'about_us'])->name('admin.about-us');
    Route::get('about-us/edit', [App\Http\Controllers\Admin\AboutUseController::class, 'edit'])->name('admin.about-us-edit');
    Route::put('about-us/update', [App\Http\Controllers\Admin\AboutUseController::class, 'update'])->name('admin.about-us-update');
    Route::get('posts',[App\Http\Controllers\Admin\PostController::class,'index'])->name('admin-posts.view');
    Route::get('users',[App\Http\Controllers\Admin\UserController::class,'index'])->name('admin-users.view');
    Route::get('posts/{post_id}',[App\Http\Controllers\Admin\PostController::class,'edit'])->name('post.edit');
    Route::put('update-post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'update'])->name('post.update');
    Route::get('add-post',[App\Http\Controllers\Admin\PostController::class,'create']);
    Route::post('add-post',[App\Http\Controllers\Admin\PostController::class,'store']);
    Route::get('delete-post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'destroy']);
    Route::get('delete-users/{id}',[App\Http\Controllers\Admin\UserController::class,'destroy']);

});

/**
 * Users' own posts
 */

Route::get('/my-blog', [App\Http\Controllers\MyBlogController::class,'index'])->name('my-blog.show');
Route::get('/my-blog/{user_id}', [App\Http\Controllers\MyBlogController::class,'show'])->name('my-blog.details');
Route::get('/my-blog/{user_id}/edit', [App\Http\Controllers\MyBlogController::class, 'edit']);
Route::put('/my-blog/{user_id}/edit', [App\Http\Controllers\MyBlogController::class, 'update']);
Route::get('/my-blog/create/post', [App\Http\Controllers\MyBlogController::class, 'create']); //shows create post form
Route::post('/my-blog/create/post', [App\Http\Controllers\MyBlogController::class, 'store']); //saves the created post to the database.
Route::get('delete/my-blog/{id}', [App\Http\Controllers\MyBlogController::class, 'destroy'])->name('post.delete'); //deletes post from the database







Route::group(['namespace'=>'App\Http\Controllers'],function (){

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });
    Route::group(['middleware'=>['auth']],function ()
    {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });

});


