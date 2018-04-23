<?php

use Faker\Generator as Faker;

$factory->define(App\Magazine::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(30, 1),
        'content_html' => $faker->randomHtml(2, 3),      
        'is_visible' => true
    ];
});
