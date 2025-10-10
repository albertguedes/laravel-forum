@extends('layouts.main')
@section('title', 'Archive')
@section('description','Archive of all posts')
@section('content')
<div class="row" >
    <div class="col-12">
        {{ Breadcrumbs::render('archive') }}
    </div>
    <div class="pb-5 col-12">
        <h2 class="text-center text-md-start text-uppercase" >
            <i class="fas fa-archive"></i> Archive
        </h2>
    </div>
    <div class="col-12" >
        <x-archive-component />
    </div>
</div>
@endsection
