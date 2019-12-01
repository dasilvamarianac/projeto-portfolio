@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Editar usuário</h4>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar usuário') }}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('user.update', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                         @method('PATCH')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"required autocomplete="name" autofocus value="{{$data->name}}" maxlength="255" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$data->email}}" required autocomplete="email" >
                                <input type="hidden" class="form-control" name="status" value="{{$data->status}}" maxlength="100">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" value="12345678" pattern=".{0}|.{8,}"  title="Necessário no mínimo 8 caractéres" maxlength="100">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" value="12345678" pattern=".{0}|.{8,}" title="Necessário no mínimo 8 caractéres" maxlength="100">
                            </div>
                        </div> 

                        
                        <div class="form-group row">
                            <label for="profile" class="col-md-4 col-form-label text-md-right">{{ __('Perfil') }}</label>

                            <div class="col-md-6">
                                @if(Auth::user()->id != $data->id)
                                    <select id="profile" type="password" class="form-control" name="profile" required>
                                @else
                                    <select id="profile" type="password" class="form-control" name="profile" required disabled>
                                @endif
                                    <option value="0" 
                                    {{ $data->profile == 0 ? 'selected':''}}> {{ __('Administrador') }}</option>
                                    <option value="1" 
                                    {{$data->profile == 1 ? 'selected':''}}>{{ __('Gerente') }}</option>
                                   <option value="2" 
                                    {{$data->profile == 2 ? 'selected':''}}>{{ __('Líder de Projeto') }}</option>
                                    <option value="3" 
                                    {{$data->profile == 3 ? 'selected':''}}>{{ __('Líder de Escritório') }}</option>
                                    <option value="4" 
                                    {{$data->profile == 4 ? 'selected':''}}>{{ __('Alta Direção') }}</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" name="update" class="btn btn-primary input-lg" value="Salvar" />
                                <button class="btn btn-secondary" type="button" onclick="window.history.go(-1); return false;">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
