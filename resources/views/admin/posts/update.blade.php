@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Update Post:  {{ $post->title }}</div>
    <div class="card-body">
        <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ $post->title }}" id="title" name="title" placeholder="Write Post Title..." required/>

                @if ($errors->has('title'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" id="body" name="body" placeholder="Write Post Body..." rows="8" required >{{ $post->body }}</textarea>
            
                @if ($errors->has('body'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('body') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}" id="category" name="category_id" required>
                    <option value="" selected disabled>Select Post Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('category_id'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="tags">Select Tags</label>
                @foreach ($tags as $tag)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" {{ in_array($tag->id, $postTags) ? 'checked' : '' }} name="tags[]">
                        <label class="form-check-label">
                            {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="image">image</label>
                <input type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" value="{{ old('image') }}" id="image" name="image" />

                @if ($errors->has('image'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <img src="{{ $post->image }}" alt="{{ $post->title }}" title="{{ $post->title }}" class="img-thumbnail" style="width: 688px; height: 370px;">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Post</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection