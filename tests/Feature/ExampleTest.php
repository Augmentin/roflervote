<?php

namespace Tests\Feature;

use App\Models\Music;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $music = Music::all();
        $e = User::all();


        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
