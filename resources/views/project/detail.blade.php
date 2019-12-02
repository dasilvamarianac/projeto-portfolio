@extends('layouts/app')
@section('content')
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div style="width: 600px">
                                <h2  class="text-white pb-2 fw-bold">{{$data->name}}</h2>
                                <h5 class="text-white op-7 mb-2">{{$data->desc}}</h5>
                            </div>
                            <div class="ml-md-auto py-2 py-md-0">
                                @if(($data->risk == 2 && $prog > 0) || ($data->risk != 2))
                                    @if($data->status < 8 && $acesso['status_change'] > 1 && $data->status != 1)
                                        <a href="" data-toggle="modal" data-target="#createmodal" data-delid="{{$data->id}}" class="btn btn-secondary btn-round mr-2 mt-2">
                                            Status
                                        </a>
                                    @endif
                                
                                    @if(count($indicators) > 0 && $acesso['indicator_value'] > 1)
                                        <a href="" data-toggle="modal" data-target="#valuermodal" data-delid="{{$data->id}}" class="btn btn-secondary btn-round mr-2 mt-2">
                                        Indicador
                                        </a>
                                    @endif
                                @endif
                                @if($data->status < 8 && $data->risk == 2 && $acesso['progress'] > 1)
                                    @if($prog > 0)
                                        <a href="" data-toggle="modal" data-target="#progressmodal" data-delid="{{$data->id}}" class="btn btn-secondary btn-round mr-2 mt-2">
                                    @else
                                        <a href="" data-toggle="modal" data-target="#progressmodal" data-delid="{{$data->id}}" class="btn btn-warning btn-round mr-2 mt-2">
                                    @endif
                                    Acompanhamento 
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">
                    <div class="row mt--2">
                        <div class="col-md-4">
                            <div class="card card-primary ">
                                <div class="card-body">
                                    <h4 class="mt-3 b-b1 pb-2 mb-4 fw-bold">Informações gerais</h4>
                                    <div id="activeUsersChart"></div>
                                    <h4 class="mt-2 mb-0 fw-bold">Data de início</h4>
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between pb-1 pt-1"><small>{{$data->dates}}</small></li>
                                    </ul>
                                    <h4 class="mb-0 fw-bold">Data de previsão</h4>
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between pb-1 pt-1"><small>{{$data->datep}}</small></li>
                                    </ul>
                                    <h4 class="mb-0 fw-bold">Data de Conclusão</h4>
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between pb-1 pt-1"><small>{{$data->datee}}</small> </li>
                                    </ul>
                                    <h4 class="mb-0 fw-bold">Orçamento</h4>
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between pb-1 pt-1"><small>R$ {{$data->budget}}</small></li>
                                    </ul>
                                    <h4 class="mb-0 fw-bold">Gerente</h4>
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between pb-1 pt-1"><small>{{$data->manager_name}}</small> </li>
                                    </ul>
                                    <h4 class="mb-0 fw-bold">Líder</h4>
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between pb-1 pt-1"><small>{{$data->leader_name}}</small> </li>
                                    </ul>
                                    <h4 class="mb-0 fw-bold">Líder do Escritório</h4>
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between pb-1 pt-1"><small>{{$data->office_leader_name}}</small></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @if($acesso['status_change'] > 0)
                        <div class="col-sm-6 col-md-5">
                            <div class="card full-height">
                                <div class="card-header">
                                    <div class="card-title"><b>Status Atual</b>: {{$data->status_name}}</div>
                                </div>
                                <div class="card-body">
                                    <ol class="activity-feed">
                                        @foreach($sta as $rows) 
                                        <li class="feed-item feed-item-{{$rows->status_color}}">
                                            <time class="date">{{$rows->date}}</time>
                                            <span class="text"><b>{{$rows->name}}</b> - {{$rows->status_name}}</span>
                                        </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                            <div class="col-sm-6 col-md-3">
                            @if($acesso['project_member'] > 0)
                                <a href="{{ url('/project/member/'.$data->id) }}" >
                                    <div class="card card-stats card-round">
                                        <div class="card-body ">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                        <i class="flaticon-users"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ml-3 ml-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">Membros</p>
                                                        <h4 class="card-title">{{$totalmem}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                            @if($acesso['project_indicators'] > 0)
                                <a href="{{ url('/project/indicator/'.$data->id) }}">
                                    <div class="card card-stats card-round">
                                    <div class="card-body ">
                                        <div class="row align-items-center">
                                            <div class="col-icon">
                                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                    <i class="icon-speedometer"></i>
                                                </div>
                                            </div>
                                            <div class="col col-stats ml-3 ml-sm-0">
                                                <div class="numbers">
                                                    <p class="card-category">Indicadores</p>
                                                    <h4 class="card-title">{{$totalind}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </a>
                            @endif
                            @if($data->scope != null )
                                <a href="{{ asset('escopos/')}}/{{$data->scope}}" download>
                                    <div class="card card-stats card-round">
                                    <div class="card-body ">
                                        <div class="row align-items-center">
                                            <div class="col-icon">
                                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                    <i class="fas fa-file-signature"></i>
                                                </div>
                                            </div>
                                            <div class="col col-stats ml-3 ml-sm-0">
                                                <div class="numbers">
                                                    <p class="card-category">Escopo</p>

                                                    <h4 class="card-title">{{$data->scope}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </a>
                            @endif
                            </div>
                        
                    </div>
                    @if($data->risk == 2 && $acesso['progress'] > 0)
                    <div class="row mt--2">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Acompanhamentos</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="multi-filter-select" class="display table table-striped table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Responsável</th>                                    
                                                    <th>Informativo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($acomp as $row) 
                                                <tr>
                                                    <td style="width:300px">{{ $row->date}}</td>
                                                    <td >{{ $row->name}}</td>
                                                    <td >{{ $row->inform}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
@include('statuschange/create')
@include('progress/create')
@include('indicatorvalue/create')
@endsection
