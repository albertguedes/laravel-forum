@extends('layouts.main')
@section('title', strtoupper('Users'))
@section('description','All users')
@section('content')
<div class="row" >

    <div class="mb-5 col-12">
        {{ Breadcrumbs::render('users') }}
    </div>

    <div class="mb-3 col-12" >
        <h1 class="pb-3 text-uppercase" >Users</h1>
    </div>

    <div class="col-12" >
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
                        <div class="row">
                            <div class="text-center col">
                                <i class="fas fa-landmark"></i> {{ $user->forums->count() }}
                            </div>
                            <div class="text-center col">
                                <i class="fas fa-list"></i> {{ $user->topics->count() }}
                            </div>
                            <div class="text-center col">
                                <i class="fas fa-comments"></i> {{ $user->posts->count() }}
                            </div>
                        </div>
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
