<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Response;
use App\User;

class LevelAddTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAddLevel()
    {
        $level = $this->makeLevelData();
        $response = $this->postJson('/levels', $level);
        $response->assertStatus(Response::HTTP_CREATED);        
    }

    public function testEditLevel()
    {
        $level = $this->makeLevelData();
        $response = $this->putJson('/levels', $level);
        $response->assertStatus(Response::HTTP_CREATED);        
    }

    private function makeLevelData(): array
    {
        return [                        
            'name' => 'jigggjj',
            'description' => 'ds'
        ];
    }
}
