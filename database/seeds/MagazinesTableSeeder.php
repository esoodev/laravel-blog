<?php

use Illuminate\Database\Seeder;

class MagazinesTableSeeder extends Seeder
{
    // Number of magazines to create.
    const SEED_COUNT = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Magazine::class, self::SEED_COUNT)->create();

        // Get all the categories
        $categories = App\Category::all();

        App\Magazine::all()->each(function ($magazine) use ($categories) {
            $magazine->category_id = rand(1, count($categories));
            $magazine->save();
        });
    }

}
