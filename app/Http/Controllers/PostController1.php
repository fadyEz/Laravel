<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController1 extends Controller
{
    // function index(){
       
    //     // $posts = Post::all(); 
    //     $posts = Post::latest()->paginate(10); 

    //     return view('posts.viewPosts', compact('posts'));
    // }

    function index() {
        $posts = Post::paginate(10); 
        return view('posts.viewPosts', compact('posts'));
    }

    function show($id){
        $posts = Post::findOrFail($id);
    return view('posts.viewPost', ["posts" => $posts]);
    }

    function edit($id){
        $posts = Post::findOrFail($id);
    return view('posts.edit', data: ["posts" => $posts]);
    }
    
    function update($id){
        return "<h1>Update Post {$id} Done</h1>";

    }

    function create(){
        return view('posts.create');
    }


    function store(){
        return "<h1>Add Post Done</h1>";

    }

    function destroy($id){
        return "<h1>Deleted Post with ID: {$id}</h1>";
    }

   
}
