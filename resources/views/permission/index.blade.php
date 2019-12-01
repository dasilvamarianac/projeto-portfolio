@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Perfis de permissão</h4>
	    </div>
        <div class="card">
            <div class="card-header">Perfis de permissão</div>
                <div class="card-body">
                	<ul class="nav nav-pills nav-secondary  nav-pills-no-bd nav-pills-icons justify-content-center mb-3" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link" id="pills-home-tab-icon"  href="/permission/edit/0" >
							<i class="icon-settings"></i>
							Administrador
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-home-tab-icon"  href="/permission/edit/1" >
							<i class="
icon-hourglass"></i>
							Gerente de Projeto
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-home-tab-icon"  href="/permission/edit/2" >
							<i class="icon-directions"></i>
							Líder de Projeto
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-home-tab-icon"  href="/permission/edit/3" >
							<i class="
icon-grid"></i>
							Líder de Escritório
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-home-tab-icon"  href="/permission/edit/4" >
							<i class="icon-briefcase"></i>
							Alta Direção
							</a>
						</li>
					</ul>
                </div>
     	    </div>
        </div>
    </div>
</div>
@endsection

