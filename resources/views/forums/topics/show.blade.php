@extends('layouts.main')
@section('title', strtoupper($topic->title))
@section('description',$topic->description)
@section('content')
<div class="row" >

    <div class="mb-4 fs-6 col-12" >
        <a href="{{ route('home') }}" >
            <i class="fas fa-home"></i> Home
        </a>

        <span class="mx-2" ><i class="fas fa-angle-right"></i></span>

        <a href="{{ route('forum', [ 'forum' => $forum ]) }}" >
            <i class="fas fa-landmark"></i> <em>{{ Str::limit($forum->title, 16) }}</em>
        </a>

        <span class="mx-2" ><i class="fas fa-angle-right"></i></span>

        <i class="fas fa-list"></i> {{ $topic->title }}
    </div>

    <div class="pb-3 col-12" >
        <h1 class="pb-3 text-uppercase" >
            <div class="row" >
                <div class="text-center col-1 d-flex align-items-center justify-content-center" >
                    <i class="fas fa-list fs-1" ></i>
                </div>
                <div class="col-11 d-flex align-items-center" >
                    {{ $topic->title }}
                </div>
            </div>
        </h1>
        <h6 class="text-black-50" >
            <i class="fas fa-calendar"></i> {{ $topic->created_at->format("Y M d") }} by
            <em>
                @if ($topic->user->is_active)
                <a href="{{ route('user', [ 'user' => $topic->user ]) }}" >
                    {{ $topic->user->profile->username }}
                </a>
                @else
                <strong>{{ $topic->user->profile->username }}</strong>
                @endif
            </em>
        </h6>
    </div>

    <div class="py-3 col-12" >
        {{ $topic->description }}
    </div>

    <div class="pt-5 pb-3 col-12" >
        <h2>LIST OF POSTS</h2>
    </div>

    <div class="py-3 col-12" >
        <div class="row" >
                @if($posts)
                    @foreach($posts as $post)
                    <div class="py-3 col-12" >
                        <div class="mb-5 card">
                            <div class="card-header">
                                <div class="row" >
                                    <div class="text-center col-1 d-flex align-items-center justify-content-center" >
                                        <i class="fas fa-comment fs-1" ></i>
                                    </div>
                                    <div class="col-11" >
                                        <h3>
                                            <a href="{{ route('forum.topic.post', compact('forum','topic','post')) }}">
                                                {{ $post->title }} #{{ $post->id }}
                                            </a>
                                        </h3>

                                        <h6 class="text-black-50">
                                            <strong>{{ $post->children_count }}</strong> Replies
                                            <span class="mx-2" >|</span>
                                            <i class="fas fa-calendar"></i>
                                            {{ $post->created_at->format("Y M d") }}
                                            by
                                            <em>
                                                @if ($post->user->is_active)
                                                <a href="{{ route('user', [ 'user' => $post->user ]) }}" >
                                                    {{ $post->user->profile->username }}
                                                </a>
                                                @else
                                                <strong>{{ $post->user->profile->username }}</strong>
                                                @endif
                                            </em>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {{ $post->content }}
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="pt-5 col-12 d-flex justify-content-center" >
                        {!! $posts->links() !!}
                    </div>
                @else
                <div class="py-3 col-12" >
                    <p class="text-center" >There are no posts in this topic</p>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
