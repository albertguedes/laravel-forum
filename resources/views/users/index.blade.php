@extends('layouts.main')
@section('title', strtoupper('Users'))
@section('description','All users')
@section('content')
<div class="row" >
    <div class="col-12 pb-3" >
        <h1 class="text-uppercase pb-3" >Users</h1>
    </div>
    <div class="col-12 py-3" >
        <p>List of all users</p>
    </div>

    <div class="col-12 py-3" >
        <div class="row" >
            @if($users)
                @foreach($users as $user)
                <div class="col-3 py-3" >
                    <div class="card mb-5">
                        <div class="card-body">
                            <a href="{{ route('user', compact('user')) }}">
                                {{ $user->profile->username }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <div class="col-12 py-3" >
                <p class="text-center" >There are no users registered.</p>
            </div>
            @endif
        </div>
    </div>

</div>
@endsection
