<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{   
    // Number of comments to create.
    const SEED_COUNT = 100;    

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Comment::class, self::SEED_COUNT)->create();

        // Get all the comments
        $magazines = App\Magazine::all();

        App\Comment::all()->each(function ($comment) use ($magazines) {
            $comment->magazine_id = rand(1, count($magazines));
            $comment->save();
        });
    }
}
