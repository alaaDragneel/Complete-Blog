@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            Show Post:  {{ $post->title }}
        </div>
        <div>
            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary btn-sm">Edit</a>
            <a href="{{ route('admin.posts.destroy', $post) }}" class="btn btn-danger btn-sm">Trash</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <strong>Title</strong>: {{ $post->title }}
                <hr>
            </div>   
            
            <div class="col-md-12">
                <strong>Category</strong>: 
                    @if ($post->category)
                        <a href="{{ route('admin.categories.show', $post->category) }}">{{ $post->category->name }}</a>
                    @else
                        No Category Found
                    @endif
                <hr>
            </div>   
            
            <div class="col-md-12">
                <strong>Body</strong>: {{ $post->body }}
                <hr>
            </div>   
            
            <div class="col-md-12">
                <img src="{{ $post->image }}" alt="{{ $post->title }}" title="{{ $post->title }}" class="img-thumbnail" style="width: 690px; height: 340;"/>
            </div>   

        </div>
    </div>
</div>
@endsection