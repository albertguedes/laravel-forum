@extends('layouts.main')
@section('title', strtoupper('Topics'))
@section('description','All topics')
@section('content')
<div class="row" >
    <div class="col-12 pb-3" >
        <h1 class="text-uppercase pb-3" >
            <i class="fas fa-list"></i> Topics
        </h1>
    </div>
    <div class="col-12 py-3" >
        <p>List of all topics</p>
    </div>

    <div class="col-12 py-3" >
        <div class="row" >
            <div class="col-12 py-3" >
                @if($topics)
                    @foreach($topics as $topic)
                    <div class="card mb-5">
                        <div class="card-header">
                            <h2>
                                <a href="{{ route('topic', compact('forum','topic')) }}">
                                    {{ $topic->title }}
                                </a>
                            </h2>
                            <h6 class="text-black-50">
                                <i class="fas fa-calendar-alt"></i>
                                {{ $topic->created_at->format("Y M d") }}
                                by <em>{{ ucwords($topic->user->id) }}</em>
                            </h6>
                        </div>
                        <div class="card-body">
                            {{ $topic->description }}
                        </div>
                    </div>
                    @endforeach
                @else
                <div class="col-12 py-3" >
                    <p class="text-center" >There are no topics created.</p>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
