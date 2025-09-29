@extends('layouts.main')
@section('title', 'Home')
@section('description','A simple forum made in laravel')
@section('content')
<div class="row" >
    <x-latest-forums-component />
</div>
@endsection
