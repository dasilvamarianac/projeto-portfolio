@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Associar indicador</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">    
                <div class="card-header">Associar indicador</div>
                <div class="card-body">
                    <form method="post" action="{{ route('projectindicator.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="indicator" class="col-md-4 col-form-label text-md-right">Indicador</label>

                            <div class="col-md-6">
                                <select id="indicator"  class="form-control" name="indicator" required>
                                    @foreach($data as $row)
                                            <option value="{{$row->id}}">
                                                {{$row->name}}
                                            </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

                            <div class="col-md-6">
                                <select id="status" class="form-control" name="status" required>
                                    <option value="2">Em Análise</option>
                                    <option value="3">Análise Realizada</option>
                                    <option value="4">Análise Aprovada</option>
                                    <option value="5">Iniciado</option>
                                    <option value="6">Planejado</option>
                                    <option value="7">Em Andamento</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="min" class="col-md-4 col-form-label text-md-right">Mínimo</label>

                            <div class="col-md-6">
                                <input id="min" type="number" class="form-control" name="min_value" required autocomplete="min" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="max" class="col-md-4 col-form-label text-md-right">Máximo</label>

                            <div class="col-md-6">
                                <input id="max" type="number" class="form-control" name="max_value" required autocomplete="max" autofocus >
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="project" type="hidden" class="form-control" name="project" value = "{{$id}}">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" name="create" class="btn btn-primary input-lg" value="Salvar" />
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
