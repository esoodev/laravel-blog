<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    // Number of roles to create.
    const SEED_COUNT = 4;        

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Role::class, self::SEED_COUNT)->create();        
    }
}
