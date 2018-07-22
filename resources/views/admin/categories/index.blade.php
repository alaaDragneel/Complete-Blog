@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Show All Category</div>

    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category) 
                    <tr>
                        <td>
                            <a href="{{ route('admin.categories.show', $category) }}">{{ $category->name }}</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-danger">Delete</button>    
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3"> No Catagories Right Now!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection