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
// Users
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    $data = [
        'full_name' => $faker->name,
        'mobile_number' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'status' => true,
        'activated_at' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now'),
        'role_id' => rand(2, 2),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
    $role = \App\Models\Role::find($data['role_id']);
    $data['role_title'] = $role->title;
    return $data;
});

// Tags
$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    return [
        'tag' => $faker->word,
        'meta_description' => $faker->sentence,
    ];
});

// News
$factory->define(App\Models\News::class, function (Faker\Generator $faker) {
    $user_ids = \App\Models\User::pluck('id')->random();
    $title = $faker->sentence(mt_rand(3, 10));
    return [
        'user_id' => $user_ids,
        'last_user_id' => $user_ids,
        'title' => $title,
        'summary' => strtolower($title),
        'content' => $faker->paragraph,
        'meta_description' => $faker->sentence,
        'slug' => str_slug($title),
        'created_at' => $faker->dateTimeBetween($startDate = '-4 months', $endDate = '-3 months'),
        'published_at' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now')
    ];
});

// Reviews
$factory->define(App\Models\Review::class, function (Faker\Generator $faker) {
    $user_ids = \App\Models\User::pluck('id')->random();
    $title = $faker->sentence(mt_rand(3, 10));
    return [
        'user_id' => $user_ids,
        'last_user_id' => $user_ids,
        'reviewer_name' => $faker->name,
        'reviewer_picture_uri' => $faker->imageUrl,
        'reviewer_designation' => $faker->jobTitle,
        'reviewer_organization' => $faker->company,
        'reviewer_location' => $faker->address,
        'content' => $faker->paragraph,
        'rating' => $faker->randomFloat(2, 1, 5),
        'published_at' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now'),
        'created_at' => $faker->dateTimeBetween($startDate = '-4 months', $endDate = '-3 months')
    ];
});

// FAQs
$factory->define(App\Models\Faq::class, function (Faker\Generator $faker) {
    $user_ids = \App\Models\User::pluck('id')->random();
    $title = $faker->sentence(mt_rand(3, 10));
    return [
        'user_id' => $user_ids,
        'last_user_id' => $user_ids,
        'title' => $title,
        'content' => $faker->paragraph,
        'meta_description' => $faker->sentence,
        'created_at' => $faker->dateTimeBetween($startDate = '-4 months', $endDate = '-3 months'),
        'published_at' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now')
    ];
});

// Footer
$factory->define(App\Models\Footer::class, function (Faker\Generator $faker) {
    $user_ids = \App\Models\User::pluck('id')->random();
    $title = $faker->sentence(mt_rand(3, 10));
    return [
        'user_id' => $user_ids,
        'last_user_id' => $user_ids,
        'title' => $title,
        'content' => json_encode(['column1' => $faker->paragraph, 'column2' => $faker->paragraph, 'column3' => $faker->paragraph])
    ];
});

// pages
$factory->define(App\Models\Page::class, function (Faker\Generator $faker) {
    $user_ids = \App\Models\User::pluck('id')->random();
    $footer = \App\Models\Footer::inRandomOrder()->first();
    $title = $faker->sentence(mt_rand(3, 10));
    return [
        'user_id' => $user_ids,
        'last_user_id' => $user_ids,
        'layout' => array_rand(['default', 'landing_page']),
        'type' => array_rand(['landing_page1', 'landing_page2', 'landing_page3']),
        'title' => $title,
        'footer_id' => $footer->id,
        'footer_title' => $footer->title,
        'color' => $faker->hexcolor,
        'seo_title' => $faker->sentence,
        'meta_keywords' => $faker->sentence,
        'meta_description' => $faker->sentence,
        'slug' => str_slug($title),
        'internal_link_count' => rand(5, 100),
        'external_link_count' => rand(5, 100),
        'status' => true,
        'created_at' => $faker->dateTimeBetween($startDate = '-4 months', $endDate = '-3 months'),
        'published_at' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now')
    ];
});

