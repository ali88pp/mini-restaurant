<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function user_login_in_order_to_use_dashboard()
    {
        $user = factory(User::class)->create([ 'username' => 'john', 'password' => 'secret' ]);

        $result = $this->postJson('/login', [ 'username' => 'john', 'password' => 'secret' ])
                        ->assertStatus(202);
    }

    /** test */
    public function user_logout()
    {
        $user = factory(User::class)->create([ 'username' => 'john', 'password' => 'secret' ]);
        
        $this->postJson('/login', [ 'username' => 'john', 'password' => 'secret' ]);

       $this->postJson('/logout')->assertStatus(202);
    }
}
