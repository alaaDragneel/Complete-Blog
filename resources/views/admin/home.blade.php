@extends('layouts.app')



@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card text-center text-white bg-success mb-2">
            <div class="card-header">Publised Posts</div>
            <div class="card-body">
              {{ $publishPosts }}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center text-white bg-danger mb-2">
            <div class="card-header">Trashed Posts</div>
            <div class="card-body">
              {{ $trashedPosts }}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center text-white bg-primary mb-2">
            <div class="card-header">Categories</div>
            <div class="card-body">
              {{ $categories }}
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-4">
        <div class="card text-center text-white bg-secondary mb-2">
            <div class="card-header">Tags</div>
            <div class="card-body">
              {{ $tags }}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center text-white bg-dark mb-2">
            <div class="card-header">Users</div>
            <div class="card-body">
              {{ $users }}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center text-white bg-primary mb-2">
            <div class="card-header">Admins</div>
            <div class="card-body">
              {{ $admins }}
            </div>
        </div>
    </div>
</div>
@endsection
