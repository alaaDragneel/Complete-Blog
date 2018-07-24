@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/summernote-bs4.css') }}" rel="stylesheet">
@endsection

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
                <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" id="body" name="body" placeholder="Write Post Body..." rows="8" required >{{ old('body') }}</textarea>
            
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
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                        <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]">
                        <label class="form-check-label">
                            {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
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

@section('scripts')
    <script src="{{ asset('js/summernote-bs4.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#body').summernote({ 
                 toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
                placeholder: 'Write Your Post Body', 
                tabsize: 2, 
                height: 200 ,
            });
        });
    </script>
@endsection