<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if($categories->count() == 0) {
            flash('No Categories Found To Add it To The Post')->error()->important(); 
            
            return back(); 
        }

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required',
            'body'          => 'required',
            'category_id'   => ['required','numeric', Rule::exists('categories', 'id')],
            'image'         => 'required|image',
        ]);

        

        Post::create([
            'title'         => $request->title,
            'body'          => $request->body,
            'category_id'   => $request->category_id,
            'image'         => $request->file('image')->store('posts', 'public'),
        ]);

        flash('Post Was Created Successfully')->success()->important();

        return redirect()->route('admin.posts.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();

        $post = Post::withTrashed()->findOrFail($id);

        if ($categories->count() == 0) {
            flash('No Categories Found To Update it To The Post')->error()->important();

            return back();
        }

        return view('admin.posts.update', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => ['required', 'numeric', Rule::exists('categories', 'id')],
            'image' => 'sometimes|nullable|image',
        ]);

        $post = Post::withTrashed()->findOrFail($id);

        $title = $request->title;
        
        $updatedData = [
            'title' => $title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'slug' => $title,
        ];

        if ($request->hasFile('image')) {
            $imagePath = public_path(str_after($post->image, $request->server('HTTP_ORIGIN')));
            
            $fileExits = File::exists($imagePath);
            $isValidFile = File::isFile($imagePath);
            
            if ($fileExits && $isValidFile) {
                File::delete($imagePath);
            }

            $updatedData['image'] = $request->file('image')->store('posts', 'public');
        }


        $post->update($updatedData);

        flash('Post Was Updated Successfully')->success()->important();

        return redirect()->route('admin.posts.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        flash('Post Was Trashed Successfully')->success()->important();

        return redirect()->route('admin.posts.index');
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        
        $post->restore();
        
        flash('Post Was Restored Successfully')->success()->important();

        return redirect()->route('admin.posts.trashed');
    }

    public function forceDestroy($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);

        $post->forceDelete();

        flash('Post Was Deleted Successfully')->success()->important();

        return redirect()->route('admin.posts.trashed');
    }
}
