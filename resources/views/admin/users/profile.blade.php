@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header"> {{ $user->name }}'s Profile </div>
    <div class="card-body">
        <form action="{{ route('admin.users.save-profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $user->name }}" id="name" name="name" placeholder="Write User Name..." autocomplete="off" required/>

                @if ($errors->has('name'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ $user->email }}" id="email" name="email" placeholder="Write User email..." autocomplete="off" required/>

                @if ($errors->has('email'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"  id="password" name="password" placeholder="Leave It Empty If You Don't Want To Change Your Password"  autocomplete="off"/>

                @if ($errors->has('password'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" class="form-control {{ $errors->has('avatar') ? 'is-invalid' : '' }}"  id="avatar" name="avatar" />

                @if ($errors->has('avatar'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('avatar') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <img src="{{ $user->profile->avatar }}" alt="{{ $user->name }}" title="{{ $user->name }}" class="img-thumbnail" style="width: 688px; height: 370px;">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="url" class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" value="{{ $user->profile->facebook }}"  id="facebook" name="facebook" autocomplete="off"/>

                @if ($errors->has('facebook'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('facebook') }}</strong>
                    </div>
                @endif
            </div>
             <div class="form-group">
                <label for="youtube">Youtube</label>
                <input type="url" class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" value="{{ $user->profile->youtube }}"  id="youtube" name="youtube" autocomplete="off"/>

                @if ($errors->has('youtube'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('youtube') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="about">About</label>
                <textarea class="form-control {{ $errors->has('about') ? 'is-invalid' : '' }}"  id="about" name="about" rows="10" >{{ $user->profile->about }}</textarea>

                @if ($errors->has('about'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('about') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Profile</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection