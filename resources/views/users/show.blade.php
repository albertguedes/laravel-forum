@extends('layouts.main')
@section('title', strtoupper($user->profile->username))
@section('description',$user->profile->bio)
@section('content')
<div class="row" >
    <div class="col-12 pb-3" >
        <h1 class="text-uppercase pb-3" >{{ $user->profile->username }}</h1>
        <h6 class="text-black-50" >Registered on <em>{{ $user->created_at->format("Y M d") }}</em></h6>
    </div>
    <div class="col-12 py-3" >
        <h2>Bio</h2>
        {{ $user->profile->bio }}
    </div>

    <div class="col-12 py-3" >
        <div class="row" >
            <div class="col-4 py-3" >
                <h2>Forums</h2>
                @if($user->forums)
                    @foreach($user->forums as $forum)
                    <div class="card mb-2">
                        <div class="card-header">
                            <a href="{{ route('forum', compact('forum')) }}">
                                {{ $forum->title }}
                            </a>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            <div class="col-4 py-3" >
                <h2>Topics</h2>
                @if($user->topics)
                    @foreach($user->topics as $topic)
                    <div class="card mb-2">
                        <div class="card-header">
                            <a href="{{ route('topic', compact('forum','topic')) }}">
                                {{ $topic->title }}
                            </a>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            <div class="col-4 py-3" >
                <h2>Posts</h2>
                @if($user->posts)
                    @foreach($user->posts as $post)
                    <div class="card mb-2">
                        <div class="card-header">
                            <a href="{{ route('post', compact('forum','topic','post')) }}">
                                {{ $post->title }}
                            </a>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
