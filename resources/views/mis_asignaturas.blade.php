@extends('layouts.app')
@section('title','Mis Asignaturas | Planeador Académico')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <h4 class="card-title font-weight-bold flex-column d-flex">
                    Mis Asignaturas
                    <small class="text-muted">
                        Tus asignaturas delegadas para el periodo académico <b>{{$configuracion->mes_inicio_periodo->mes}}-{{$configuracion->mes_fin_periodo->mes}}</b>
                    </small>
                </h4>
                <hr>
                <div class="m-3">
                    <table class="table text-center table-bordered">
                        <thead>
                            <tr>
                                <th><b>Nombre de la Asignatura</b></th>
                                <th><b>Código</b></th>
                                <th><b>Grupo</b></th>
                                <th><b>Planeador Académico</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (auth()->user()->asignaturas as $asignatura)
                              <tr>
                                  <td>{{$asignatura->nombre}}</td>
                                  <td>{{$asignatura->codigo}}</td>
                                  <td>{{$asignatura->grupo}}</td>
                                  <td>
                                      @if(count($asignatura->planeador)>=1)
                                      <a href="{{ url('/planeador/'.$asignatura->planeador->id.'/detalles')  }}">
                                       <i class="fa fa-eye"></i>
                                       Ver Planeador
                                   </a>
                                   @else
                                   <a href="{{ route('docente.generar.planeador',$asignatura) }}">
                                    <i class="fa fa-plus"></i>
                                    Crear Planeador
                                </a>
                                @endif
                            </td>
                        </tr>
                            @empty
                              <tr>
                                <td colspan="4"> <h4>No tienes asignaturas delegadas en este momento.</h4> </td>
                              </tr>
                            @endforelse
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
</div>
@endsection
