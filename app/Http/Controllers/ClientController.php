<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    protected $client;

    public function __construct (Client $client)
    {
        $this->client = $client;
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(5);

        return view('clientes.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = $request->all();

        if($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenClient = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenClient);
            $client['imagen'] = "$imagenClient";             
        }
        
        Client::create($client);
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $cliente)
    {
        return view('clientes.editar', compact('cliente'));
       
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $cliente)
    {
        $client = $request->all();  //obtiene todos los datos del formulario
        if($imagen = $request->file('imagen')){
           $rutaGuardarImg = 'imagen/';
           $imagenClient = date('YmdHis') . "." . $imagen->getClientOriginalExtension(); 
           $imagen->move($rutaGuardarImg, $imagenClient);
           $client['imagen'] = "$imagenClient";
        }else{
           unset($client['imagen']);
        }   //obtiene la imagen y la guarda en la ruta especificada
        $cliente->update($client); //actualiza los datos del cliente
        return redirect()->route('clientes.index'); //redirecciona a la ruta clientes
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
