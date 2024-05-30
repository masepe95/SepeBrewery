<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BreweryFetchTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function it_can_fetch_breweries_with_valid_token()
    {
        $user = \App\Models\User::factory()->create([
            'email' => 'root@test.com',
            'password' => bcrypt('password'),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")->get('/api/breweries');

        $response->assertStatus(200);
    }
}
