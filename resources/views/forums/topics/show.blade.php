@extends('layouts.main')
@section('title', strtoupper($topic->title))
@section('description',$topic->description)
@section('content')
<div class="row" >
    <div class="col-12 pb-3" >
        <h1 class="text-uppercase pb-3" >
            <i class="fas fa-list"></i>
            {{ $topic->title }}
        </h1>
        <h6 class="text-black-50" >
            <i class="fas fa-calendar-alt"></i>
            {{ $topic->created_at->format("Y M d") }}
            by <em>{{ ucwords($topic->user->profile->first_name) }}</em>
        </h6>
    </div>
    <div class="col-12 py-3" >
        {{ $topic->description }}
    </div>

    <div class="col-12 py-3" >
        <div class="row" >
            <div class="col-12 py-3" >
                @if($topic->posts)
                    @foreach($topic->posts as $post)
                    <div class="card mb-5">
                        <div class="card-header">
                            <h2>
                                <a href="{{ route('post', compact('forum','topic','post')) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            <h6 class="text-black-50">
                                <i class="fas fa-calendar-alt"></i>
                                {{ $post->created_at->format("Y M d") }}
                                by <em>[put user complete name here]</em>
                            </h6>
                        </div>
                        <div class="card-body">
                            {{ $post->content }}
                        </div>
                    </div>
                    @endforeach
                @else
                <div class="col-12 py-3" >
                    <p class="text-center" >There are no posts in this topic</p>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
