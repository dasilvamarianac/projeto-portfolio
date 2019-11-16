<!DOCTYPE html>
<html lang="en">
<head>
    <title>Portfoli</title>
</head>
<body>
	@if($id == 'all')
        <h1>Relatório Geral de Indicadores - Portfoli</h1>
    @else
        <h1>Relatório de Indicadores do Projeto - Portfoli</h1>
  	@endif


	@foreach($proj as $row)
		<h2>{{ $row->name}}</h2>
		<p style="margin-left: 50px">
			<b>Status atual - </b> {{$row->status_name}} <br/>
			<b>Risco</b> - {{$row->risk_name}}<br/>
			<br/>    
			<b>Líder do Escritório - </b> {{ $row->office_leader_name}}<br/>
			<b>Líder do Projeto - </b>{{ $row->leader_name}}<br/>
			<b>Gerente do Projeto- </b> {{ $row->manager_name}}<br/>
		</p>
		<h3>Indicadores</h3>
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


</body>
</html>