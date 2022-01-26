@extends('layouts.master')

@section('title')
Halaman Profile
@endsection

@section('css')

@endsection

@section('content')
<div class="section-header">
    <h1>Profile</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
    </div>
</div>
<div class="section-body">
    <h2 class="section-title">Hi, {{ Auth::user()->name }}!</h2>

    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-6">
            <div class="card">
                <form method="post" action="{{ route('change.profile') }}" class="needs-validation" novalidate="">
                    @csrf
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label>Nama Aplikasi</label>
                                <input type="text" name="app_name" maxlength="15" class="form-control @error('app_name') is-invalid @enderror"
                                    value="{{ Auth::user()->app_name }}" required="">
                                @error('app_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 col-12">
                                <label>Nama Anda</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required="">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required="">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6">
            <div class="card">
                <form method="post" action="{{ route('change.password') }}" class="needs-validation" novalidate="">
                    @csrf
                    <div class="card-header">
                        <h4>Update Password</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach 

                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label for="password">{{ __('Password Saat Ini') }}</label>
                                <input id="password" type="password" class="form-control" name="current_password"  autocomplete="current-password">
                            </div>
                            <div class="form-group col-md-12 col-12">
                                <label for="password">{{ __('Password Baru') }}</label>
                                <input id="new_password" type="password" class="form-control" name="new_password"  autocomplete="current-password">
                            </div>
                            <div class="form-group col-md-12 col-12">
                                <label for="password">{{ __('Konfirmasi Password Baru') }}</label>
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password"  autocomplete="current-password">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@if (session('sukses'))
<script>
    swal("Profile Berhasil Di Update", {
        title: "Success",
        icon: "success",
    });
</script>
@endif

@if (session('password'))
<script>
    swal("Password Berhasil Di Update", {
        title: "Success",
        icon: "success",
    });
</script>
@endif
@endsection