@extends('layouts.main')
@section('title', strtoupper($user->profile->username))
@section('description',$user->profile->bio)
@section('content')
<div class="row" >

    <div class="mb-5 fs-6 col-12" >
        <a href="{{ route('home') }}" > <i class="fas fa-home"></i> Home</a>
        <span class="mx-2" ><i class="fas fa-angle-right"></i></span>
        <a href="{{ route('users') }}" > <i class="fas fa-users"></i> Users</a>
        <span class="mx-2" ><i class="fas fa-angle-right"></i></span>
        <i class="fas fa-user"></i> {{ $user->profile->username }}
    </div>

    <div class="pb-3 col-12" >
        <h1 class="pb-3 text-uppercase" >{{ $user->profile->username }}</h1>
        <h6 class="text-black-50" >Registered since <em>{{ $user->created_at->format("Y M d") }}</em></h6>
        <hr>
        <p><i class="fas fa-user"></i> {{ $user->profile->name() }} </p>
        <p><i class="fas fa-envelope"></i> {{ $user->email }} </p>
        <p><i class="fas fa-venus-mars"></i> {{ $user->profile->gender ? 'Male' : 'Female' }}</p>
        <p><i class="fas fa-birthday-cake"></i> {{ $user->profile->birth_date }}</p>
    </div>
    <div class="py-3 col-12" >
        <h2><i class="fas fa-address-card"></i> Bio</h2>
        {{ $user->profile->bio }}
    </div>

    <div class="py-3 col-12" >

        <ul class="nav nav-tabs" id="userTab" role="tablist" >
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="forums-tab" data-bs-toggle="tab" data-bs-target="#forums-tab-pane" type="button" role="tab" aria-controls="forums-tab-pane" aria-selected="true">
                    <i class="fas fa-landmark"></i> Forums ({{ $forums->count() }})
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="topics-tab" data-bs-toggle="tab" data-bs-target="#topics-tab-pane" type="button" role="tab" aria-controls="topics-tab-pane" aria-selected="false">
                    <i class="fas fa-list"></i> Topics ({{ $topics->count() }})
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="posts-tab" data-bs-toggle="tab" data-bs-target="#posts-tab-pane" type="button" role="tab" aria-controls="posts-tab-pane" aria-selected="false">
                    <i class="fas fa-comments"></i> Posts ({{ $posts->count() }})
                </button>
            </li>
        </ul>

        <div class="tab-content" id="userTabContent">
            <div class="tab-pane fade show active" id="forums-tab-pane" role="tabpanel" aria-labelledby="forums-tab" tabindex="0">
                @if($forums)
                <ul class="list-group" >
                    @foreach($forums as $forum)
                    <li class="list-group-item border-0 {{ !$forum->is_active ?? 'text-muted' }}" >
                        @if($forum->is_active)
                        <a href="{{ route('forum', compact('forum')) }}">
                            {{ $forum->title }}
                        </a>
                        @else
                        {{ $forum->title }}
                        @endif
                    </li>
                    @endforeach
                </ul>
                @else
                <p>No forums</p>
                @endif
            </div>
            <div class="tab-pane fade" id="topics-tab-pane" role="tabpanel" aria-labelledby="topics-tab" tabindex="0">
                @if($topics)
                <ul class="list-group" >
                    @foreach($topics as $topic)
                    <li class="border-0 list-group-item" >
                        @if($topic->forum->is_active && $topic->is_active)
                        <a href="{{ route('topic', [ 'forum' => $topic->forum, 'topic' => $topic ]) }}">
                            {{ $topic->title }}
                        </a>
                        @else
                        {{ $topic->title }}
                        @endif
                    </li>
                    @endforeach
                </ul>
                @else
                <p>No topics</p>
                @endif
            </div>
            <div class="tab-pane fade" id="posts-tab-pane" role="tabpanel" aria-labelledby="posts-tab" tabindex="0">
                @if($posts)
                <ul class="list-group" >
                    @foreach($posts as $post)
                    <li class="border-0 list-group-item" >
                        @if($post->topic->forum->is_active && $post->topic->is_active && $post->published)
                        <a href="{{ route('post', [ 'forum' => $post->topic->forum, 'topic' => $post->topic, 'post' => $post ]) }}">
                            {{ $post->title }}
                        </a>
                        @else
                        {{ $post->title }}
                        @endif
                    </li>
                    @endforeach
                </ul>
                @else
                <p>No posts</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
