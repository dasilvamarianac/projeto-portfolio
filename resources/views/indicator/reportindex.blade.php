@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Projetos</h4>
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
									<td style="width:290px">{{$row->name}}</td>
									<td style="width:95px">{{$row->manager_name}}</td>
									<td>
										<span class="badge badge-{{$row->status_color}}">			{{$row->status_name}}
										</span>
									</td>
									<td>{{$row->expected_date}}</td>
									<td>
										<a href="report/{{$row->id}}">
											<button data-toggle="tooltip" data-html="true" title="Gerar Relatório" type="button" class="btn btn-icon btn-round btn-info mb-1" 
										>
												<i class="fas fa-file-alt"></i>
											</button>
										</a>
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
@endsection

