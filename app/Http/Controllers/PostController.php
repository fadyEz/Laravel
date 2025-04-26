<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
        // $posts = Post::paginate(10); 
        // return view('posts.viewPosts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //1-get data    
        $data = $request->all();
        //2-validation
        //3-store data
        // Post::create(['title' => $data['title'], 'body' => $data['body'], 'create_by' => $data['create_by']]);
        $post = new Post;
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->user_id = auth()->id() ?? 2;
        $post->create_by = auth()->id() ?? 2;
        $post->save();
        //4-return to posts
        return redirect('/posts/');
    }



    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //find -> retrive one post by primary key(id)
        //where-> retrive post but by condation 
        $post = Post::find($id);
        return view('posts.view', ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $posts = Post::find($id);
    //     return view('posts.edit', data: ["posts" => $posts]);
    // }

    public function edit($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect('/posts')->withErrors(['message' => 'Post not found.']);
        }

        return view('posts.edit', ['post' => $post]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, string $id)
    {
        $request->all();
        $post = Post::find($id);
        if (!$post) {
            return redirect('/posts')->withErrors(['message' => 'Post not found.']);
        }

        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = auth()->id() ?? 2;
        // $post->create_by = auth()->id() ?? 2; 
        $post->save();

        return redirect('/posts')->with('success', 'Post updated successfully!');
    }

    //  * Remove the specified resource from storage.
    //  */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts/');
    }

}
