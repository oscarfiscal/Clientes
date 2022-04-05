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
        ])->assertRedirect('clientes');
            
        $this->assertDatabaseHas('clients', [
            'nombre' => 'oscar fiscal',
            'imagen' => 'url.jpg',
            'cedula' => '123456789',
            'correo' => 'oscar@example.com',
            'telefono' => '213112331',
            'observaciones'=>'desarrollador',
        ]);     
    
    }
}
