<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Category;

class CategoryTest extends TestCase
{
    
    use RefreshDatabase;

    /** @test */
    public function administrator_can_create_food()
    {
        $this->withoutExceptionHandling();
        
        $user = $this->createSuperAdministrator();
        
        $this->actingAs($user);

        $this->postJson('category/create', [
            'code' => str_random(10),
            'name' => 'Category1',
            'image_uri' => null,
        ])
        ->assertStatus(201);
        
        $this->assertDatabaseHas('categories', [
            'name' => 'Category1',
        ]);
    }

    /** @test */
    public function unauthorized_user_cannot_create_category()
    {        
        $user = factory(User::class)->create(['username' => 'unauthorized_user']);
        
        $this->actingAs($user);

        $this->postJson('category/create', [
            'code' => str_random(10),
            'name' => 'Category1',
            'image_uri' => null,
        ])
        ->assertStatus(403);

        $this->assertDatabaseMissing('categories', [
            'name' => 'Category1',
        ]);
    }

    /** @test **/
    public function administrator_can_edit_category()
    {
        $this->withoutExceptionHandling();

        $user = $this->createSuperAdministrator();
        
        $this->actingAs($user);

        $category = factory(Category::class)->create();

        $this->putJson('category/edit/' . $category->id, [
            'code' => str_random(10),
            'name' => 'Category2',
            'image_uri' => null,
        ])
        ->assertStatus(200);
        
        $this->assertDatabaseHas('categories', [
            'name' => 'Category2',
        ]);
    }

    /** @test */
    public function unauthorized_user_cannot_edit_category()
    {        
        $user = factory(User::class)->create(['username' => 'unauthorized_user']);
        
        $this->actingAs($user);

        $category = factory(Category::class)->create();
        
        $this->putJson('category/edit/' . $category->id, [
            'code' => str_random(10),
            'name' => 'Category2',
            'image_uri' => null,
        ])
        ->assertStatus(403);

        $this->assertDatabaseMissing('categories', [
            'name' => 'Category2',
        ]);
    }

    /** @test **/
    public function administrator_can_view_categories()
    {
        $this->withoutExceptionHandling();

        $user = $this->createSuperAdministrator();
        
        $this->actingAs($user);

        factory(Category::class, 20)->create();

        $response = $this->getJson('category');

        $response->assertJsonStructure([
            'data' => [ 
                '*' => [
                    'code',
                    'name',
                ]
            ]
        ]);
    }

    /** @test **/
    public function unauthorized_user_cannot_view_categories()
    {
        $user = factory(User::class)->create(['username' => 'unauthorized_user']);
        
        $this->actingAs($user);

        factory(Category::class, 20)->create();

        $response = $this->getJson('category')->assertStatus(403);

        $response->assertJsonMissingExact([
            'data' => [ 
                '*' => [
                    'code',
                    'name',
                ]
            ]
        ]);
    }
}
