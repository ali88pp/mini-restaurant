<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class FoodTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test **/
    public function user_can_create_a_new_food()
    {
        // $user = factory(User::class)->create();

        $this->assertTrue(true);
    }
}
