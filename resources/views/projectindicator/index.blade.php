@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Indicadores</h4>
	    </div>
	    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    	@endif
    	@if ($message = Session::get('errors'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="row ">
        	<div class="col-lg-1">
				<a href="/project/{{$id}}" class="btn btn-link col-lg-2 mb-3 ml-10 float-right">
            		<i class="icon-arrow-left"></i> 
            	</a>
		    </div>
            <div class="col-lg-11">
            	@if($acesso['project_indicators'] > 1)
            		<a class="btn btn-primary btn-border btn-round col-lg-2 mb-3 ml-10 float-right"  href="new/{{$id}}">
            			<i class="fas fa-plus"></i> Novo 
            		</a>
            	@endif
            </div> 
        </div>
        <div class="card">
            <div class="card-header">Indicadores do Projeto</div>
                <div class="card-body">
                	<div class="table-responsive">
						<table id="multi-filter-select" class="display table table-striped table-hover" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Status</th>
				                    <th>Indicador</th>
				                    <th>Máximo</th>
				                    <th>Mínimo</th>
				                    <th>Ações</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Status</th>
				                    <th>Indicador</th>              
				                    <th>Máximo</th>
				                    <th>Mínimo</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($data as $row)
								<tr>
									<td>{{ $row->status_name}}</td>
									<td>{{ $row->name}}</td>	
									<td>{{ $row->min_value}}</td>
									<td>{{ $row->max_value}}</td>
									<td>
										@if($acesso['project_indicators'] > 2)
											<button type="button" class="btn btn-icon btn-round btn-info" 
											onclick="window.location='{{ url("/project/indicator/edit/$row->id") }}'"
											>
												<i class="fas fa-pencil-alt"></i>
											</button>
										@endif
										@if($acesso['project_indicators'] > 3)
											<button type="button" class="btn btn-icon btn-round btn-danger" data-toggle="modal" data-target="#deletemodal" data-delid="{{$row->id}}">
												<i class="fas fa-trash-alt"></i>
											</button>
										@endif
									</td>
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
@include('projectindicator/delete')

@endsection

