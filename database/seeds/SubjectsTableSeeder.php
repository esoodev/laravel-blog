<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    // Number of subjects to create.
    const SEED_COUNT = 20;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Subject::class, self::SEED_COUNT)->create();

        // Get all the categories.
        $magazines = App\Magazine::all();

        App\Subject::all()->each(function ($subject) use ($magazines) {
            $subject->magazine_id = rand(1, count($magazines));
            $subject->save();
        });
    }
}
