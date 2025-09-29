@extends('layouts.admin')
@section('title', '404 - Page Not Found' )
@section('content')
<div class="row card p-5 shadow" >
    <div class="card-body" >
        <div class="col-12 py-5" >
            <h1 class="text-capitalize card-title" >404 - Page Not Found</h1>
            <p>A página com o endereço solicitado não existe.</p>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Voltar para a página inicial</a>
        </div>
    </div>
</div>
@endsection
