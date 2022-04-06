<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //traer clientes
        $clients = Client::all();
        return view('servicios.crear', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //crear servicios de clientes
        $service = $request->all();  //obtiene todos los datos del formulario

        if($imagen = $request->file('imagen')) {  //si existe el campo imagen
            $rutaGuardarImg = 'imagen/'; //ruta donde se guardara la imagen
            $imagenService = date('YmdHis'). "." . $imagen->getClientOriginalExtension();    //nombre de la imagen
            $imagen->move($rutaGuardarImg, $imagenService); //mueve la imagen a la ruta especificada
            $service['imagen'] = "$imagenService";              
        }
        
        Service::create($service);    //crea el servicio
        return redirect()->route('clientes.detalles', $request->client_id); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
