@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Editar Projeto</h4>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Projeto</div>
                <div class="card-body">
                    <form method="post" action="{{ route('project.update', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="status" type="hidden" name="status" value="{{$data->status}}">

                                <input id="name" type="text" class="form-control" name="name" required autocomplete="name" value="{{$data->name}}" maxlength="255" autofocus >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="desc" class="col-md-4 col-form-label text-md-right">Descrição</label>

                            <div class="col-md-6">
                                <textarea name="desc" cols="40" rows="5" class="form-control input-lg"  maxlength="500" required>{{$data->desc}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Data de início</label>

                            <div class="col-md-6">
                                <input id="start_date" type="date" class="form-control" name="start_date" required value="{{$data->start_date}}" autocomplete="name" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Data de previsão</label>

                            <div class="col-md-6">
                                <input id="expected_date" type="date" class="form-control" name="expected_date" value="{{$data->expected_date}}" required autocomplete="name" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Orçamento</label>

                            <div class="col-md-6">
                                <input id="budget" type="text" class="form-control" name="budget" required autocomplete="name" value="{{$data->budget}}" autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Risco</label>

                            <div class="col-md-6">
                                <select id="risk" class="form-control" name="risk" required>
                                    <option value="0" {{ $data->risk == 0 ? 'selected':''}}>Baixo</option>
                                    <option value="1" {{ $data->risk == 1 ? 'selected':''}}>Médio</option>
                                    <option value="2"
                                    {{ $data->risk == 2 ? 'selected':''}}>Alto</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Gerente</label>

                            <div class="col-md-6">
                                <select id="manager"  class="form-control" name="manager" required>
                                    @foreach($users as $row)
                                        @if ($row->profile == 1)
                                            <option value="{{$row->id}}" {{$data->manager == $row->id ? 'selected':''}} >
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
                                            <option value="{{$row->id}}" {{$data->leader == $row->id ? 'selected':''}}>
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
