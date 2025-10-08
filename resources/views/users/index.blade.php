@extends('layouts.main')
@section('title', strtoupper('Users'))
@section('description','All users')
@section('content')
<div class="row" >

    <div class="mb-5 fs-6 col-12" >
        <a href="{{ route('home') }}" > <i class="fas fa-home"></i> Home</a>
        <span class="mx-2" ><i class="fas fa-angle-right"></i></span>
        <i class="fas fa-users"></i> Users
    </div>

    <div class="pb-3 col-12" >
        <h1 class="pb-3 text-uppercase" >Users</h1>
    </div>

    <div class="py-3 col-12" >
        @if($users)
        <div class="row" >
            @foreach($users as $user)
            <div class="py-3 col-4" >
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('user', compact('user')) }}">
                            <i class="fas fa-user"></i> {{ $user->profile->username }}
                        </a>
                    </div>
                    <div class="card-footer fs-6" >
                        <i class="fas fa-landmark"></i> {{ $user->forums_count }} forums |
                        <i class="fas fa-list"></i> {{ $user->topics_count }} topics |
                        <i class="fas fa-comments"></i> {{ $user->posts_count }} posts
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center" >There are no users registered.</p>
        @endif
    </div>

</div>
@endsection
