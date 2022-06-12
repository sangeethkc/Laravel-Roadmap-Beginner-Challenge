<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $id = Auth::user()->id;

        if($request->has('image')) 
        {
            $filename = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $filename, 'public');
        }

        Post::create([
            'title'         => request('title'),
            'description'   => request('description'),
            'category_id'   => request('category_id'),
            'image'         => $filename ?? null,
            'user_id'       => $id,
        ]);


        return redirect()->route('posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if($request->has('image')) 
        {
            $filename = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $filename, 'public');
        }
        
        $post->update([
            'title'         => request('title'),
            'description'   => request('description'),
            'image'         => $filename ?? $post->image,
            'category_id'   => request('category_id'),
            'user_id'       => Auth()->id(),
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
