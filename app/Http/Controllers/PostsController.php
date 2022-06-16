<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        return "id is: " . $id;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showMyView($id,$name)
    {
        return view('pages.myView',compact(['id','name']));
    }

    public function contact()
    {
        $people = ['احسان','عطا','پارسا','رامین','علی','آرمین','مهدی'];
        return view('pages.contact', compact('people'));
    }

    public function insert()
    {
        DB::insert('insert into posts(title, content) values(?,?)', ['insert پست', 'توسط متد اینزرت درج شده']);
    }

    public function select()
    {
        $posts = DB::select('select * from posts');
        return $posts;
    }
    public function updatePost()
    {
        $updatePosts = DB::update('update posts set title="اسن عنوان بروز شده است" where id=?' , [1]);
        return $updatePosts;
    }
    public function deletePost()
    {
        $deletedPosts = DB::delete('delete from posts where id=?', [2]);
        return $deletedPosts;
    }

    public function getAllPosts()
    {
        # reads all post table data
        // $post = Post::all();

        // $post = Post::find(4);
        $post = Post::where('is_admin',0)->orderBy('id','asc')->get();
        // $post = Post::where('title', 'insert پست')->orderBy('id','desc')->take(2)->get();
        return $post;
    }
    public function savePost()
    {
        /*$post = new Post();
        $post->title = 'پست شماره 1';
        $post->content = 'این بخش کانتنت میابشد';

        $post->save();*/

        $post = Post::create(['title'=>'post 2', 'content'=>'post 2 content is here']);
    }
    public function newUpdatePost()
    {
//        $post = Post::where('id',7)->update(['title'=>'Updated Post', 'content'=> 'Updated content']);
        $post = Post::findOrFail(6);
        $post->title = 'new post';
        $post->content = 'new posts content';

        $post->save();
        return $post;
    }

    public function newDeletePost()
    {
/*        # اولین چیزی که پیدا میکنه رو تو post ذخیره میکنه
        $post = Post::where('id',4)->first();
        $post->delete();*/

        //$post = Post::destroy('id',4);
        //$post = Post::destroy([6,7]);

        # very Important: Safe Delete
        $post = Post::where('id',3)->first();
        $post->delete();
    }

    public function workWithTrash()
    {
        //$post = Post::withTrashed()->get();
        $post = Post::onlyTrashed()->get();
        # حتی با where هم میشه بهش شرط داد
        return $post;
    }

    public function restorePost()
    {
        $post = Post::onlyTrashed()->where('id',2)->restore();
    }

    public function forceDelete()
    {
        $post = Post::onlyTrashed()->where('id',5)->forceDelete();
    }
}
