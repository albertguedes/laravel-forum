@extends('layouts.main')
@section('title', 'Delete Profile')
@section('description','Delete your profile')
@section('content')
<div class="p-3 mb-5 bg-white row" >

    <div class="col-12">
        {{ Breadcrumbs::render('profile.delete') }}
    </div>

    <div class="pb-4 col-12">
        <h1 class="pb-3 text-uppercase" >Delete Profile</h1>
    </div>

    <div class="pb-4 col-12">
        <a href="{{ route('profile') }}" class="btn btn-info fw-bolder" >
            <i class="far fa-user"></i> Profile
        </a>
        <a href="{{ route('profile.edit') }}" class="btn btn-info fw-bolder" >
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="{{ route('profile.password') }}" class="btn btn-info fw-bolder" >
            <i class="fas fa-key"></i> Password
        </a>
    </div>

    <div class="pb-4 col-12" >

        <p class="text-center text-muted fs-1" >Are you sure you want to delete your profile?</p>
        <p class="text-center text-muted fs-1" >This action is irreversible!</p>

        <form method="POST" action="{{ route('profile.destroy') }}">

            @csrf

            @method('DELETE')

            <input type="hidden" name="id" value="{{ auth()->user()->id }}" >

            <div class="my-5 d-flex justify-content-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="confirm" value="1" id="confirm" required>
                    <label class="form-check-label text-danger fw-bolder" for="confirm">
                        Confirm that you want to delete your profile
                    </label>
                </div>
            </div>

            <div class="mt-5 mb-3 text-center form-group">
                <a href="{{ route('profile') }}" class="btn btn-success fw-bolder">
                    <i class="fas fa-times"></i> Cancel
                </a>
                <button type="submit" class="text-white btn btn-danger fw-bolder">
                    Continue <i class="fas fa-arrow-right"></i>
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
