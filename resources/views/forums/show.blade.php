@extends('layouts.main')
@section('title', strtoupper($forum->title))
@section('description',$forum->description)
@section('content')
<div class="p-3 row card" >

    <div class="mb-5 col-12">
        {{ Breadcrumbs::render('forum', $forum) }}
    </div>

    <div class="mb-5 col-12">
        <h1 class="text-uppercase" >
            <div class="row" >
                <div class="text-center col-1 d-flex align-items-center justify-content-center" >
                    <i class="fas fa-landmark fs-1" ></i>
                </div>
                <div class="col-11 d-flex align-items-center" >
                    <h1>
                        {{ $forum->title }}
                    </h1>
                </div>
            </div>
        </h1>
    </div>
    <div class="mb-5 col-12" >
        {{ $forum->description }}
    </div>
    <div class="col-12" >
        <h6 class="text-black-50" >
            <i class="fas fa-calendar-alt"></i>
            {{ $forum->created_at->format("Y M d") }}
            by

            @if ($forum->user->is_active)
            <a href="{{ route('user', [ 'user' => $forum->user->id ]) }}" >
                <em>{{ $forum->user->profile->username }}</em>
            </a>
            @else
            <strong>
                <em>{{ $forum->user->profile->username }}</em>
            </strong>
            @endif
        </h6>
    </div>
</div>

<div class="row" >

    <div class="pt-5 pb-3 col-12" >
        <h2>LATEST TOPICS</h2>
    </div>

    <div class="py-3 col-12" >
        <div class="row" >

            @if($topics)
                @foreach($topics as $topic)
                <div class="py-3 col-12" >
                    <div class="mb-5 card" >
                        <div class="bg-white border-0 card-header" >
                            <div class="row" >
                                <div class="text-center col-1 d-flex align-items-center justify-content-center" >
                                    <i class="fas fa-list fs-1" ></i>
                                </div>
                                <div class="col-11" >
                                    <h3>
                                        <a href="{{ route('forum.topic',compact('forum','topic')) }}" >
                                            {{ $topic->title }}
                                        </a>
                                    </h3>
                                    <h6 class="text-black-50" >
                                        <strong>{{ $topic->posts_count }}</strong> Posts
                                        <span class="mx-2" >|</span>
                                        <span class="text-black-50" >
                                            {{ $topic->created_at->format("Y M d") }} by
                                            <em>
                                                @if ($topic->user->is_active)
                                                <a href="{{ route('user', [ 'user' => $topic->user->id ]) }}" >
                                                    {{ $topic->user->profile->username }}</em>
                                                </a>
                                                @else
                                                <strong>
                                                    {{ $topic->user->profile->username }}
                                                </strong>
                                                @endif
                                            </em>
                                        </span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" >
                            {{ $topic->description }}
                            <p class="mt-3 text-end fs-5" >
                                <a class="btn btn-info" href="{{ route('forum.topic', compact('forum','topic')) }}" >
                                    ENTER
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="pt-5 col-12 d-flex justify-content-center">
                    {!! $topics->links() !!}
                </div>
            @else
                <div class="py-3 col-12" >
                    <p class="text-center" >There are no topics in this forum yet</p>
                </div>
            @endif
            </div>
        </div>
    </div>

</div>
@endsection
