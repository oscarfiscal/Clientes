<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    //test  para listar clientes
    
    public function test_list_clients()

    {
        $this->withoutExceptionHandling();

       Client::factory()->create(); // crea un cliente
                   
        $response=$this->get('clientes')->assertStatus(200); //obtiene la ruta clientes y verifica que el status sea 200
        $producto=Client::all();  //obtiene todos los clientes 
        $response->assertOk();  //cuando obtenga los clientes verifica que el estado sea 200
    }
   
     //test crear un cliente 

    public function test_create_client()
    {
        $this->withoutExceptionHandling(); 

        $response = $this->post('/clients', [
            'nombre' => 'oscar fiscal',
            'imagen' => 'url.jpg',
             'cedula' => '123456789',
             'correo' => 'oscar@example.com',
             'telefono' => '213112331',
             'observaciones' => 'desarrollador',
        ])->assertRedirect('clientes');     // cuando se envien los datos redirecciona a la ruta clientes
            
        $this->assertDatabaseHas('clients', [
            'nombre' => 'oscar fiscal',
            'imagen' => 'url.jpg',
            'cedula' => '123456789',
            'correo' => 'oscar@example.com',
            'telefono' => '213112331',
            'observaciones'=>'desarrollador',
        ]);    // verifica que el cliente se haya creado en la base de datos  
    
    }
}
