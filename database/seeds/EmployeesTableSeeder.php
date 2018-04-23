<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    // Number of employees to create.
    const SEED_COUNT = 30;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Employee::class, self::SEED_COUNT)->create();

        // Get all the magazines.
        $magazines = App\Magazine::all();

        // Get all the roles.
        $roles = App\Role::all();

        // Loop through each Employee.
        App\Employee::all()->each(function ($employee) use ($magazines, $roles) {

            $rand_loop_count = rand(1, count($magazines));
            $used_magazine_ids = [];

            for ($i = 0; $i < $rand_loop_count; $i++) {

                $role_id = rand(1, count($roles));
                $magazine_id = rand(1, count($magazines));

                // Skip if the magazine_id has previously been attached.
                if (!in_array($magazine_id, $used_magazine_ids)) {
                    $employee->magazines()->attach($magazine_id,
                        ['role_id' => $role_id]);
                    array_push($used_magazine_ids, $magazine_id);
                }

            }

            $employee->save();
        });
    }
}
