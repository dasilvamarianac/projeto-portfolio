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
            <div class="col-lg-12">
            	<button class="btn btn-primary btn-border btn-round col-lg-2 mb-3 ml-10 float-right"  onclick="window.location='{{ route('project.create') }}'">
            		<i class="fas fa-plus"></i> Novo</button>
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
							<tfoot>
								<tr>
				                    <th>Nome</th>
				                    <th>Gerente</th>
				                    <th>Status</th>
				                    <th>Previsão</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($data as $row)
								<tr>
									<td>{{$row->name}}</td>
									<td>{{$row->manager}}</td>
									<td><button class='btn btn-primary btn-round btn-xs'>{{$row->status}}</button></td>
									<td>{{$row->expected_date}}</td>
									<td>
										<button type="button" class="btn btn-icon btn-round btn-secondary" 
										onclick="window.location='{{ url("project/$row->id") }}'"
										>
											<i class="fas fa-info"></i>
										</button>
										<button type="button" class="btn btn-icon btn-round btn-info" 
										onclick="window.location='{{ url("project/$row->id") }}'"
										>
											<i class="fas fa-pencil-alt"></i>
										</button>
										<button type="button" class="btn btn-icon btn-round btn-danger" data-toggle="modal" data-target="#deletemodal" data-delid="{{$row->id}}">
											<i class="fas fa-trash-alt"></i>
										</button>
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

