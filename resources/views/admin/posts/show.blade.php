@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            Show Post:  {{ $post->title }}
        </div>
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary btn-sm" style="margin-right: 1em;">Edit</a>
            @if($post->trashed())
               <form action="{{ route('admin.posts.restore', $post) }}" method="POST">
                    @csrf @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-success">Restore</button>
                </form>
            @else
                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Trash</button>
                </form>
            @endif
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
                <strong>Tags</strong>: 
                @forelse ($post->tags as $tag)
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('admin.tags.show', $tag) }}">{{ $tag->name }}</a>
                        </li>
                    </ul>
                @empty
                    No Tags Found
                @endforelse
                <hr>
            </div>   
            
            <div class="col-md-12">
                <strong>Body</strong>: <div id="body">{!! $post->body !!}</div>
                <hr>
            </div>   
            
            <div class="col-md-12">
                <img src="{{ $post->image }}" alt="{{ $post->title }}" title="{{ $post->title }}" class="img-thumbnail" style="width: 690px; height: 340;"/>
            </div>   

        </div>
    </div>
</div>
@endsection