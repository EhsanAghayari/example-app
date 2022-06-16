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


// Eloquent Relationship

/*// one to one relationship
Route::get('user/{id}/post', function ($id) {
    $user_post = \App\Models\User::find($id)->post;
    return $user_post;
    // fetch post belong to user with id = $id
});

Route::get('post/{id}/user', function ($id) {
    $post_user = \App\Models\Post::find($id)->user;
    return $post_user;
});*/

/*// one to many relation
Route::get('user/{id}/posts', function ($id) {
    $user_posts = \App\Models\User::find($id)->posts;
    foreach ($user_posts as $post){
        echo $post->content;
        echo "<br>";
    }
    // fetch all posts belong to user with id = $id
});*/

/*// many to many relationship
Route::get('user/{id}/roles', function ($id) {
    $user_roles = \App\Models\User::find($id)->roles;
    foreach ($user_roles as $role){
        echo $role->name;
        echo "<br>";
    }
    // fetch all roles belong to user with id = $id relation is many to many
});

Route::get('role/{id}/users', function ($id) {
    $role_users = \App\Models\Role::find($id)->users;
    foreach ($role_users as $user){
        echo $user->name;
        echo "<br>";
    }
    // fetch all users belong to role with id = $id relation is many to many
});*/

/*// has many through
Route::get('user/country',function (){
   $country = \App\Models\Country::find(2);
   foreach($country->posts as $post){
       echo $post->content;
       echo "<br>";
   }
});*/

// polymorphic relationship
