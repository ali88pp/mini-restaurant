<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Food;
use App\Beverage;

class ItemsSeeder extends Seeder
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
        $category_3 = factory(Category::class)->create([ 'name' => 'Beer' ]);
        $category_4 = factory(Category::class)->create([ 'name' => 'Soft Drink' ]);

        factory(Food::class, 10)->create([ 'category_id' => $category_1->id ]);
        factory(Food::class, 10)->create([ 'category_id' => $category_2->id ]);

        factory(Beverage::class, 10)->create([ 'category_id' => $category_3->id ]);
        factory(Beverage::class, 10)->create([ 'category_id' => $category_4->id ]);
    }
}
