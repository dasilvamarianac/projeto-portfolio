@extends('layouts/app')
@section('content')
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2  class="text-white pb-2 fw-bold">{{$data->name}}</h2>
                                <h5 class="text-white op-7 mb-2">{{$data->desc}}</h5>
                            </div>
                            <div class="ml-md-auto py-2 py-md-0">
                                <a href="" data-toggle="modal" data-target="#createmodal" data-delid="{{$data->id}}" class="btn btn-secondary btn-round mr-2 mt-2">
                                    Status
                                </a>
                                
                                <a href="{{ url('/project/member/'.$data->id) }}" class="btn btn-secondary btn-round mr-2 mt-2">Membros</a>
                                
                                <a href="{{ url('/project/indicator/'.$data->id) }}" class="btn btn-secondary btn-round mr-2 mt-2">Indicadores</a>
                                @if($data->risk == 2)
                                    <a href="" class="btn btn-secondary btn-round mr-2 mt-2">
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
                                    <h4 class="mt-3 b-b1 pb-2 mb-4 fw-bold">Membros do projeto</h4>
                                    <h3 class="mb-4 fw-bold">{{$total}}</h1>
                                    <h4 class="mt-3 b-b1 pb-2 mb-4 fw-bold">Informações gerais</h4>
                                    <div id="activeUsersChart"></div>
                                    <h4 class="mt-2 mb-0 fw-bold">Data de início</h4>
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between pb-1 pt-1"><small>{{$data->start_date}}</small></li>
                                    </ul>
                                    <h4 class="mb-0 fw-bold">Data de previsão</h4>
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between pb-1 pt-1"><small>{{$data->expected_date}}</small></li>
                                    </ul>
                                    <h4 class="mb-0 fw-bold">Data de Conclusão</h4>
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between pb-1 pt-1"><small>{{$data->end_date}}</small> </li>
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
                        <div class="col-md-8">
                            <div class="card full-height">
                                <div class="card-header">
                                    <div class="card-title">Status: {{$data->status_name}}</div>
                                </div>
                                <div class="card-body">
                                    <ol class="activity-feed">
                                        <li class="feed-item feed-item-secondary">
                                            <time class="date" datetime="9-25">Sep 25</time>
                                            <span class="text">Responded to need <a href="#">"Volunteer opportunity"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-success">
                                            <time class="date" datetime="9-24">Sep 24</time>
                                            <span class="text">Added an interest <a href="#">"Volunteer Activities"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-info">
                                            <time class="date" datetime="9-23">Sep 23</time>
                                            <span class="text">Joined the group <a href="single-group.php">"Boardsmanship Forum"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-warning">
                                            <time class="date" datetime="9-21">Sep 21</time>
                                            <span class="text">Responded to need <a href="#">"In-Kind Opportunity"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-danger">
                                            <time class="date" datetime="9-18">Sep 18</time>
                                            <span class="text">Created need <a href="#">"Volunteer Opportunity"</a></span>
                                        </li>
                                        <li class="feed-item">
                                            <time class="date" datetime="9-17">Sep 17</time>
                                            <span class="text">Attending the event <a href="single-event.php">"Some New Event"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-secondary">
                                            <time class="date" datetime="9-25">Sep 25</time>
                                            <span class="text">Responded to need <a href="#">"Volunteer opportunity"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-success">
                                            <time class="date" datetime="9-24">Sep 24</time>
                                            <span class="text">Added an interest <a href="#">"Volunteer Activities"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-info">
                                            <time class="date" datetime="9-23">Sep 23</time>
                                            <span class="text">Joined the group <a href="single-group.php">"Boardsmanship Forum"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-warning">
                                            <time class="date" datetime="9-21">Sep 21</time>
                                            <span class="text">Responded to need <a href="#">"In-Kind Opportunity"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-danger">
                                            <time class="date" datetime="9-18">Sep 18</time>
                                            <span class="text">Created need <a href="#">"Volunteer Opportunity"</a></span>
                                        </li>
                                        <li class="feed-item">
                                            <time class="date" datetime="9-17">Sep 17</time>
                                            <span class="text">Attending the event <a href="single-event.php">"Some New Event"</a></span>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@include('statuschange/create')