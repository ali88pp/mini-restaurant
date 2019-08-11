<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Food;

class FoodTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test **/
    public function administrator_can_create_food()
    {
        $this->withoutExceptionHandling();

        $user = $this->createSuperAdministrator();
        
        $this->actingAs($user);

        $this->postJson('food/create', [
            'code' => str_random(10),
            'name' => 'Food1',
            'description' => 'Food description',
            'cost' => 10,
            'price' => 5,
            'category_id' => 1,
            'image_uri' => null,
            'is_available' => true,
        ])
        ->assertStatus(201);
        
        $this->assertDatabaseHas('foods', [
            'name' => 'Food1',
            'description' => 'Food description',
            'cost' => 10,
            'price' => 5,
            'category_id' => 1,
        ]);
    }

    /** @test */
    public function unauthorized_user_cannot_create_food()
    {        
        $user = factory(User::class)->create(['username' => 'unauthorized_user']);
        
        $this->actingAs($user);

        $this->postJson('food/create', [
            'code' => str_random(10),
            'name' => 'Food1',
            'description' => 'Food description',
            'cost' => 10,
            'price' => 5,
            'category_id' => 1,
            'image_uri' => null,
            'is_available' => true,
        ])
        ->assertStatus(403);
    }

    /** @test **/
    public function administrator_can_edit_food()
    {
        $this->withoutExceptionHandling();

        $user = $this->createSuperAdministrator();
        
        $this->actingAs($user);

        $food = factory(Food::class)->create();

        $this->putJson('food/edit/' . $food->id, [
            'name' => 'Food2',
            'description' => 'Food description',
            'cost' => 100,
            'price' => 5
        ])
        ->assertStatus(200);
        
        $this->assertDatabaseHas('foods', [
            'name' => 'Food2',
            'description' => 'Food description',
            'cost' => 100,
            'price' => 5,
        ]);
    }

    /** @test */
    public function unauthorized_user_cannot_edit_food()
    {        
        $user = factory(User::class)->create(['username' => 'unauthorized_user']);
        
        $this->actingAs($user);

        $food = factory(Food::class)->create();
        
        $this->putJson('food/edit/' . $food->id, [
            'name' => 'Food2',
            'description' => 'Food description',
            'cost' => 100,
            'price' => 5
        ])
        ->assertStatus(403);
    }

    /** @test **/
    public function administrator_can_view_a_new_food()
    {
        $this->withoutExceptionHandling();

        $user = $this->createSuperAdministrator();
        
        $this->actingAs($user);

        factory(Food::class, 20)->create();

        $response = $this->getJson('food');

        $response->assertJsonStructure([
            'data' => [ 
                '*' => [
                    'name',
                    'description',
                    'cost',
                    'price',
                    'category_id',
                ]
            ]
        ]);
    }

    /** @test **/
    public function unauthorized_user_cannot_view_a_new_food()
    {
        $user = factory(User::class)->create(['username' => 'unauthorized_user']);
        
        $this->actingAs($user);

        factory(Food::class, 20)->create();

        $response = $this->getJson('food')->assertStatus(403);

        $response->assertJsonMissing([
            'data' => [ 
                '*' => [
                    'name',
                    'description',
                    'cost',
                    'price',
                    'category_id',
                ]
            ]
        ]);
    }
}
