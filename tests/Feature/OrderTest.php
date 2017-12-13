<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Order;
use App\OrderDetail;
use Spatie\Permission\Models\Permission;
use App\Food;
use Carbon\Carbon;

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

    /** @test */
    public function authorized_user_can_create_order()
    {        
        $this->withoutExceptionHandling();
        
        Permission::create([ 'name' => 'create order' ]);
        $user = factory(User::class)->create(['username' => 'authorized_user']);
        $user->givePermissionTo('create order');

        $foods = factory(Food::class, 4)->create();
        
        $this->actingAs($user);

        $this->postJson('order/create', [
            'code' => str_random(10),
            'queue' => 1,
            'table' => 1,
            'status' => 1, 
            'date_time' => Carbon::now()->format('Y-m-d'), 
            'amount' => 100,
            // 'details' => [
            //     [ 'item_code' => $foods[0]->code, 'item_name' => $foods[0]->name, 'item_id' => $foods[0]->id, 'item_type' => Food::class ],
            //     [ 'item_code' => $foods[1]->code, 'item_name' => $foods[1]->name, 'item_id' => $foods[1]->id, 'item_type' => Food::class ],
            //     [ 'item_code' => $foods[2]->code, 'item_name' => $foods[2]->name, 'item_id' => $foods[2]->id, 'item_type' => Food::class ],
            //     [ 'item_code' => $foods[3]->code, 'item_name' => $foods[3]->name, 'item_id' => $foods[3]->id, 'item_type' => Food::class ],
            // ]          
        ])
        ->assertStatus(201);
        
        // $this->assertDatabaseHas('orders', [
        //     'queue' => 1,
        //     'table' => 1,
        //     'status' => 1,
        //     'created_by' => $user->username,  
        //     'updated_by' => $user->username,  
        // ]);
    }
}
