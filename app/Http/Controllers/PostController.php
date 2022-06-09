<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();

        return view('posts.index', compact('posts'));
    }
    public function show(Post $post)
    {
        return view('posts.index', compact('post'));
    }
    public function edit(Post $post)
    {
        return view('posts.index', compact('post'));
    }
    public function create()
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }
}
