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
            	@if($acesso['users'] > 1)
	            	<button class="btn btn-primary btn-border btn-round col-lg-2 mb-3 ml-10 float-right"  onclick="window.location='{{ route('user.create') }}'">
	            		<i class="fas fa-plus"></i> Novo
	            	</button>
	            @endif
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
							<tbody>
								@foreach($data as $row) 
								<tr>
									<td style="width:30%">{{ $row->name}}</td>
									<td style="width:35%">{{ $row->email}}</td>
									<td style="width:20%">{{ $row->profiledesc}}</td>
									<td style="width:15%">
										@if($acesso['users'] > 2)
											<button type="button" class="btn btn-icon btn-round btn-info" 
										onclick="window.location='{{ url("user/edit/$row->id") }}'">
											<i class="fas fa-pencil-alt"></i>
											</button>
										@endif
											
										
										@if($acesso['users'] > 3)
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
@include('user/delete')

@endsection

