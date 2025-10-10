@extends('layouts.main')
@section('title', 'Home')
@section('description','A simple forum made in laravel')
@section('content')
<div class="row" >
    <div class="pb-3 col-12" >
        @if($latest_forums->count())
            @foreach( $latest_forums as $forum )
            <div class="mb-5 card" >
                <div class="bg-white border-0 card-header" >
                    <div class="row" >
                        <div class="text-center col-1 d-flex align-items-center justify-content-center" >
                            <i class="fas fa-landmark fs-1" ></i>
                        </div>
                        <div class="col-11" >
                            <h2>
                                <a href="{{ route('forum',compact('forum')) }}" >
                                    {{ $forum->title }}
                                </a>
                            </h2>
                            <h6 class="text-black-50" >
                                <strong>{{ $forum->topics_count }}</strong> Topics
                                <span class="mx-2" >|</span>
                                <span class="text-black-50" >
                                    {{ $forum->created_at->format("Y M d") }} by
                                    <em>
                                        @if ($forum->user->is_active)
                                        <a href="{{ route('user', [ 'user' => $forum->user->id ]) }}" >
                                            {{ $forum->user->profile->username }}</em>
                                        </a>
                                        @else
                                        <strong>{{ $forum->user->profile->username }}</strong>
                                        @endif
                                    </em>
                                </span>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="card-body" >
                    {{ $forum->description }}
                    <p class="mt-3 text-end fs-5" >
                        <a class="btn btn-info" href="{{ route('forum', compact('forum')) }}" >
                            ENTER
                        </a>
                    </p>
                </div>
            </div>
            @endforeach
            <div class="pt-5 d-flex justify-content-center">
                {!! $latest_forums->links() !!}
            </div>
        @else
        <div class="py-3 col-12" >
            <p class="text-center" >There are no forums yet</p>
        </div>
        @endif
    </div>
</div>
@endsection
