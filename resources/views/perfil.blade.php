@extends('layouts.app')
@section('title','Mi Perfil')

@section('content')

@include('modals.cambiar_contraseña')
@include('modals.cambiar_imagen')

<div class="container">
	<div class="row align-items-center">
		<div class="col-md-12 col-lg-10 mx-auto">
			<div class="card card-body">
				<div class="row">
					<div class="col-md-12 col-lg-4 flex-center">
						<div class="text-center img-avatar" id="cambiar_avatar">
							<img class="img-perfil rounded-circle z-depth-1" src="{{ auth()->user()->getAvatar() }}" alt="Foto de {{auth()->user()->nombre_completo()}}">
						</div>
					</div>
					<div class="col-md-12 col-lg-8 d-flex  py-3 flex-column my-auto">
						<small>{{ auth()->user()->getRoleNames()[0]}}</small>
						<h2 class="h2-responsive font-weight-bold">
							{{auth()->user()->nombre}}
						</h2>
						<h5 class="h5-responsive text-muted">
							{{auth()->user()->apellido}}
						</h5>
						<hr>
						<ul class="nav mx-auto font-weight-bold justify-content-center">
							<li class="nav-item">
								<a href="#" data-toggle="modal" class="nav-link" data-toggle="modal" data-target="#modal_cambiar_avatar">
									<i class="fa fa-user-circle"></i> Cambiar Imagen</a>
								</li>
								<li class="nav-item">
									<a href="#" data-toggle="modal" data-target="#modal_cambiar_contraseña" class="nav-link"> <i class="fa fa-key"></i> Cambiar Contraseña</a>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="card card-body">
					<small class="text-muted">Correo electrónico</small>
					<p class="font-weight-bold">{{auth()->user()->email}}</p>
					<small class="text-muted">Documento de identidad</small>
					<p class="font-weight-bold">{{auth()->user()->documento_identidad}}</p>
				</div>
			</div>
		</div>
	</div>
	@endsection
