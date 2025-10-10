@extends('layouts.main')
@section('title', 'Edit Profile')
@section('description','Edit your profile')
@section('content')
<div class="p-3 mb-5 bg-white row" >

    <div class="col-12">
        {{ Breadcrumbs::render('profile.edit') }}
    </div>

    <div class="pb-4 col-12">
        <h1 class="pb-3 text-uppercase" >Edit Profile</h1>
    </div>

    <div class="pb-4 col-12">
        <a href="{{ route('profile') }}" class="btn btn-info fw-bolder" >
            <i class="far fa-user"></i> Profile
        </a>
        <a href="{{ route('profile.password') }}" class="btn btn-info fw-bolder" >
            <i class="fas fa-key"></i> Change Password
        </a>
        <a href="{{ route('profile.delete') }}" class="btn btn-danger fw-bolder" >
            <i class="fas fa-trash-alt"></i> Delete Profile
        </a>
    </div>

    <div class="pb-4 col-12" >
        <form method="POST" action="{{ route('profile.update') }}">

            @csrf

            @method('PUT')

            <input type="hidden" name="id" value="{{ auth()->user()->id }}" >

            <div class="mb-3 form-group">
                <label for="email" class="fw-bolder">Email</label>
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="email-addon"><i class="fas fa-envelope"></i></span>
                    <input id="email" type="email" name="user[email]" class="form-control @error('user.email') is-invalid @enderror" value="{{ old('user.email', auth()->user()->email) }}" required placeholder="Type your email address">
                </div>
                @error('user.email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="username" class="fw-bolder">Username</label>
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="username-addon">
                        <i class="fas fa-user"></i>
                    </span>
                    <input id="username"
                    type="text"
                    name="profile[username]"
                    class="form-control @error('profile.username') is-invalid @enderror"
                    value="{{ old('profile.username', auth()->user()->profile->username) }}"
                    placeholder="Type your username"
                    required>
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
                        <input id="first_name"
                        type="text"
                        name="profile[first_name]"
                        class="form-control @error('profile.first_name') is-invalid @enderror"
                        placeholder="First name"
                        value="{{ old('profile.first_name', auth()->user()->profile->first_name) }}"
                        required>
                    </div>
                    @error('first_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <input id="middle_name"
                    type="text"
                    name="profile.middle_name"
                    class="form-control @error('profile.middle_name') is-invalid @enderror"
                    placeholder="Middle name"
                    value="{{ old('profile.middle_name', auth()->user()->profile->middle_name) }}" >
                    @error('profile.middle_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <input id="last_name"
                    type="text"
                    name="profile[last_name]"
                    class="form-control @error('profile.last_name') is-invalid @enderror"
                    placeholder="Last name"
                    value="{{ old('profile.last_name', auth()->user()->profile->last_name) }}"
                    required>
                    @error('profile.last_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 form-group">
                <label for="birth_date" class="fw-bolder">Birth Date</label>
                <div class="mb-3 input-group" style="width: 200px" >
                    <span class="input-group-text" id="birth-date-addon"><i class="fas fa-birthday-cake"></i></span>
                    <input id="birth-date"
                    type="date"
                    name="profile[birth_date]"
                    class="form-control @error('profile.birth_date') is-invalid @enderror"
                    value="{{ old('profile.birth_date', auth()->user()->profile->birth_date) }}"
                    required>
                </div>
                @error('profile.birth_date')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4 form-group">
                <label class="fw-bolder me-3" for="gender">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="profile[gender]" value="1" {{ old('profile.gender', auth()->user()->profile->gender) == true ? 'checked' : '' }} checked required>
                    <label class="form-check-label" for="male">Male <i class="fas fa-mars"></i></label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="profile[gender]" value="0" {{ old('profile.gender', auth()->user()->profile->gender) == false ? 'checked' : '' }} required>
                    <label class="form-check-label" for="female">Female <i class="fas fa-venus"></i></label>
                </div>
                @error('profile.gender')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-group">
                <label for="bio" class="fw-bolder">Bio</label>
                <div class="mb-3 input-group">
                    <span class="input-group-text" id="bio-addon"><i class="fas fa-id-card"></i></span>
                    <textarea name="profile[bio]" class="form-control @error('profile.bio') is-invalid @enderror" placeholder="Type your bio" rows=10 required>{{ old('profile.bio', auth()->user()->profile->bio) }}</textarea>
                </div>
                @error('profile.bio')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-5 mb-3 text-center form-group">
                <button type="submit" class="text-white btn btn-info fw-bolder">
                    <i class="fas fa-save"></i> Save
                </button>
                <a href="{{ route('profile') }}" class="btn btn-danger fw-bolder">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>

        </form>
    </div>
</div>
@endsection
