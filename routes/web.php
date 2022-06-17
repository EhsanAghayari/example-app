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

/*Route::get('user/photo',function (){
    $user = \App\Models\User::find(1);
    foreach($user->photos as $photo){
        echo $photo->path;
        echo "<br>";
    }
});

Route::get('post/photo',function (){
    $post = \App\Models\Post::find(8);
    foreach($post->photos as $photo){
        echo $photo->path;
        echo "<br>";
    }
});*/

/*Route::get('post/tag',function (){
    $post = App\Models\Post::find(9);
    foreach ($post->tags as $tag){
        echo $tag->name;
        echo "<br>";
    }
});

Route::get('video/tag',function (){
    $video = App\Models\Video::find(1);
    foreach ($video->tags as $tag){
        echo $tag->name;
        echo "<br>";
    }
});

Route::get('tag/1/video',function (){
    $tag = App\Models\Tag::find(1);
    foreach ($tag->videos as $video){
        echo $video->name;
        echo "<br>";
    }
});
Route::get('tag/2/post',function (){
    $tag = App\Models\Tag::find(2);
    foreach ($tag->posts as $post){
        echo $post->content;
        echo "<br>";
    }
});*/

// CRUD Relationships (Eloquent)

/* // CRUD one to many
Route::get('/create',function(){
   $user = \App\Models\User::find(1);
   $post = new \App\Models\Post();
   $post->title = 'one to many';
   $post->content = 'new post with one to many rel';

   $user->posts()->save($post);
});

Route::get('/read',function (){
    $user = \App\Models\User::find(1);
    foreach($user->posts as $post){
        echo $post->content;
        echo "<br>";
    }
});

Route::get('/update',function (){
   $user = \App\Models\User::find(1);
   $user->posts()->whereId(8)->update(['title'=>'new title','content'=>'new updated content']);
});

Route::get('/delete',function (){
    $user = \App\Models\User::find(2);
    $user->posts()->whereId(9)->delete();
});*/

/*// CRUD many to many
Route::get('/create', function (){
    $user = \App\Models\User::find(1);
    $role = new \App\Models\Role();
    $role->name = 'Developer';
    $user->roles()->save($role);
});

Route::get('/read',function (){
    $user = \App\Models\User::find(1);
    foreach ($user->roles as $role){
        echo $role->name;
        echo "<br>";
    }
});

Route::get('/update',function (){
    $user = \App\Models\User::find(1);
    if ($user->has('roles')){
        foreach($user->roles as $role){
            if($role->name = 'کاربر عادی'){
                $role->name = 'Author';
                $role->save();
            }
        }
    }
});

Route::get('/delete',function (){
   $user = \App\Models\User::find(1);
   foreach($user->roles as $role){
       if($role->name = 'Author'){
           $role->delete();
       }
   }
});

// Attach and detach adn sync
Route::get('/detach', function(){
   $user = \App\Models\User::find(1);
   $user->roles()->detach(1);
});

Route::get('/attach', function(){
    $user = \App\Models\User::find(1);
    $user->roles()->attach(1);
});

Route::get('/sync', function(){
    $user = \App\Models\User::find(1);
    $user->roles()->sync([1,2]);
});*/

/*// CRUD Polymorphic Relationship
Route::get('/create',function (){
    $video = \App\Models\Video::find(1);
    $video->tags()->create(['name'=>'poly video']);
    // we create a fillable in tag class
});

Route::get('/read',function (){
    $video = \App\Models\Video::find(1);
    foreach ($video->tags as $tag){
        echo $tag->name;
        echo "<br>";
    }
});

Route::get('/update',function (){
   $video = \App\Models\Video::find(1);
   $tag = $video->tags();
   $newTags = $tag->where('id',3)->first();
   $newTags->name = 'new tag';
   $newTags->save();
   // :(
});

Route::get('/delete',function (){
   $video = \App\Models\Video::find(1);
   $tag = $video->tags();
   $deletedTag = $tag->where('id', 3)->first();
   $deletedTag->delete();
});

Route::get('/detach',function (){
   $video = \App\Models\Video::find(1);
   $video->tags()->detach();
});

Route::get('/attach',function (){
    $video = \App\Models\Video::find(1);
    $video->tags()->attach(1);
});

Route::get('/sync',function (){
    $video = \App\Models\Video::find(1);
    $video->tags()->sync([2]);
});*/
