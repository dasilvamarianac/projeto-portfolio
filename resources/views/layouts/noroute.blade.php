@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Sem Permissão</h4>
	    </div>
        <div class="alert alert-primary">
            <h2>Opa! Você está tentando acessar uma rota não implementada!</h2>
        </div>
        <div class="row">
            <div class="col-lg-8">
            	<img class="col-lg-8
            	" src="{{ asset('img/routes.png')}}" >
            </div>
        </div>
    </div>
</div>
@endsection

