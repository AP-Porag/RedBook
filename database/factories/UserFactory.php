<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\StoryTags;
use App\Models\Type;
use App\Models\Story;
use App\Models\Chapter;
use App\Models\Tag;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('12345678'), // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word(),
        'slug' => $faker->unique()->slug,
        'background' => $faker->imageUrl(),
    ];
});

//$factory->define(Type::class, function (Faker $faker) {
//    return [
//        'name' => $faker->unique()->word(),
//        'slug' => $faker->unique()->slug,
//        'description' => $faker->sentence(),
//    ];
//});

$factory->define(Story::class, function (Faker $faker) {
    return [
        'user_id'=>rand(2,15),
        'category_id'=>rand(1,15),
        'type_id'=>rand(1,5),
        'name' => $faker->unique()->sentence(),
        'slug' => $faker->unique()->slug,
        'thumbnail' => $faker->imageUrl(),
        'story' => $faker->paragraph(20),
    ];
});

$factory->define(Chapter::class, function (Faker $faker) {
    return [
        'story_id'=>rand(1,50),
        'slug' => $faker->unique()->slug,
        'story' => $faker->paragraph(20),
    ];
});

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word(),
        'slug' => $faker->unique()->slug,
    ];
});

$factory->define(StoryTags::class, function (Faker $faker) {
    return [
        'story_id'=>rand(1,50),
        'tag_id'=>rand(1,12),
    ];
});
