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
        <div class="row ">
            <div class="col-lg-12">
            	<button class="btn btn-primary btn-border btn-round col-lg-2 mb-3 ml-10 float-right"  onclick="window.location='{{ route('indicator.create') }}'">
            		<i class="fas fa-plus"></i> Novo</button>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Indicadores</div>
                <div class="card-body">
                	<div class="table-responsive">
						<table id="multi-filter-select" class="display table table-striped table-hover" cellspacing="0" width="100%">
							<thead>
								<tr>
				                    <th>Nome</th>
				                    <th>Descrição</th>
				                    <th>Ações</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $row)
								<tr>
									<td style="width:25%">{{ $row->name}}</td>
									<td style="width:60%">{{ $row->desc}}</td>
									<td style="width:15%">
										<button type="button" class="btn btn-icon btn-round btn-info" 
										onclick="window.location='{{ url("indicator/edit/$row->id") }}'"
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
@include('indicator/delete')

@endsection

