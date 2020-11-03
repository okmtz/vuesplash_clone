<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function should_registered()
    {
        $response = $this->json('POST', route('login'), [
            'email' => $this->user->email,
            'password' => 'passsword',
        ]);

        $response->assertStatus(200)->assertJson(['name' => $this->user->name]);

        $this->assertAuthenticatedAs($this->user);
    }
    
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
