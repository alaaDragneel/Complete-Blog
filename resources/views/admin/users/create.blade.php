@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Create New User</div>
    <div class="card-body">
        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" id="name" name="name" placeholder="Write User Name..." required/>

                @if ($errors->has('name'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" id="email" name="email" placeholder="Write User email..." required/>

                @if ($errors->has('email'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Create User</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection