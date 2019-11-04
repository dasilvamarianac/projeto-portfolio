@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Usuários</h4>
	    </div>
	    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    	@endif
        <div class="row ">
            <div class="col-lg-12">
            	<button class="btn btn-primary btn-border btn-round col-lg-2 mb-3 ml-10 float-right"  onclick="window.location='{{ route('register') }}'">
            		<i class="fas fa-plus"></i> Novo</button>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Usuários</div>
                <div class="card-body">
                	<div class="table-responsive">
						<table id="multi-filter-select" class="display table table-striped table-hover" cellspacing="0" width="100%">
							<thead>
								<tr>
				                    <th>Nome</th>
				                    <th>Email</th>
				                    <th>Perfil</th>
				                    <th>Ações</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
				                    <th>Nome</th>
				                    <th>Email</th>
				                    <th>Perfil</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($data as $row)
								<tr>
									<td>{{ $row->name}}</td>
									<td>{{ $row->email}}</td>
									<td>{{ $row->profiledesc}}</td>
									<td>
										<button type="button" class="btn btn-icon btn-round btn-info" 

										onclick="window.location='{{ url("user/$row->id") }}'"
										>
											<i class="fas fa-pencil-alt"></i>
										</button>
										<button type="button" class="btn btn-icon btn-round btn-danger" data-toggle="modal" data-target="#deletemodal">
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
@include('user/delete')

@endsection
