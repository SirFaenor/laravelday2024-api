<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
 
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAuthenticationViaToken()
    {
        $token = config("sanctum.tokens.sagra_touch_station");

        $response = $this->get("/api/orders/list");

        $response->assertStatus(403);

    }


}
