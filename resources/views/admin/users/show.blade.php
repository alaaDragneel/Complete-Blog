@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            Show User:  {{ $user->name }}
        </div>
        <div>
            @if ( auth()->id() !== $user->id)
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            @endif
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <strong>Name</strong>: {{ $user->name }}
                <hr>
            </div>   
            
            <div class="col-md-12">
                <strong>EMail</strong>: <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                <hr>
            </div>   
            
            
            <div class="col-md-12">
                <strong>About</strong>: {{ $user->profile->about }}
                <hr>
            </div>   
            <div class="col-md-12">
                <strong>Facebook</strong>: <a href="{{ $user->profile->facebook }}" target="_blank">Facebook</a>
                <hr>
            </div>   
            <div class="col-md-12">
                <strong>Youtube</strong>: <a href="{{ $user->profile->youtube }}" target="_blank">Youtube</a>
                <hr>
            </div>   
            
            <div class="col-md-12">
                <img src="{{ $user->profile->avatar }}" alt="{{ $user->name }}" title="{{ $user->name }}" class="img-thumbnail" style="width: 690px; height: 340;"/>
            </div>   

        </div>
    </div>
</div>
@endsection