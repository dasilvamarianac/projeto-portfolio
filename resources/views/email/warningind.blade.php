    <h1>Alerta de Indicadores</h1>

	@foreach($projects as $row)
		<h2>{{ $row->name}} - Etapa {{ $row->status_name}}</h2>
		@foreach($indicators as $rowi)
			<h3> {{$rowi->name}} - {{$rowi->date}} - {{$rowi->value}}</h3>
		@endforeach
		
	@endforeach