<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthControllerTest extends TestCase
{


    /**
 * @test 
 * Test registration
 */
public function testRegister(){
    //User's data
    $data = [
        'email' => 'test@gmail.com',
        'name' => 'Test',
        'password' => 'secret1234'
    ];
    //Send post request
    $response = $this->json('POST',route('api.register'),$data);
    //Assert it was successful
    $response->assertStatus(200);
    //Assert we received a token
    $this->assertArrayHasKey('access_token',$response->json());
    //Delete data
    User::where('email','test@gmail.com')->delete();
}

/**
 * @test
 * Test login
 */
public function testLogin()
{
    //Create user
    User::create([
        'name' => 'test',
        'email'=>'test@gmail.com',
        'password' => bcrypt('secret1234')
    ]);
    //attempt login
    $response = $this->json('POST',route('api.authenticate'),[
        'email' => 'test@gmail.com',
        'password' => 'secret1234',
    ]);
    //Assert it was successful and a token was received
    $response->assertStatus(200);
    $this->assertArrayHasKey('access_token',$response->json());
    //Delete the user
    User::where('email','test@gmail.com')->delete();
}
   
}
