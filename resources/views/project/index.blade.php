@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Projetos</h4>
	    </div>
	    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    	@endif
        <div class="row ">
        	<div class="col-lg-1">
				<a href="/" class="btn btn-link col-lg-2 mb-3 ml-10 float-right">
            		<i class="icon-arrow-left"></i> 
            	</a>
		    </div>
            <div class="col-lg-11">
            	<button class="btn btn-primary btn-border btn-round col-lg-2 mb-3 ml-10 float-right"  onclick="window.location='{{ route('project.create') }}'">
            		<i class="fas fa-plus"></i> Novo
            	</button>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Projetos</div>
                <div class="card-body">
                	<div class="table-responsive">
						<table id="multi-filter-select" class="display table table-striped table-hover" cellspacing="0" width="100%">
							<thead>
								<tr>
				                    <th>Nome</th>
				                    <th>Gerente</th>
				                    <th>Status</th>
				                    <th>Previsão</th>
				                    <th>Ações</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $row)
								<tr>
									<td style="width:260px">{{$row->name}}</td>
									<td style="width:95px">{{$row->manager_name}}</td>
									<td>
										<span class="badge badge-{{$row->status_color}}">			{{$row->status_name}}
										</span>
									</td>
									<td>{{$row->expected_date}}</td>
									<td>
										<button type="button" class="btn btn-icon btn-round btn-secondary mb-1 mt-1" 
										onclick="window.location='{{ url("project/$row->id") }}'"
										>
											<i class="fas fa-info"></i>
										</button>
										@if($row->status <= 8)
											<a href="/project/edit/{{$row->id}}">
												<button type="button" class="btn btn-icon btn-round btn-info mb-1" 
											>
													<i class="fas fa-pencil-alt"></i>
												</button>
											</a>

											<button type="button" class="btn btn-icon btn-round btn-danger mb-1" data-toggle="modal" data-target="#deletemodal" data-delid="{{$row->id}}">
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
@include('project/delete')

@endsection

