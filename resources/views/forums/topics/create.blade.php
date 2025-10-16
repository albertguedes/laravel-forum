@extends('layouts.main')
@section('title', 'Create Topic')
@section('description','Create a new Topic')
@section('content')
<div class="p-3 mb-5 row card" >

    <div class="mb-5 col-12">
        {{ Breadcrumbs::render('forum.topic.create', $forum) }}
    </div>

    <div class="mb-5 col-12">
        <h1 class="text-uppercase" >
            <div class="row" >
                <div class="text-center col-1 d-flex align-items-center justify-content-center" >
                    <i class="fas fa-list fs-1" ></i>
                </div>
                <div class="col-11 d-flex align-items-center" >
                    Create Topic
                </div>
            </div>
        </h1>
    </div>

    <div class="col-12" >
        <div class="card-body">
            <form action="{{ route('forum.topic.store', compact('forum')) }}" method="POST">
                @csrf

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="forum_id" value="{{ $forum->id }}">

                <div class="mb-3 form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>

                <div class="mb-3 form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                </div>

                <div class="text-center form-group">
                    <button type="submit" class="text-white btn btn-lg btn-info"><i class="far fa-paper-plane"></i> Create</button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
