<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Food;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Food::truncate();

        $category_1 = factory(Category::class)->create([ 'name' => 'Noodle/Rice soup' ]);
        $category_2 = factory(Category::class)->create([ 'name' => 'Rice dishes' ]);

        factory(Food::class, 10)->create([ 'category_id' => $category_1->id ]);
        factory(Food::class, 10)->create([ 'category_id' => $category_2->id ]);
    }
}
