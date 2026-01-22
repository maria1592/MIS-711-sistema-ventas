<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class HealthEndpointTest extends TestCase
{
    use DatabaseMigrations;

    public function test_health_endpoint_returns_ok(): void
    {
        $response = $this->getJson('/api/health');

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
                'database' => 'connected',
            ]);
    }
}
