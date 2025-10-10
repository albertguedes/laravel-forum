@extends('layouts.main')
@section('title', 'About Us')
@section('content')
<div class="row" >

    <div class="col-12">
        {{ Breadcrumbs::render('about') }}
    </div>

    <div class="pb-5 col-12">
        <h1 class="text-uppercase" >About</h1>
    </div>
    <div class="pt-3 col-12" >
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Non
            consectetur a erat nam at lectus. Amet dictum sit amet justo donec
            enim diam vulputate ut pharetra sit amet aliquam. Diam in arcu
            cursus euismod. Ultrices dui sapien eget mi proin sed libero sed
            viverra aliquet eget.</p>

        <p>Augue lacus viverra vitae congue eu consequat ac felis. Ac turpis
            egestas integer eget aliquet. Consectetur purus ut faucibus pulvinar
             elementum integer. Odio pellentesque diam volutpat commodo sed
             egestas. Ut lectus arcu bibendum at varius vel pharetra vel turpis.
             Scelerisque in dictum non consectetur a. Lectus quam id leo in
             vitae turpis massa.</p>
    </div>
</div>
@endsection
