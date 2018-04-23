<?php

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName()." ".$faker->lastName(),
        'description' => $faker->sentence(),      
        'title' => $faker->title(),      
        'birth_date' => $faker->date(),      
        'is_active' => $faker->boolean(75),      
    ];
});
