@extends('layouts/app')
@section('content')
            <div class="content">
                <div class="panel-header ">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div style="width: 600px">
                                <h1>{{$data->name}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">
                    <div class="row mt--2">
                        <div class="col-sm-6 col-md-3">
                                <div class="card card-stats card-round">
                                        <div class="card-body ">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                        <i class="flaticon-up-arrow-3"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ml-3 ml-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">Máximo</p>
                                                        <h4 class="card-title">{{$metrics->max}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div class="card card-stats card-round">
                                        <div class="card-body ">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                        <i class="flaticon-download-1"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ml-3 ml-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">Mínimo</p>
                                                        <h4 class="card-title">{{$metrics->min}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div class="card card-stats card-round">
                                        <div class="card-body ">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                        <i class="icon-calculator"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ml-3 ml-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">Média</p>
                                                        <h4 class="card-title">{{$metrics->med}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div class="card card-stats card-round">
                                        <div class="card-body ">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                        <i class="flaticon-hands"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ml-3 ml-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">% Dentro do esperado</p>
                                                        <h4 class="card-title">{{$perc}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                        </div>                          

                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Gráfico de média por Status</div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-container">
                                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt--2">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Valores</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="multi-filter-select" class="display table table-striped table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Status</th>
                                                    <th>Valor</th>               
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($all as $row) 
                                                <tr>
                                                    <td >{{ $row->date}}</td>
                                                    <td >{{ $row->status_name}}</td>
                                                    <td >{{ $row->value}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
@endsection
