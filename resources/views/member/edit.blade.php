@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Editar membro</h4>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar membro</div>
                <div class="card-body">
                    <form method="post" action="{{ route('member.update', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input type="hidden" class="form-control" name="status" value="{{$data->status}}">
                                
                                <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus value="{{$data->name}}">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" name="update" class="btn btn-primary input-lg" value="Salvar" />
                                <button class="btn btn-secondary" type="button" onclick="window.location='{{ route('member.index') }}'">Cancelar</button>
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
