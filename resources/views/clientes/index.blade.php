<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administrar clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th style="display: none;">Nombre</th>
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
