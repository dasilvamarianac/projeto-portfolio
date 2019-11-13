@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Novo Projeto</h4>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">Novo Projeto</div>
                <div class="card-body">
                    <form method="post" action="{{ route('project.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="office_leader" type="hidden" class="form-control" name="office_leader" value="{{ Auth::user()->id }}">

                                <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="desc" class="col-md-4 col-form-label text-md-right">Descrição</label>

                            <div class="col-md-6">
                                <textarea name="desc" cols="40" rows="5" class="form-control input-lg"  maxlength="500" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Data de início</label>

                            <div class="col-md-6">
                                <input id="start_date" type="date" class="form-control" name="start_date" required autocomplete="name" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Data de previsão</label>

                            <div class="col-md-6">
                                <input id="expected_date" type="date" class="form-control" name="expected_date" required autocomplete="name" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Orçamento</label>

                            <div class="col-md-6">
                                <input id="budget" type="number" class="form-control" name="budget" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Risco</label>

                            <div class="col-md-6">
                                <select id="risk" class="form-control" name="risk" required>
                                    <option value="0">Baixo</option>
                                    <option value="1">Médio</option>
                                    <option value="2">Alto</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Gerente</label>

                            <div class="col-md-6">
                                <select id="manager"  class="form-control" name="manager" required>
                                    @foreach($users as $row)
                                        @if ($row->profile == 1)
                                            <option value="{{$row->id}}">
                                                {{$row->name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Líder</label>

                            <div class="col-md-6">
                                <select id="leader" class="form-control" name="leader" required>
                                    @foreach($users as $row)
                                        @if ($row->profile == 2)
                                            <option value="{{$row->id}}">
                                                {{$row->name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
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
