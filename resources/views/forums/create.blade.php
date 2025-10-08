@extends('layouts.main')
@section('title', 'Create Forum')
@section('description','Create a new forum')
@section('content')
<div class="row" >

    <div class="mt-4 mb-5 fs-6 col-12" >
        <a href="{{ route('home') }}" >
            <i class="fas fa-home"></i> Home
        </a>

        <span class="mx-2" ><i class="fas fa-angle-right"></i></span>

        <a href="{{ route('forums') }}" >
            <i class="fas fa-landmark"></i> Forums
        </a>

        <span class="mx-2" ><i class="fas fa-angle-right"></i></span>

        <strong>Create Forum</strong>
    </div>

    <div class="pb-3 col-12" >
        <h1 class="pb-3 text-uppercase" >
            <div class="row" >
                <div class="text-center col-1 d-flex align-items-center justify-content-center" >
                    <i class="fas fa-landmark fs-1" ></i>
                </div>
                <div class="col-11 d-flex align-items-center" >
                    <h1>
                        Create Forum
                    </h1>
                </div>
            </div>
        </h1>
    </div>

    <div class="pb-3 col-12" >
        <div class="card" >
            <div class="card-body" >
                <form action="{{ route('forum.store') }}" method="POST" >
                    @csrf
                    <div class="row" >
                        <div class="mb-3 col-12" >
                            <label for="title" class="form-label" >Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror('title') is-valid" id="title" placeholder="Type The Forum Title" required>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3 col-12" >
                            <label for="description" class="form-label" >Description</label>
                            <textarea name="description" rows="7" class="form-control @error('description') is-invalid @enderror('description') is-valid" id="description" placeholder="Type The Forum Description" required></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="text-center col-12" >
                            <button type="submit" class="btn btn-info" >Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
