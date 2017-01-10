<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

// modèle qui permet de generer automatiquement des users
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->username,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'role' => $faker->randomElement(array('teacher','first_class','final_class')),
        'remember_token' => str_random(10)
    ];
});

// modèle qui permet de generer automatiquement des posts
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'user_id' => (rand(1,3)!=1)? rand(1,8) : NULL,
        'title' => $faker->sentence(),
        'abstract' => $faker->paragraphs(1,true),
        'content' => $faker->paragraphs(7,true),
        'date' => $faker->dateTime('now'),
        'status' => $faker->randomElement(array('published','unpublished'))
    ];
});

// modèle qui permet de generer automatiquement des comments
$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'post_id' => rand(1,8),
        'user_id' => (rand(1,3)!=1)? rand(1,8) : NULL,
        'title' => $faker->sentence(),
        'content' => $faker->paragraphs(1,true),
        'date' => $faker->dateTime('now'),
        'status' => $faker->randomElement(array('published','unpublished'))
    ];
});

