@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Permissões de Acesso</h4>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">Permissões de Acesso</div>
                <div class="card-body">
                    <form method="post" action="{{ route('permission.update', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="users" class="col-md-4 col-form-label text-md-right">Usuários</label>
                            <div class="col-md-6">
                                <select id="users" class="form-control" name="users" required>
                                    <option value="0" {{ $data->users == 0 ? 'selected':''}}>Nenhum</option>
                                    <option value="1" {{ $data->users == 1 ? 'selected':''}}>Visualização</option>
                                    <option value="2" {{ $data->users == 2 ? 'selected':''}}>Inclusão</option>
                                    <option value="3" {{ $data->users == 3 ? 'selected':''}}>Edição</option>
                                    <option value="4" {{ $data->users == 4 ? 'selected':''}}>Exclusão</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="permissions" class="col-md-4 col-form-label text-md-right">Permissões</label>
                            <div class="col-md-6">
                                <select id="permissions" class="form-control" name="permissions" required>
                                    <option value="0" {{ $data->permissions == 0 ? 'selected':''}}>Nenhum</option>
                                    <option value="1" {{ $data->permissions == 1 ? 'selected':''}}>Visualização</option>
                                    <option value="3" {{ $data->permissions == 3 ? 'selected':''}}>Edição</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="indicators" class="col-md-4 col-form-label text-md-right">Indicadores</label>
                            <div class="col-md-6">
                                <select id="indicators" class="form-control" name="indicators" required>
                                    <option value="0" {{ $data->indicators == 0 ? 'selected':''}}>Nenhum</option>
                                    <option value="1" {{ $data->indicators == 1 ? 'selected':''}}>Visualização</option>
                                    <option value="2" {{ $data->indicators == 2 ? 'selected':''}}>Inclusão</option>
                                    <option value="3" {{ $data->indicators == 3 ? 'selected':''}}>Edição</option>
                                    <option value="4" {{ $data->indicators == 4 ? 'selected':''}}>Exclusão</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="members" class="col-md-4 col-form-label text-md-right">Membros</label>
                            <div class="col-md-6">
                                <select id="members" class="form-control" name="members" required>
                                    <option value="0" {{ $data->members == 0 ? 'selected':''}}>Nenhum</option>
                                    <option value="1" {{ $data->members == 1 ? 'selected':''}}>Visualização</option>
                                    <option value="2" {{ $data->members == 2 ? 'selected':''}}>Inclusão</option>
                                    <option value="3" {{ $data->members == 3 ? 'selected':''}}>Edição</option>
                                    <option value="4" {{ $data->members == 4 ? 'selected':''}}>Exclusão</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="projects" class="col-md-4 col-form-label text-md-right">Projetos</label>
                            <div class="col-md-6">
                                <select id="projects" class="form-control" name="projects" required>
                                    <option value="0" {{ $data->projects == 0 ? 'selected':''}}>Nenhum</option>
                                    <option value="1" {{ $data->projects == 1 ? 'selected':''}}>Visualização</option>
                                    <option value="2" {{ $data->projects == 2 ? 'selected':''}}>Inclusão</option>
                                    <option value="3" {{ $data->projects == 3 ? 'selected':''}}>Edição</option>
                                    <option value="4" {{ $data->projects == 4 ? 'selected':''}}>Exclusão</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="project_detail" class="col-md-4 col-form-label text-md-right">Projeto Detalhado</label>
                            <div class="col-md-6">
                                <select id="project_detail" class="form-control" name="project_detail" required>
                                    <option value="0" {{ $data->project_detail == 0 ? 'selected':''}}>Nenhum</option>
                                    <option value="1" {{ $data->project_detail == 1 ? 'selected':''}}>Visualização</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="project_member" class="col-md-4 col-form-label text-md-right">Membros do Projeto</label>
                            <div class="col-md-6">
                                <select id="project_member" class="form-control" name="project_member" required>
                                    <option value="0" {{ $data->project_member == 0 ? 'selected':''}}>Nenhum</option>
                                    <option value="1" {{ $data->project_member == 1 ? 'selected':''}}>Visualização</option>
                                    <option value="2" {{ $data->project_member == 2 ? 'selected':''}}>Inclusão</option>
                                    <option value="4" {{ $data->project_member == 4 ? 'selected':''}}>Exclusão</option>
                                </select>
                            </div>
                        </div>        
                        <div class="form-group row">
                            <label for="project_indicators" class="col-md-4 col-form-label text-md-right">Indicadores do Projeto</label>
                            <div class="col-md-6">
                                <select id="project_indicators" class="form-control" name="project_indicators" required>
                                    <option value="0" {{ $data->project_indicators == 0 ? 'selected':''}}>Nenhum</option>
                                    <option value="1" {{ $data->project_indicators == 1 ? 'selected':''}}>Visualização</option>
                                    <option value="2" {{ $data->project_indicators == 2 ? 'selected':''}}>Inclusão</option>
                                    <option value="3" {{ $data->project_indicators == 3 ? 'selected':''}}>Edição</option>
                                    <option value="4" {{ $data->project_indicators == 4 ? 'selected':''}}>Exclusão</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status_change" class="col-md-4 col-form-label text-md-right"> Status</label>
                            <div class="col-md-6">
                                <select id="status_change" class="form-control" name="status_change" required>
                                    <option value="0" {{ $data->status_change == 0 ? 'selected':''}}>Nenhum</option>
                                    <option value="1" {{ $data->status_change == 1 ? 'selected':''}}>Visualização</option>
                                    <option value="3" {{ $data->status_change == 3 ? 'selected':''}}>Edição</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="indicator_value" class="col-md-4 col-form-label text-md-right">Valor de Indicador</label>
                            <div class="col-md-6">
                                <select id="indicator_value" class="form-control" name="indicator_value" required>
                                    <option value="0" {{ $data->indicator_value == 0 ? 'selected':''}}>Nenhum</option>
                                    <option value="1" {{ $data->indicator_value == 1 ? 'selected':''}}>Visualização</option>
                                    <option value="2" {{ $data->indicator_value == 2 ? 'selected':''}}>Inclusão</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="progress" class="col-md-4 col-form-label text-md-right">Acompanhamentos</label>
                            <div class="col-md-6">
                                <select id="progress" class="form-control" name="progress" required>
                                    <option value="0" {{ $data->progress == 0 ? 'selected':''}}>Nenhum</option>
                                    <option value="1" {{ $data->progress == 1 ? 'selected':''}}>Visualização</option>
                                    <option value="2" {{ $data->progress == 2 ? 'selected':''}}>Inclusão</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reports" class="col-md-4 col-form-label text-md-right">Relatórios</label>
                            <div class="col-md-6">
                                <select id="reports" class="form-control" name="reports" required>
                                    <option value="0" {{ $data->reports == 0 ? 'selected':''}}>Nenhum</option>
                                    <option value="1" {{ $data->reports == 1 ? 'selected':''}}>Visualização</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="analysis" class="col-md-4 col-form-label text-md-right">Análise de Indicadores</label>
                            <div class="col-md-6">
                                <select id="analysis" class="form-control" name="analysis" required>
                                    <option value="0" {{ $data->analysis == 0 ? 'selected':''}}>Nenhum</option>
                                    <option value="1" {{ $data->analysis == 1 ? 'selected':''}}>Visualização</option>
                                </select>
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
                                <a href="/permission" class="btn btn-secondary"  >Cancelar</a>
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
