@extends('layouts.main')
@section('title', 'Posts')
@section('description','List of the posts independently of posts and forums')
@section('content')
<div class="row" >

    <div class="mb-4 fs-6 col-12" >
        <a href="{{ route('home') }}" >
            <i class="fas fa-home"></i> Home
        </a>

        <span class="mx-2" ><i class="fas fa-angle-right"></i></span>

        <i class="fas fa-comments"></i> Posts
    </div>

    <div class="pb-3 col-12" >
        <h1 class="pb-3 text-uppercase" >
            <div class="row" >
                <div class="text-center col-1 d-flex align-items-center justify-content-center" >
                    <i class="fas fa-comments fs-1" ></i>
                </div>
                <div class="col-11 d-flex align-items-center" >
                    Posts
                </div>
            </div>
        </h1>
    </div>

    <div class="py-3 col-12" >
        <div class="row" >
                @if($posts)
                    @foreach($posts as $post)
                        <div class="py-3 col-12" >
                            <div class="mb-5 card">
                                <div class="card-header">
                                    <h2>
                                        <div class="row" >
                                            <div class="text-center col-1 d-flex align-items-center justify-content-center" >
                                                <i class="fas fa-comment fs-1" ></i>
                                            </div>
                                            <div class="col-11 d-flex align-items-center" >
                                                <a id="#{{ $post->id }}" href="{{ route('post', compact('post')) }}">
                                                     {{ $post->title }}
                                                </a>
                                            </div>
                                        </div>
                                    </h2>
                                    <h6 class="text-black-50">
                                        <strong>{{ $post->children_count }}</strong> Replies
                                        <span class="mx-2" >|</span>
                                        <i class="fas fa-calendar"></i>
                                        {{ $post->created_at->format("Y M d") }}
                                        by <a href="{{ route('user', [ 'user' => $post->user ]) }}" >
                                            <em>{{ $post->user->profile->username }}</em>
                                        </a>
                                    </h6>
                                </div>
                                <div class="card-body">

                                    @if ($post->parent)
                                    <div class="card" >
                                        <div class="card-header" >
                                            <div class="row" >
                                                <div class="text-center col-1 d-flex align-items-center justify-content-center" >
                                                    <i class="fas fa-comment fs-1" ></i>
                                                </div>
                                                <div class="col-11 d-flex align-items-center" >
                                                    <a id="#{{ $post->parent->id }}" href="{{ route('post', compact('post')) }}" >
                                                        {{ $post->parent->title }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body" >
                                            {{ Str::limit($post->parent->content, 24) }}
                                        </div>
                                    </div>
                                    @endif

                                    {{ Str::limit($post->content, 128) }}
                                </div>
                                <div class="card-footer d-flex justify-content-center" >
                                    <a href="{{ route('post.create', compact('post')) }}" class="btn btn-info" >
                                        <i class="fas fa-reply"></i> Reply
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="pt-5 col-12 d-flex justify-content-center" >
                        {!! $posts->links() !!}
                    </div>
                @else
                    <div class="py-3 col-12" >
                        <p class="text-center" >There are no posts in this post</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
