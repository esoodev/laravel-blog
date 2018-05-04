<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName()." ".$faker->lastName(),
        'email' => $faker->email(),      
        'comment' => $faker->realText(120, 1),  
        'is_active' => $faker->boolean(100)     
    ];
});
