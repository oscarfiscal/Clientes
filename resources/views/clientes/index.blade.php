<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administrar clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a type="button" href="{{ route('clientes.create') }}"  style="float: right;" class=" bg-indigo-600 px-12 py-2 rounded text-gray-200 font-semibold hover:bg-indigo-800 transition duration-200 each-in-out">Crear</a>
           
                <table class="table-auto w-full">
                <thead>
                    <tr class="bg-blue-700 text-white">
                        <th style="display: none;">Id</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="border px-4 py-2">Imagen</th>
                        <th class="border px-4 py-2">Cedula</th>
                        <th class="border px-4 py-2">Correo</th>
                        <th class="border px-4 py-2">Telefono</th>
                        <th class="border px-4 py-2">Observaciones</th>
                        <th class="border px-4 py-2">ACCIONES</th>
                    </tr>  
                </thead>    
                <tbody>
                    @foreach ($clients as $client)
                    <tr>
                        <td style="display: none;">{{$client->id}}</td>
                        <td>{{$client->nombre}}</td>
                        <td  class="border px-14 py-1">
                            <img src="/imagen/{{$client->imagen}}" width="60%">
                        </td>   
                        <td class="border px-4 py-2">{{$client->cedula}}</td>
                        <td class="border px-4 py-2">{{$client->correo}}</td>
                        <td class="border px-4 py-2">{{$client->telefono}}</td>
                        <td class="border px-4 py-2">{{$client->observaciones}}</td>
                        <td class="border px-4 py-2">
                            <div class="flex justify-center rounded-lg text-lg" role="group">
                                <!-- botón editar -->
                                <a href="{{ route('clientes.edit', $client->id) }}" class="rounded bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4">Editar</a>

                                <!-- botón borrar -->
                                <form action="{{ route('clientes.destroy', $client->id) }}" method="POST" class="formEliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  style="background-color:red;" class="rounded text-white font-bold py-2 px-4">Borrar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach   
                </tbody>   
                     
            </table>   
                <div>
                    {!! $clients->links() !!}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
<script>
    (function () {
  'use strict'
  //debemos crear la clase formEliminar dentro del form del boton borrar
  //recordar que cada registro a eliminar esta contenido en un form  
  var forms = document.querySelectorAll('.formEliminar')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {        
          event.preventDefault()
          event.stopPropagation()        
          Swal.fire({
                title: '¿Confirma la eliminación del registro?',        
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#20c997',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                    Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
                }
            })                      
      }, false)
    })
})()
</script>
