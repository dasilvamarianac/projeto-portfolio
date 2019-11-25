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
            	@if($acesso['members'] > 1)
            		<button class="btn btn-primary btn-border btn-round col-lg-2 mb-3 ml-10 float-right"  onclick="window.location='{{ route('member.create') }}'">
            			<i class="fas fa-plus"></i> Novo
            		</button>
            	@endif	
            </div>
        </div>
        <div class="card">
            <div class="card-header">Membros</div>
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
									<td style="width:85%">{{ $row->name}}</td>
									<td>
										@if($acesso['members'] > 2)
											<button data-toggle="tooltip" data-html="true" title="Editar" type="button" class="btn btn-icon btn-round btn-info" 
										onclick="window.location='{{ url("member/edit/$row->id") }}'">
											<i class="fas fa-pencil-alt"></i>
											</button>
										@endif
											
										
										@if($acesso['members'] > 3)
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
@include('member/delete')

@endsection

