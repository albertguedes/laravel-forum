@extends('layouts.main')
@section('title', 'Create Post')
@section('description','Create a new post')
@section('content')
<div class="p-3 mb-5 row card" >

    <div class="mb-5 col-12">
        {{ Breadcrumbs::render('forum.topic.post.create', $topic) }}
    </div>

    <div class="mb-5 col-12">
        <h1 class="text-uppercase" >
            <div class="row" >
                <div class="text-center col-1 d-flex align-items-center justify-content-center" >
                    <i class="fas fa-comment fs-1" ></i>
                </div>
                <div class="col-11 d-flex align-items-center" >
                    @if($reply) Reply @else Create @endif Post
                </div>
            </div>
        </h1>
    </div>

    @if($reply)
    <div class="mb-3 col-12 fs-6 text-transform-italic">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title fs-6 fw-bolder" >
                    <a href="{{ route('forum.topic.post', ['forum' => $forum, 'topic' => $topic, 'post' => $reply ] ) }}" >
                        {{ $reply->title }}
                    </a>
                </h3>
            </div>
            <div class="card-body fst-italic">
                "{{ Str::limit($reply->content, 180) }}"
            </div>
        </div>
    </div>
    @endif

    <div class="col-12" >
        <div class="card-body">
            <form action="{{ route('post.store', compact('forum','topic')) }}" method="POST">
                @csrf

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                <input type="hidden" name="reply_id" value="@if($reply){{ $reply->id }}@endif">

                <div class="mb-3 form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>

                <div class="mb-3 form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" id="content" rows="5"></textarea>
                </div>

                <div class="text-center form-group">
                    <button type="submit" class="text-white btn btn-lg btn-info"><i class="far fa-paper-plane"></i> Post</button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
