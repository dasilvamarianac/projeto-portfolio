    <h1>Alerta de Indicadores</h1>

    <p>Esse é o alerta de indicadores fora do esperado, se você o está recebendo é devido a três ou mais indicadores da estapa terem sido preenchidos com valor fora dos valores definidos como aceitáveis.</p>

    <p>Indicadores:</p>

	@foreach($projects as $row)
		<h2>Projeto: {{ $row->name}}</h2>
		<h2>Etapa: {{ $row->status_name}}</h2>
		@foreach($indicators as $rowi)
			<h3> {{$rowi->name}} - {{$rowi->date}} - {{$rowi->value}}</h3>
		@endforeach
		
	@endforeach