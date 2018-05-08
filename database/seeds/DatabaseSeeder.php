<?php

use App\Category;
use App\Magazine;
use App\Subject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    private $category_array = [];
    private $magazine_array = [];
    private $subject_array = [];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriesTableSeeder::class,
            RolesTableSeeder::class,
            MagazinesTableSeeder::class,
            SubjectsTableSeeder::class,
            TagsTableSeeder::class,
            EmployeesTableSeeder::class,
            CommentTableSeeder::class,
        ]);
    }

}
