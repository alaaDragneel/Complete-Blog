@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Update Site Settings</div>
    <div class="card-body">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="site_name">Site Name</label>
                <input type="text" class="form-control {{ $errors->has('site_name') ? 'is-invalid' : '' }}" value="{{ $setting->site_name }}" id="site_name" name="site_name" placeholder="Write Site Name..." required/>

                @if ($errors->has('site_name'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('site_name') }}</strong>
                    </div>
                @endif
            </div>
          
            <div class="form-group">
                <label for="contact_email">Site Contact Email</label>
                <input type="email" class="form-control {{ $errors->has('contact_email') ? 'is-invalid' : '' }}" value="{{ $setting->contact_email }}" id="contact_email" name="contact_email" placeholder="Write Site Contact Email..." required/>

                @if ($errors->has('contact_email'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('contact_email') }}</strong>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="contact_number">Site Contact Number</label>
                <input type="number" class="form-control {{ $errors->has('contact_number') ? 'is-invalid' : '' }}" value="{{ $setting->contact_number }}" id="contact_number" name="contact_number" placeholder="Write Site Contact Number..." required/>

                @if ($errors->has('contact_number'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('contact_number') }}</strong>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="address">Site Address</label>
                <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" value="{{ $setting->address }}" id="address" name="address" placeholder="Write Address..." required/>

                @if ($errors->has('address'))
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address') }}</strong>
                    </div>
                @endif
            </div>
          
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Settings</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
