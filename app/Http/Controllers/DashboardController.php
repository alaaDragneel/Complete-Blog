<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $publishPosts   = Post::count();
        $trashedPosts   = Post::onlyTrashed()->count();
        $categories     = Category::count();
        $tags           = Tag::count();
        $users          = User::notAdmin()->count();
        $admins         = User::admin()->count();
        
        $data = compact('publishPosts', 'trashedPosts', 'categories', 'tags', 'users', 'admins');

        return view('admin.home', $data);
    }
}
