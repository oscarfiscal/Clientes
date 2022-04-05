<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Client;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
        
        $user = User::factory()->create(); //crea un usuario
        $this->actingAs($user); //autentica el usuario

       Client::factory()->create(); // crea un cliente
                   
        $response=$this->get('clientes')->assertStatus(200); //obtiene la ruta clientes y verifica que el status sea 200
        $producto=Client::all();  //obtiene todos los clientes 
        $response->assertOk();  //cuando obtenga los clientes verifica que el estado sea 200
    }
   
     //test crear un cliente 

    public function test_create_client()
    {
        $this->withoutExceptionHandling(); 

        $user = User::factory()->create(); //crea un usuario
        $this->actingAs($user); //autentica el usuario

        $response = $this->post('/clientes', [
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

    //test para editar un cliente

    public function test_edit_client()
    {
        $this->withoutExceptionHandling(); 

        $user = User::factory()->create(); //crea un usuario
        $this->actingAs($user); //autentica el usuario

        $cliente = Client::factory()->create(); //crea un cliente

        $response = $this->get('/clientes/'.$cliente->id.'/edit')->assertOk(); //obtiene la ruta clientes/id/edit y verifica que el status sea 200
        $response->assertViewIs('clientes.editar'); //verifica que la vista sea clientes.editar
        $response->assertViewHas('cliente'); //verifica que la vista tenga el cliente
    }

    //test para eliminar un cliente

    public function test_delete_client()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create(); //crea un usuario
        $this->actingAs($user); //autentica el usuario

        $client = Client::factory()->create(); //crea un cliente

        $response = $this->delete('/clientes/'.$client->id)->assertRedirect('clientes'); //elimina el cliente

        $this->assertDatabaseMissing('clients', [
            'id' => $client->id,
        ]); //verifica que el cliente no exista en la base de datos
    }
}
