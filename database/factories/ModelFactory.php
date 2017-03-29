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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'gender' => 1,
        'avatar' => $faker->imageUrl($width = 640, $height = 480),
        'is_activated' => 1
    ];
});
$factory->define(App\Topic::class, function (Faker\Generator $faker) {
    return [
        'name' => ucfirst($faker->words(3, true)),
        'description'   => $faker->text(200),
    ];
});
$factory->define(App\Question::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->words(5, true),
        'user_id' => RandomIDProvider::get(\App\User::class, $faker),
        'topic_id' => RandomIDProvider::get(\App\Topic::class, $faker),
        'title' => $faker->words(10, true),
        'content' => $faker->text(400),
        'status' => 'visible',
        'view' => 1,
    ];
});
$factory->define(App\Answer::class, function (Faker\Generator $faker) {
    return [
        'user_id' => RandomIDProvider::get(\App\User::class, $faker),
        'question_id' => RandomIDProvider::get(\App\Question::class, $faker),
        'answer' => $faker->text(400),
        'status' => 'approve',
        'answer_parent' => 0
    ];
});

