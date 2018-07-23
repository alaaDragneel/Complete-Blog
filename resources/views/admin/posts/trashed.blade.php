@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Show All Trashed Posts</div>

    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Restore</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post) 
                    <tr>
                        <td>
                            <a href="{{ route('admin.posts.show', $post) }}">{{ $post->title }}</a>
                        </td>
                        <td>
                            <img src="{{ $post->image }}" alt="{{ $post->title }}" title="{{ $post->title }}" width="90" height="50" defer/>
                        </td>
                        <td>
                            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.posts.restore', $post) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"  class="btn btn-success">Restore</button>    
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.posts.force-destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-danger">Delete</button>    
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5"> No Posts Right Now!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection