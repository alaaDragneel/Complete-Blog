@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Show All Tag</div>

    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tag Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tags as $tag) 
                    <tr>
                        <td>
                            <a href="{{ route('admin.tags.show', $tag) }}">{{ $tag->name }}</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-danger">Delete</button>    
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3"> No Tags Right Now!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection