<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts =  Post::all();
        $posts =  Post::orderBy('id','asc')->get();
        // $posts =  Post::orderBy('id','asc')->paginate(1);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post1 = new Post;
 
         $post1->title = $request['title'];
         $post1->body =  $request['body'];
         $post1->user_id = Auth::user()->id;

         $post1->save();
         //  return $request->body;
         //return view('posts.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
      
       return view('posts.edit')->with('post',$post);
       
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
        $post1 = Post::find($id);
 
         $post1->title = $request['title'];
         $post1->body =  $request['body'];

         $post1->save();
         return $request->body;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // DB::delete('delete from posts where by id = ? ', 1);
      Post::where('id',$id)->delete();
      $post = Post::all();
     // return view('posts.show')->with('post',$post);
      return $post;
    }
}
