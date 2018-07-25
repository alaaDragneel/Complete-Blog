<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class FrontendController extends Controller
{
    public function index()
    {
        $latestPosts = Post::latest()->take(3)->get();

        // Pull Tha First One To easly loop on the others
        $latestHotPost = $latestPosts->pull(0);
    
        $categories = Category::has('posts')->with(['posts' => function ($query) {
            $query->latest();
            
        }])->orderBy('name', 'ASC')->get();

        return view('blog.home', compact('latestPosts', 'latestHotPost', 'categories'));   
    }

    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $tags = Tag::all();

        $next_post = Post::setEagerLoads([])->select('slug', 'title')->where('id', '>', $post->id)->orderBy('id', 'ASC')->first();

        $prev_post = Post::setEagerLoads([])->select('slug', 'title')->where('id', '<', $post->id)->orderBy('id', 'DESC')->first();

        return view('blog.single', compact('post', 'tags', 'next_post', 'prev_post'));
    }

    public function categoryPosts(Category $category)
    {
        $category->load(['posts' => function ($query) {
            $query->setEagerLoads([]);
        }]);

        $tags = Tag::all();

        return view('blog.category', compact('category', 'tags'));
    }
    
    public function tagPosts(Tag $tag)
    {
        $tag->load(['posts' => function ($query) {
            $query->setEagerLoads([]);
        }]);
        
        $tags = Tag::all();

        return view('blog.tag', compact('tag', 'tags'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;

        // $posts = Post::where('title', 'LIKE', "%{$keyword}%")->get();
        $posts = Post::where('title', 'LIKE', "%{$keyword}%")
        ->orWhereHas('category', function ($query) use ($keyword) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        })
        ->orWhereHas('tags', function ($query) use ($keyword) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        })
        ->setEagerLoads([])->get();
        
        $tags = Tag::all();

        return view('blog.search', compact('posts', 'tags', 'keyword'));
        
    }
}
