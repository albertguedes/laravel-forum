@extends('layouts.main')
@section('title', 'Login')
@section('content')
<div class="row justify-content-center" >

    <div class="pb-5 text-center col-12">
        <h1 class="text-uppercase" >Login</h1>
    </div>
    <div class="pt-3 col-6" >
        <form class="justify-content-center" method="POST" action="{{ route('auth.login') }}">
            @csrf

            <div class="mb-3 form-group input-group">
                <label for="email" class="input-group-text">
                    <i class="fas fa-envelope"></i>
                </label>
                <input  id="email" type="email" name="email" class="form-control" placeholder="Type a valid email address" required>
            </div>

            <div class="mb-3 form-group input-group">
                <label for="password" class="input-group-text">
                    <i class="fas fa-lock"></i>
                </label>
                <input id="password" type="password" name="password" class="form-control" placeholder="Type your password" required>
            </div>

            <div class="mb-5 text-center form-group fs-6">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" >
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>

            <div class="mb-3 text-center form-group">
                <button type="submit" class="text-white btn btn-info btn-block">Login</button>
            </div>

        </form>
    </div>
</div>
@endsection
