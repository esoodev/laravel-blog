<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    // Number of categories to create.
    const SEED_COUNT = 10;            

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class, self::SEED_COUNT)->create();        
    }
}
