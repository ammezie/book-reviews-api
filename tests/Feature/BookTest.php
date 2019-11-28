<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Book;
use Tymon\JWTAuth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    // use RefreshDatabase;
   
    //Create user and authenticate the user
    protected function authenticate(){
        $user = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('secret1234'),
        ]);
        $token = JWTAuth::fromUser($user);
        return $token;
    }


    public function testCreate()
    {
        //Get token
        $token = $this->authenticate();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('POST',route('book.create'),[
            'title' => 'Jollof Rice',
            'description' => 'Parboil rice, get pepper and mix, and some spice and serve!'
        ]);
        $response->assertStatus(200);
        User::where('email','test@gmail.com')->delete();
    }

    //Test the display all routes
    public function testAll(){
        //Authenticate and attach recipe to user
        $token = $this->authenticate();
        $book = Book::create([
            'title' => 'Jollof Rice',
            'procedure' => 'Parboil rice, get pepper and mix, and some spice and serve!'
        ]);
        $this->user->books()->save($book);
        //call route and assert response
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('GET',route('books.all'));
        $response->assertStatus(200);
        //Assert the count is 1 and the title of the first item correlates
        $this->assertEquals(1,count($response->json()));
        $this->assertEquals('Jollof Rice',$response->json()[0]['title']);
        User::where('email','test@gmail.com')->delete();
    }

    
}
