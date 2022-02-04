<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'titolo' => $faker -> word(),
        'autore' => $faker -> name(),
        'sottotitolo' => $faker -> words(5, true),
        'contenuto' => $faker -> text(),
        'data' => $faker -> date()
    ];
});
