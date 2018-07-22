@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Create New Category</div>
    <div class="card-body">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" id="name" name="name" placeholder="Write Category Name..." required/>

                @if ($errors->has('name'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
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