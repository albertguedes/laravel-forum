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
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="email-addon"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required placeholder="Type your email address">
                </div>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="username-addon"><i class="fas fa-user"></i></span>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required placeholder="Type your username">
                </div>
                @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group row">
                <label for="first_name" class="fw-bolder">Full Name</label>
                <div class="col">
                    <div class="mb-3 input-group">
                        <span class="input-group-text" id="first-name-addon"><i class="fas fa-id-card"></i></span>
                        <input id="first_name" type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="First name" value="{{ old('first_name') }}" required>
                    </div>
                    @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" placeholder="Middle name" value="{{ old('middle_name') }}">
                    @error('middle_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last name" value="{{ old('last_name') }}" required>
                    @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 form-group">
                <label for="birth_date" class="fw-bolder">Birth Date</label>
                <div class="mb-3 input-group" style="width: 200px" >
                    <span class="input-group-text" id="birth-date-addon"><i class="fas fa-birthday-cake"></i></span>
                    <input id="birth-date" type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror" value="{{ old('birth_date') }}" required>
                </div>
                @error('birth_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4 form-group">
                <label class="fw-bolder me-3" for="gender">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} checked required>
                    <label class="form-check-label" for="male">Male <i class="fas fa-mars"></i></label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="female">Female <i class="fas fa-venus"></i></label>
                </div>
                @error('gender')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="password-addon"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Type your password" required>
                </div>
                <small>The password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number and one special character.</small>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="password_confirmation-addon"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm your password" required>
                </div>
                @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-5 mb-3 text-center form-group">
                <button type="submit" class="text-white btn btn-info fw-bolder">Register</button>
            </div>

        </form>
    </div>
</div>
@endsection
