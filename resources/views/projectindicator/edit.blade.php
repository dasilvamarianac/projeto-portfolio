@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Editar indicador</h4>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
            @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="card">
                <div class="card-header">Editar indicador</div>
                <div class="card-body">
                    <form method="post" action="{{ route('projectindicator.update', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="indicator" class="col-md-4 col-form-label text-md-right">Indicador</label>

                            <div class="col-md-6">
                                <input id="indicator" type="text" class="form-control" name="indicator" value = "{{$data->name}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

                            <div class="col-md-6">
                                <select id="status" class="form-control" name="status" required>
                                    <option value="2" {{ $data->status == 2 ? 'selected':''}}>Em Análise</option>
                                    <option value="3" {{ $data->status == 3 ? 'selected':''}}>Análise Realizada</option>
                                    <option value="4" {{ $data->status == 4 ? 'selected':''}}>Análise Aprovada</option>
                                    <option value="5" {{ $data->status == 5 ? 'selected':''}}>Iniciado</option>
                                    <option value="6" {{ $data->status == 6 ? 'selected':''}}>Planejado</option>
                                    <option value="7" {{ $data->status == 7 ? 'selected':''}}>Em Andamento</option>
                                    <option value="8" {{ $data->status == 8 ? 'selected':''}}>Encerrado</option>
                                    <option value="9" {{ $data->status == 9 ? 'selected':''}}>Cancelado</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="min" class="col-md-4 col-form-label text-md-right">Mínimo</label>

                            <div class="col-md-6">
                                <input id="min" type="text" class="form-control" name="min_value" required autocomplete="min" value = "{{$data->min_value}}"autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="max" class="col-md-4 col-form-label text-md-right">Máximo</label>

                            <div class="col-md-6">
                                <input id="max" type="text" class="form-control" name="max_value" required autocomplete="max" value = "{{$data->max_value}}"autofocus >
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="id" type="hidden" class="form-control" name="id" value = "{{$data->id}}">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" name="update" class="btn btn-primary input-lg" value="Salvar" />
                                <button class="btn btn-secondary" type="button" onclick="window.location='{{ route('projectindicator.index') }}'">Cancelar</button>
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
