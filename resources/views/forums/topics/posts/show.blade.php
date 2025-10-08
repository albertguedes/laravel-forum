@extends('layouts.main')
@section('title', strtoupper($post->title))
@section('description',$post->description)
@section('content')
<div class="row" >

    <div class="mb-4 fs-6 col-12" >
        <a href="{{ route('home') }}" >
            <i class="fas fa-home"></i> Home
        </a>

        <span class="mx-2" ><i class="fas fa-angle-right"></i></span>

        <a href="{{ route('forum', [ 'forum' => $post->topic->forum ]) }}" >
            <i class="fas fa-landmark"></i> <em>{{ Str::limit($post->topic->forum->title, 16) }}</em>
        </a>

        <span class="mx-2" ><i class="fas fa-angle-right"></i></span>

        <a href="{{ route('forum.topic', [ 'forum' => $post->topic->forum, 'topic' => $post->topic ]) }}" >
            <i class="fas fa-list"></i> {{ Str::limit($post->topic->title, 16) }}
        </a>

        <span class="mx-2" ><i class="fas fa-angle-right"></i></span>

        <i class="fas fa-comment"></i> {{ $post->title }}

    </div>

    <div class="pb-3 col-12" >
        <h1 class="pb-3 text-uppercase" >
            <div class="row" >
                <div class="text-center col-1 d-flex align-items-center justify-content-center" >
                    <i class="fas fa-comment fs-1" ></i>
                </div>
                <div class="col-11 d-flex align-items-center" >
                    {{ $post->title }}
                </div>
            </div>
        </h1>
        <h6 class="text-black-50" >
            <i class="fas fa-calendar-alt"></i> {{ $post->created_at->format("Y M d") }}
            by
            <em>
                @if ($post->user->is_active)
                <a href="{{ route('user', [ 'user' => $post->user ]) }}" >
                    {{ ucwords($post->user->profile->username) }}
                </a>
                @else
                <strong>{{ $post->user->profile->username }}</strong>
                @endif
            </em>
        </h6>
    </div>

    <div class="py-3 col-12" >
        {{ $post->content }}
    </div>

    <div class="py-3 col-12" >
        <div class="row" >

            @if( $post->category )
            <div class="py-3 col-6" >
                <a href="{{ route('category',['category'=>$post->category]) }}" ><i class="fas fa-sitemap"></i> {{ $post->category->title }}</a>
            </div>
            @endif

            @if( $post->tags()->count() )
            <div class="py-3 col-6" >
                @foreach ($post->tags as $tag)
                <a class="me-2 d-inline-flex align-items-center" href="{{ route('tag', compact('tag')) }}">
                    <i class="fas fa-tag"></i><span class="hidden-char" >_</span>{{ $tag->title }}
                </a>
                @endforeach
            </div>
            @endif

        </div>
    </div>

    <div class="py-3 col-12" >
        @if($post->children->count() > 0)
        <ul class="list-group" >

            @foreach($post->children as $reply)
            <li class="list-group-item" >
                <a href="{{ route('post', [ 'forum' => $post->topic->forum, 'topic' => $post->topic, 'post' => $reply ]) }}">
                    {{ $post->title }}
                </a>
            </li>
            @endforeach

        </ul>
        @else
        <p>No replies</p>
        @endif
    </div>

</div>
@endsection
