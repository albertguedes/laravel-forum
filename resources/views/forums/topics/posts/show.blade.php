@extends('layouts.main')
@section('title', strtoupper($post->title))
@section('description',$post->description)
@section('content')
<div class="p-3 mb-5 row card" >

    <div class="mb-5 col-12">
        {{ Breadcrumbs::render('forum.topic.post', $post) }}
    </div>

    <div class="mb-5 col-12">

        <h1 class="mb-5 text-uppercase" >
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

    @if($post->parent)
    <div class="pb-5 col-12" >
        <div class="card" >
            <div class="card-header" >
                <h2 class="card-title" >
                    <a href="{{ route('post', [ 'forum' => $post->topic->forum, 'topic' => $post->topic, 'post' => $post->parent ]) }}" >
                        {{ $post->parent->title }}
                    </a>
                </h2>
            </div>
            <div class="card-body" >
                {{ $post->parent->content }}
            </div>
        </div>
    </div>
    @endif

    <div class="pb-5 col-12" >
        {{ $post->content }}
    </div>

</div>

<div class="row" >

    @auth
    <div id="reply" class="p-0 col-12 card" >
        <div class="card-header" >
            <h3 class="card-title fs-1 fw-bolder" >Reply</h3>
        </div>
        <div class="card-body" >
            <form method="POST" action="{{ route('post.store', [ 'forum' => $post->topic->forum, 'topic' => $post->topic, 'post' => $post ]) }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="topic_id" value="{{ $post->topic->id }}">
                <input type="hidden" name="parent_id" value="{{ $post->id }}">
                <div class="mb-3 form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror('title') is-valid" id="title" name="title" value="" required>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror('content') is-valid" id="content" name="content" rows="10" required></textarea>
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="text-center form-group">
                    <button type="submit" class="text-white btn btn-lg btn-info fw-bolder">
                        <i class="fas fa-reply"></i> Reply
                    </button>
                </div>

            </form>
        </div>
    </div>
    @endauth

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
