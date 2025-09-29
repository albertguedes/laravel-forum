@extends('layouts.main')
@section('title', strtoupper($forum->title))
@section('description',$forum->description)
@section('content')
<div class="row" >
    <div class="col-12 pb-3" >
        <h1 class="text-uppercase pb-3" >
            <i class="fas fa-landmark"></i>
            {{ $forum->title }}
        </h1>
        <h6 class="text-black-50" >
            <i class="fas fa-calendar-alt"></i>
            {{ $forum->created_at->format("Y M d") }}
            by <em>{{ ucwords($forum->user->profile->first_name) }}</em>
        </h6>
    </div>
    <div class="col-12 py-3" >
        {{ $forum->description }}
    </div>

    <div class="col-12 py-3" >
        <div class="row" >
            <div class="col-12 py-3" >
                @if($forum->topics)
                    @foreach($forum->topics as $topic)
                    <div class="card mb-5">
                        <div class="card-header">
                            <div class="row" >
                                <div class="col-1 d-flex align-items-center" >
                                    <i class="fas fa-list fs-1" ></i>
                                </div>
                                <div class="col-11 ps-4" >
                                    <h2>
                                        <a href="{{ route('topic', compact('forum','topic')) }}" >
                                            {{ $topic->title }}
                                        </a>
                                    </h2>
                                    <h6 class="text-black-50" >
                                        <i class="fas fa-calendar-alt"></i> {{ $topic->created_at->format("Y M d") }} by
                                    </h6>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            {{ $topic->description }}
                            <p class="fs-5 mt-3">
                                <a href="{{ route('topic', compact('forum','topic')) }}">
                                    Read More &raquo;
                                </a>
                            </p>
                        </div>
                    </div>
                    @endforeach
                @else
                <div class="col-12 py-3" >
                    <p class="text-center" >There are no topics in this forum</p>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
