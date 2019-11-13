@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Editar indicador</h4>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar indicador</div>
                <div class="card-body">
                    <form method="post" action="{{ route('indicator.update', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input type="hidden" class="form-control" name="status" value="{{$data->status}}">
                                
                                <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus value="{{$data->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="desc" class="col-md-4 col-form-label text-md-right">Descrição</label>

                            <div class="col-md-6">
                                <textarea name="desc" cols="40" rows="5" class="form-control input-lg"  maxlength="500" required>{{$data->desc}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" name="update" class="btn btn-primary input-lg" value="Salvar" />
                                <button class="btn btn-secondary" type="button" onclick="history.go(-1)">Cancelar</button>
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
