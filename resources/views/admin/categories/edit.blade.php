@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Category: 
        <a href="{{ route('admin.categories.show', $category) }}">{{ $category->name }}</a>

    </div>
    <div class="card-body">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $category->name }}" id="name" name="name" placeholder="Write Category Name..." required/>

                @if ($errors->has('name'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Edit Post</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection