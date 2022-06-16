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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/contact-us',function() {
    $num = "09123456789";
    echo "Hi our number is: {$num}";
});*/

/*Route::get('/posts/{id}/{name}',function ($name,$id){ // bar assas tartib kar mikone
    echo "post id is: {$id} and name is: {$name}";
});*/

/*Route::get('/admin',function (){
    $url = route('admin');
    echo "{$url}";
})->name('admin');*/

/*Route::redirect('/post/login','/redirected/page1',302);
// will redirect page to /redirected/page1 with status 302*/

/* // Group
Route::prefix('admin')->group(function (){
    Route::get('/login',function (){
        echo "Hi this is admin group login";
    });
    Route::get('/profile',function(){
       echo "Hi this is admin group profile";
    });
});*/

/*Route::get('/posts', 'App\Http\Controllers\PostsController@index');
// output is ALl posts list

Route::post('/posts', 'App\Http\Controllers\PostsController@create');*/

/*
Route::resource('/posts', '\App\Http\Controllers\PostsController');*/

//Route::get('/posts/{id?}','\App\Http\Controllers\PostsController@index');

Route::get('/show-view/{id}/{name}','\App\Http\Controllers\PostsController@showMyView');

Route::get('/contact','\App\Http\Controllers\PostsController@contact');


// DB CRUD
Route::get('/insert','\App\Http\Controllers\PostsController@insert');
Route::get('/select','\App\Http\Controllers\PostsController@select');
Route::get('/update_post','\App\Http\Controllers\PostsController@updatePost');
Route::get('/delete_post','\App\Http\Controllers\PostsController@deletePost');

Route::get('posts','\App\Http\Controllers\PostsController@getAllPosts');
Route::get('save-post','\App\Http\Controllers\PostsController@savePost');
Route::get('new-update-post','\App\Http\Controllers\PostsController@newUpdatePost');
Route::get('new-delete-post','\App\Http\Controllers\PostsController@newDeletePost');
Route::get('data-trash','\App\Http\Controllers\PostsController@workWithTrash');
Route::get('restore-post','\App\Http\Controllers\PostsController@restorePost');
Route::get('force-delete','\App\Http\Controllers\PostsController@forceDelete');
