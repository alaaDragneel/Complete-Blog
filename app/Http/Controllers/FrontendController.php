<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class FrontendController extends Controller
{
    public function index()
    {
        $latestPosts = Post::latest()->take(3)->get();

        // Pull Tha First One To easly loop on the others
        $latestHotPost = $latestPosts->pull(0);
    
        $categories = Category::has('posts')->with('posts')->orderBy('name', 'ASC')->get();

        return view('blog.home', compact('latestPosts', 'latestHotPost', 'categories'));   
    }
}
