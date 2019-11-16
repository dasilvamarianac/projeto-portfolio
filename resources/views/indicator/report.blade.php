@extends('layouts/app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Relatório</h4>
	    </div>
        <div class="row ">
            <div class="col-lg-12">
            	<button class="btn btn-primary btn-border btn-round col-lg-2 mb-3 ml-10 float-right" >
            		<a href="/generate-pdf/{{$id}}">
            			Download <i class="icon-cloud-download"></i> 
            		</a>
            	</button>

            </div>
        </div>
        <div class="card">
            <div class="card-header">
            	@if($id == 'all')
            		<h1>Relatório Geral de Indicadores - Portfoli</h1>
            	@else
            		<h1>Relatório de Indicadores do Projeto - Portfoli</h1>
            	@endif
            </div>
            <div class="card-body">
				@foreach($proj as $row)
						<h2>{{ $row->name}}</h2>
						<p style="margin-left: 50px">
								<b>Status atual - </b> {{$row->status_name}} <br/>
								<b>Risco</b> - {{$row->risk_name}}<br/>
								<b>Líder do Escritório - </b> {{ $row->office_leader_name}}<br/>
								<b>Líder do Projeto - </b>{{ $row->leader_name}}<br/>
								<b>Gerente do Projeto- </b> {{ $row->manager_name}}<br/>
						</p>
						<h3>Indicadores:</h3>
						@foreach($ind as $rowi)
							@if($rowi->project == $row->id)
							<div style="margin-left: 50px">
								<h4>
									{{$rowi->name}} - {{$rowi->status_name}}
								</h4> 
								<h4>
									Valores esperados: de {{$rowi->min_value}} a {{$rowi->max_value}}
								</h4>
									@foreach($value as $rowv)
										@if($rowv->indicator_project == $rowi->id)
											<p style="margin-left: 100px">
												<b>Data:</b>{{$rowv->date}}  -  <b>Valor: </b>{{$rowv->value}}
											</p>
										@endif
									@endforeach
							</div>
							@endif
						@endforeach

						<p>_________________________________________________________________________________</p>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection