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

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', 'IndexController')->name('index');
    Route::get('/{post}', 'IndexController@single')->name('post.single');

    Route::group(['namespace'=>'Comment', 'prefix'=>'{post}'], function (){
        Route::post('/comments', 'PostCommentController@store')->name('post.comment.store');
    });
});


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware'=>['auth','admin','verified']], function() {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', IndexController::class)->name('admin.index');

        Route::get('/categories', CategoryController::class)->name('admin.category');
        Route::get('/categories/create', 'CategoryController@create')->name('admin.category.create');
        Route::post('/categories/create/store', 'CategoryController@store')->name('admin.category.store');
        Route::get('/categories/{show}', 'CategoryController@show')->name('admin.category.show');
        Route::get('/categories/{show}/edit', 'CategoryController@edit')->name('admin.category.edit');
        Route::patch('/categories/{show}', 'CategoryController@update')->name('admin.category.update');
        Route::delete('/categories/{show}/delete', 'CategoryController@delete')->name('admin.category.delete');

        Route::get('/tags', TagController::class)->name('admin.tag');
        Route::get('/tags/create', 'TagController@create')->name('admin.tag.create');
        Route::post('/tags/create/store', 'TagController@store')->name('admin.tag.store');
        Route::get('/tags/{show}', 'TagController@show')->name('admin.tag.show');
        Route::get('/tags/{show}/edit', 'TagController@edit')->name('admin.tag.edit');
        Route::patch('/tags/{show}', 'TagController@update')->name('admin.tag.update');
        Route::delete('/tags/{show}/delete', 'TagController@delete')->name('admin.tag.delete');

        Route::get('/posts', PostController::class)->name('admin.post');
        Route::get('/posts/create', 'PostController@create')->name('admin.post.create');
        Route::post('/posts/create/store', 'PostController@store')->name('admin.post.store');
        Route::get('/posts/{show}', 'PostController@show')->name('admin.post.show');
        Route::get('/posts/{show}/edit', 'PostController@edit')->name('admin.post.edit');
        Route::patch('/posts/{show}', 'PostController@update')->name('admin.post.update');
        Route::delete('/posts/{show}/delete', 'PostController@delete')->name('admin.post.delete');

        Route::get('/users', UserController::class)->name('admin.user');
        Route::get('/users/create', 'UserController@create')->name('admin.user.create');
        Route::post('/users/create/store', 'UserController@store')->name('admin.user.store');
        Route::get('/users/{show}', 'UserController@show')->name('admin.user.show');
        Route::get('/users/{show}/edit', 'UserController@edit')->name('admin.user.edit');
        Route::patch('/users/{show}', 'UserController@update')->name('admin.user.update');
        Route::delete('/users/{show}/delete', 'UserController@delete')->name('admin.user.delete');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Profile', 'prefix' => 'profile', 'middleware'=>['auth','verified']], function() {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', IndexController::class)->name('profile.index');

        Route::get('/likes', LikeController::class)->name('profile.like');
        Route::delete('/likes/{post}', 'LikeController@delete')->name('profile.like.delete');
        Route::get('/comment', CommentController::class)->name('profile.comment');
        Route::delete('/comment/{post}', 'CommentController@delete')->name('profile.comment.delete');
    });
});



Auth::routes(['verify'=>true]);


