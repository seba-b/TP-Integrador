@extends('plantilla')

@section('titulo')
  Seleccion de relojes
@endsection


@section('content')
  @php
  use App\User;

  $usuario = Auth::user() ;
  @endphp
<div class="container relojes">
  <div class="col-2 filtros">

  </div>
  <div class="col-10 filtrado">

    @forelse ($relojes as $reloj )
      <div class="card shadow" style="width: 18rem;">
        <img src="{{ asset("/storage/relojes/$reloj->image") }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$reloj->model}}</h5>
          <p class="card-text">{{$reloj->description}}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">{{$reloj->brand}}</li>
          <li class="list-group-item">${{$reloj->price}}</li>
          @if ($reloj->discount>0)
            <li class="list-group-item">{{$reloj->discount}}% OFF!</li>
          @endif
        </ul>
        @if ($usuario)
          <div class="col-6 col-md-12">
            <a  href="/carrito/agregar/{{$reloj->id}}/{{$usuario->id}}" class="home col-12 d-flex justify-content-center btn btn-primary">Agregar a carrito</a>
          </div>
        @endif
      </div>

    @empty
      <a class="btn btn-primary " style="margin-top:100px;margin-bottom:300px;" href="/altaProductos"> <h3>No hay Relojes Activos ... Agregue 1!</h3></a>;

    @endforelse


  </div>
</div>
@endsection
