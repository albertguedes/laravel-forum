@extends('layouts.main')
@section('title', 'Edit Profile')
@section('description','Edit your profile')
@section('content')
<div class="p-3 mb-5 bg-white row" >

    <div class="col-12">
        {{ Breadcrumbs::render('profile.password') }}
    </div>

    <div class="pb-4 col-12">
        <h1 class="pb-3 text-uppercase" >Change Password</h1>
    </div>

    <div class="pb-4 col-12">
        <a href="{{ route('profile') }}" class="btn btn-info fw-bolder" >
            <i class="far fa-user"></i> Profile
        </a>
        <a href="{{ route('profile.edit') }}" class="btn btn-info fw-bolder" >
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="{{ route('profile.delete') }}" class="btn btn-danger fw-bolder" >
            <i class="fas fa-trash-alt"></i> Delete Profile
        </a>
    </div>

    <div class="pb-4 col-12" >

        <p class="text-muted fs-6" >A secure password must be at least 8 characters
            long and contain at least one uppercase letter, one lowercase letter,
            one number and one special character.</p>

        <form method="POST" action="{{ route('profile.password') }}">

            @csrf

            @method('PUT')

            <input type="hidden" name="id" value="{{ auth()->user()->id }}" >

            <div class="mb-3 form-group">
                <label for="password" class="fw-bolder">Password</label>
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="password-addon"><i class="fas fa-key"></i></span>
                    <input id="password"
                    type="password"
                    name="user[password]"
                    class="form-control @error('user.password') is-invalid @enderror"
                    value=""
                    placeholder="Type your password"
                    required>
                </div>
                @error('user.password')
                <div class="text-danger" >{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="password_confirm" class="fw-bolder">Confirm Password</label>
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="password-confirmation-addon">
                        <i class="fas fa-key"></i>
                    </span>
                    <input id="password-confirmation"
                    type="password"
                    name="user[password_confirmation]"
                    class="form-control @error('user.password_confirmation') is-invalid @enderror"
                    value=""
                    placeholder="Confirm your password"
                    required>
                </div>
                @error('user.password_confirmation')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-5 mb-3 text-center form-group">
                <a href="{{ route('profile') }}" class="btn btn-danger fw-bolder">
                    <i class="fas fa-times"></i> Cancel
                </a>
                <button type="submit" class="text-white btn btn-info fw-bolder">
                    <i class="fas fa-save"></i> Save
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
