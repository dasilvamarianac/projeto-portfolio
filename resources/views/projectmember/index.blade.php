@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Membros</h4>
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
            	@if($acesso['project_member'] > 1)
	            	<button type="button" class="btn btn-primary btn-border btn-round col-lg-2 mb-3 ml-10 float-right" data-toggle="modal" data-target="#createmodal" data-delid="{{$id}}">
						<i class="fas fa-plus"></i> Novo
					</button>
				@endif
            </div>
        </div>
        <div class="card">
            <div class="card-header">Membros do Projeto</div>
                <div class="card-body">
                	<div class="table-responsive">
						<table id="multi-filter-select" class="display table table-striped table-hover" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Nome</th>
				                    <th>Ações</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $row)
								<tr>
									<td style="width:800px">{{ $row->name}}</td>
									<td>
										@if($acesso['project_member'] > 3)
											<button type="button" class="btn btn-icon btn-round btn-danger" data-toggle="modal" data-target="#deletemodal" data-delid="{{$row->id}}">
												<i data-toggle="tooltip" data-html="true" title="Excluir" class="fas fa-trash-alt"></i>
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
@include('projectmember/delete')
@include('projectmember/create')

@endsection

