@extends('layouts.app') 
@section('content')

<div class="card">
    <div class="card-header">Show All Users</div>

    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Permission</th>
                    <th>Image</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>
                        <a href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a>
                    </td>
                    <td>
                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                    </td>
                    <td>
                        @if ($user->admin)
                            <form action="{{ route('admin.users.revoke-permissions', $user) }}" method="POST">
                                @csrf @method('PATCH')
                                <button class="btn btn-sm btn-warning">Revoke Permissions</button>
                            </form>
                        @else
                            <form action="{{ route('admin.users.make-as-admin', $user) }}" method="POST">
                                @csrf @method('PATCH')
                                <button class="btn btn-info btn-sm text-white">Make As Admin</button>
                            </form>
                        @endif
                    </td>
                    <td>
                        <img src="{{ $user->profile->avatar }}" alt="{{ $user->name }}" title="{{ $user->name }}" width="90" height="50" style="border-radius: 50%;" />
                    </td>
                    <td>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6"> No Users Right Now!</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection