

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Detalles cliente') }}
      </h2>
  </x-slot>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="row">
  <div class="col-6 col-md-4">  
    <div class="card ">
    <img   width="300" height="200" class="center" src="/imagen/{{$cliente->imagen}}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Nombre:</h5>
      <p class="card-text">{{$cliente->nombre}}</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Cedula: {{$cliente->cedula}}</li>
      <li class="list-group-item">Correo: {{$cliente->cedula}}</li>
      <li class="list-group-item">Telefono: {{$cliente->telefono}}</li>
    </ul>
  </div></div>
  <div class="col-12 col-md-8"> 
    <!--tabla -->
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Imagen</th>
          <th scope="col">Servicio</th>
          <th scope="col">Fecha Inicio</th>
          <th scope="col">Fecha Fin</th>
          <th scope="col">Observaciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($services as $service)
        <tr>
          <td>{{$service->nombre}}</td>
          <td><img  width="100" height="100" src="{{$service->imagen}}" alt=""></td>
          <td>{{$service->tipo_servicio}}</td>
          <td>{{$service->fecha_inicio}}</td>
          <td>{{$service->fecha_fin}}</td>
          <td>{{$service->observaciones}}</td>
        </tr>
        @endforeach
    </table>
    </div>
</div>

   
</x-app-layout>
  
