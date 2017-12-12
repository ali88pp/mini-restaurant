<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Order;
use App\OrderDetail;

class OrderTest extends TestCase
{
    use RefreshDatabase;


    protected function makeOrders()
    {
        return factory(Order::class, 5)->create()->each(function($order) {
            factory(OrderDetail::class, 3)->create([ 'order_id' => $order->id ]);
        });
    }

    /** @test **/
    public function administrator_can_view_orders()
    {
        $this->withoutExceptionHandling();

        $user = $this->createSuperAdministrator();
        
        $this->actingAs($user);

        $this->makeOrders();

        $this->getJson('order')->assertJsonStructure([
            'data' => [ 
                '*' => [
                    'queue',
                    'table',
                    'created_by',
                    'updated_by',
                    'details' => [
                        '*' => [ 'id' ],
                    ],
                ]
            ]
        ]);
    }

    /** @test **/
    public function unauthorized_user_cannot_view_orders()
    {
        $user = factory(User::class)->create(['username' => 'unauthorized_user']);
        
        $this->actingAs($user);

        $this->makeOrders();

        $this->getJson('order')->assertStatus(403);
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
