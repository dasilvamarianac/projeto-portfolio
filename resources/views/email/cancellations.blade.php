    <h1>Relatório Mensal de Projetos Cancelados</h1>

	@foreach($projects as $row)
		<h2>{{ $row->date}} - {{ $row->name}}</h2>
	@endforeach