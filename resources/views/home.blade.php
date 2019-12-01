@extends('layouts/app')
@section('content')
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white pb-2 fw-bold">Olá {{ Auth::user()->name }}</h2>
                                <h5 class="text-white op-7 mb-2">Bem vindx ao Portfoli!</h5>
                            </div>
                            <div class="ml-md-auto py-2 py-md-0">
                                 <button data-toggle="tooltip" data-html="true" title="Editar" type="button" class="btn btn-icon btn-round btn-primary" 
                                        onclick="window.location.href='/user/edit/{{Auth::user()->id}}' ;" >
                                            <i class="fas fa-user-edit"></i>
                                </button>
                                <button  type="button" class="btn btn-icon btn-round btn-primary" 
                                        onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    <i class="fas fa-door-open" data-toggle="tooltip" data-html="true" title="Logout"></i>
                                            
                                </button>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">
                    <div class="row mt--2">
                        <div class="col-md-6">
                            <div class="card full-height">
                                <div class="card-body">
                                    <div class="card-title">Acesso Rápido</div>
                                    <div class="card-category">Aqui você encontra as funcionalidades as quais tem acesso de uma maneira mais simples e direta. </div>
                                    <div class="d-flex flex-wrap d pb-2 pt-4">
                                        @if($acesso['projects'] > 0)
                                            <button class="btn btn-secondary btn-round mr-3 mb-3" onclick="window.location.href='/project' ;" >Projetos</button>
                                        @endif
                                        @if($acesso['indicators'] > 0)
                                            <button class="btn btn-secondary btn-round mr-3 mb-3" onclick="window.location.href='/indicator' ;" >Indicadores</button>
                                        @endif
                                        @if($acesso['members'] > 0)
                                            <button class="btn btn-secondary btn-round mr-3 mb-3" onclick="window.location.href='/member' ;" >Membros</button>
                                        @endif
                                        @if($acesso['reports'] > 0)
                                            <button class="btn btn-secondary btn-round mr-3 mb-3" onclick="window.location.href='/report/all' ;" >Relatório - Geral</button>
                                        @endif
                                        @if($acesso['reports'] > 0)
                                            <button class="btn btn-secondary btn-round mr-3 mb-3" onclick="window.location.href='/reports' ;" >Relatório - Projeto</button>
                                        @endif
                                        @if($acesso['users'] > 0)
                                            <button class="btn btn-secondary btn-round mr-3 mb-3" onclick="window.location.href='/user' ;" >Usuários</button>
                                        @endif
                                        @if($acesso['permissions'] > 0)
                                            <button class="btn btn-secondary btn-round mr-3 mb-3" onclick="window.location.href='/permission' ;" >Permissões</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection