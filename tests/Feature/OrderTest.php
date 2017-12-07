<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Order;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function administrator_can_view()
    {
        $this->withoutExceptionHandling();

        $user = $this->createSuperAdministrator();
        
        $this->actingAs($user);

        factory(Order::class, 20)->create();

        $response = $this->getJson('order');

        $response->assertJsonStructure([
            'data' => [ 
                '*' => [
                    'queue',
                    'table',
                    'created_by',
                    'updated_by',
                ]
            ]
        ]);
    }

    /** @test **/
    public function unauthorized_user_cannot_view()
    {
        $user = factory(User::class)->create(['username' => 'unauthorized_user']);
        
        $this->actingAs($user);

        factory(Order::class, 20)->create();

        $response = $this->getJson('order')->assertStatus(403);
    }

    // /** @test */
    // public function administrator_can_view_order()
    // {
    //     $this->withoutExceptionHandling();
        
    //     $user = $this->createSuperAdministrator();
        
    //     $this->actingAs($user);

    //     $this->postJson('order/create', [
    //         'code' => str_random(10),
    //         'queue' => 1,
    //         'table' => 1,
    //         'status' => 1,            
    //     ])
    //     ->assertStatus(201);
        
    //     $this->assertDatabaseHas('orders', [
    //         'queue' => 1,
    //         'table' => 1,
    //         'status' => 1,
    //         'created_by' => $user->username,  
    //         'updated_by' => $user->username,  
    //     ]);
    // }
}
