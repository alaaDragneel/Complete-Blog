@extends('layouts.app') 
@section('content')
<div class="card">
    <div class="card-header justify-content-between" style="display: flex;">
        <div>
            <h5>Show Tag</h5>
        </div>
        <div class="justify-content-between" style="display: flex;">
            
            <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-primary btn-sm">Edit</a>
        
            <form action="{{ route('admin.tags.destroy', $tag) }}" style="margin-left: 1em;" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"  class="btn btn-danger btn-sm">Delete</button>    
            </form>
        
        </div>
    
    </div>
    <div class="card-body">
        {{ $tag->name }}
    </div>
</div>
@endsection