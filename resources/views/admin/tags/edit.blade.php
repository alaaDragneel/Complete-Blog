@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Tag: 
        <a href="{{ route('admin.tags.show', $tag) }}">{{ $tag->name }}</a>

    </div>
    <div class="card-body">
        <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $tag->name }}" id="name" name="name" placeholder="Write Tag Name..." required/>

                @if ($errors->has('name'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Edit Tag</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection