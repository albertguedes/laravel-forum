@extends('layouts.main')
@section('title', 'Register')
@section('content')
<div class="row justify-content-center" >

    <div class="pb-5 text-center col-12">
        <h1 class="text-uppercase" >Register</h1>
    </div>

    <div class="pt-3 col-8" >
        <form method="POST" action="{{ route('auth.store') }}">

            @csrf

            <div class="mb-3 form-group">
                <label for="email" class="fw-bolder">Email</label>
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="email-addon"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="user[email]" class="form-control @error('user.email') is-invalid @enderror" value="{{ old('user.email') }}" required placeholder="Type your email address">
                </div>
                @error('user.email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="username" class="fw-bolder">Username</label>
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="username-addon"><i class="fas fa-user"></i></span>
                    <input type="text" name="profile[username]" class="form-control @error('profile.username') is-invalid @enderror" value="{{ old('profile.username') }}" required placeholder="Type your username">
                </div>
                @error('profile.username')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group row">
                <label for="first_name" class="fw-bolder">Full Name</label>
                <div class="col">
                    <div class="mb-3 input-group">
                        <span class="input-group-text" id="first-name-addon"><i class="fas fa-id-card"></i></span>
                        <input id="first_name" type="text" name="profile[first_name]" class="form-control @error('profile.first_name') is-invalid @enderror" placeholder="First name" value="{{ old('profile.first_name') }}" required>
                    </div>
                    @error('profile.first_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <input type="text" name="profile[middle_name]" class="form-control @error('profile.middle_name') is-invalid @enderror" placeholder="Middle name" value="{{ old('profile.middle_name') }}">
                    @error('profile.middle_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <input type="text" name="profile[last_name]" class="form-control @error('profile.last_name') is-invalid @enderror" placeholder="Last name" value="{{ old('profile.last_name') }}" required>
                    @error('profile.last_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 form-group">
                <label for="birth_date" class="fw-bolder">Birth Date</label>
                <div class="mb-3 input-group" style="width: 200px" >
                    <span class="input-group-text" id="birth-date-addon"><i class="fas fa-birthday-cake"></i></span>
                    <input id="birth-date" type="date" name="profile[birth_date]" class="form-control @error('profile.birth_date') is-invalid @enderror" value="{{ old('profile.birth_date') }}" required>
                </div>
                @error('profile.birth_date')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4 form-group">
                <label class="fw-bolder me-3" for="gender">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="profile[gender]" value="1" {{ old('profile.gender') == 'male' ? 'checked' : '' }} checked required>
                    <label class="form-check-label" for="male">Male <i class="fas fa-mars"></i></label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="profile[gender]" value="0" {{ old('profile.gender') == 'female' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="female">Female <i class="fas fa-venus"></i></label>
                </div>
                @error('profile.gender')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <small class="text-muted fs-6" >The password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number and one special character.</small>

            <div class="mb-3 form-group">
                <label for="password" class="fw-bolder">Password</label>
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="password-addon"><i class="fas fa-lock"></i></span>
                    <input type="password" name="user[password]" class="form-control @error('user.password') is-invalid @enderror" placeholder="Type your password" required>
                </div>
                @error('user.password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="password_confirmation" class="fw-bolder">Confirm Password</label>
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="password_confirmation-addon"><i class="fas fa-lock"></i></span>
                    <input type="password" name="user[password_confirmation]" class="form-control @error('user.password_confirmation') is-invalid @enderror" placeholder="Confirm your password" required>
                </div>
                @error('user.password_confirmation')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-5 mb-3 text-center form-group">
                <button type="submit" class="text-white btn btn-info fw-bolder">Register</button>
            </div>

        </form>
    </div>
</div>
@endsection
