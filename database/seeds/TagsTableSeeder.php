<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    // Number of tags to create.
    const SEED_COUNT = 12;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tag::class, self::SEED_COUNT)->create();

        // Get all the magazines.
        $magazines = App\Magazine::all();

        // Loop through each Tag.
        App\Tag::all()->each(function ($tag) use ($magazines) {

            $rand_loop_count = rand(1, count($magazines));
            $used_magazine_ids = [];

            for ($i = 0; $i < $rand_loop_count; $i++) {

                $magazine_id = rand(1, count($magazines));

                // Skip if the magazine_id has previously been attached.
                if (!in_array($magazine_id, $used_magazine_ids)) {
                    $tag->magazines()->attach($magazine_id);
                    array_push($used_magazine_ids, $magazine_id);
                }

            }

            $tag->save();
        });
    }
}
