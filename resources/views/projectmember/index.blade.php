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
        <div class="row ">
            <div class="col-lg-12">
            	<button type="button" class="btn btn-primary btn-border btn-round col-lg-2 mb-3 ml-10 float-right" data-toggle="modal" data-target="#createmodal" data-delid="{{$id}}">
					<i class="fas fa-plus"></i> Novo
				</button>
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
@include('projectmember/delete')
@include('projectmember/create')

@endsection

