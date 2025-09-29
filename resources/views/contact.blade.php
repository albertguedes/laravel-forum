@extends('layouts.main')
@section('title', 'Contact')
@section('description','Contact Us')
@section('content')
<div class="row">
    <div class="col-12 pb-5">
        <h2 class="text-center text-md-start text-uppercase" >Contact</h2>
    </div>
    <div class="col-12">
        @include('partials.flash-message')
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 pb-5">
        <address class="text-center text-sm-center text-md-start text-lg-start text-xl-start text-xxl-start" >
            <h5><i class="fas fa-map-marked-alt"></i> Address</h5>
            <p>Sample Street, 123</p>
            <p>Sample City, AB</p>
            <br>
            <h6><i class="far fa-envelope"></i> Email</h6>
            <p><a href="#">contact@fakemail.com</a></p>
            <br>
            <h6><i class="fas fa-phone-alt"></i> Telephone</h6>
            <p>+1 11 123-456-789</p>
        </address>
    </div>
    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8" >
        <form class="row" method="POST" action="{{ route('sendmessage') }}">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="name-addon"><i class="fas fa-id-card"></i></span>
                <input type="text" name="message[name]" class="form-control" id="message-name" aria-describedby="nameHelp" placeholder="Type your name" value="" >
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="email-addon"><i class="far fa-envelope"></i></span>
                <input type="email" name="message[email]" class="form-control" id="message-email" aria-describedby="emailHelp" placeholder="Type your email" value="" >
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="subject-addon"><i class="far fa-list-alt"></i></span>
                <input type="text" name="message[subject]" class="form-control" id="message-subject" aria-describedby="subjectHelp" placeholder="Type subject of message" value="" >
            </div>
            <div class="mb-3">
                <textarea name="message[content]" rows=10 class="form-control" id="message-content" aria-describedby="contentHelp" placeholder="Type the message" ></textarea>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <button type="submit" class="btn btn-dark" id="submit" ><i class="far fa-paper-plane"></i> Send Message</button>
            </div>
        </form>
    </div>
</div>
@endsection
