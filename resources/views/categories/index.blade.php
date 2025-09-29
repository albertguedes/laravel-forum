@extends('layouts.main')
@section('title', 'Categories')
@section('description','Posts categories')
@section('content')
<div class="row" >
    <div class="col-12 pb-3" >
        <h1 class="text-uppercase pb-3" ><i class="fas fa-sitemap"></i> Categories</h1>
    </div>
    <div class="col-12" >
        <x-category-tree-component />
    </div>
</div>
@endsection
