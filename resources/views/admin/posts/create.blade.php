@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Create New Post</div>
    <div class="card-body">
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}" id="title" name="title" placeholder="Write Post Title..." required/>

                @if ($errors->has('title'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" value="{{ old('body') }}" id="body" name="body" placeholder="Write Post Body..." rows="8" required ></textarea>
            
                @if ($errors->has('body'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('body') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}" value="{{ old('category_id') }}" id="category" name="category_id" required>
                    <option value="" selected disabled>Select Post Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                @if ($errors->has('category_id'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="image">image</label>
                <input type="file" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" value="{{ old('image') }}" id="image" name="image" required/>

                @if ($errors->has('image'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Create Post</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection