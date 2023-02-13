<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'activated' => true,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'email' => $faker->email,
        'first_name' => $faker->firstName,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'last_login_at' => $faker->dateTime,
        'last_name' => $faker->lastName,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'updated_at' => $faker->dateTime,
        
    ];
});/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Brand::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'name' => $faker->firstName,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Product::class, static function (Faker\Generator $faker) {
    return [
        'brandName' => $faker->sentence,
        'color' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'description' => $faker->sentence,
        'name' => $faker->firstName,
        'price' => $faker->randomFloat,
        'shortName' => $faker->sentence,
        'type' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        'assets' => ['en' => $faker->sentence],
        'sizes' => ['en' => $faker->sentence],
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Product::class, static function (Faker\Generator $faker) {
    return [
        'brand_id' => $faker->sentence,
        'brandName' => $faker->sentence,
        'color' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'description' => $faker->sentence,
        'name' => $faker->firstName,
        'price' => $faker->randomFloat,
        'shortName' => $faker->sentence,
        'type' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        'assets' => ['en' => $faker->sentence],
        'sizes' => ['en' => $faker->sentence],
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Product::class, static function (Faker\Generator $faker) {
    return [
        'brand_id' => $faker->sentence,
        'color' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'description' => $faker->text(),
        'name' => $faker->firstName,
        'price' => $faker->randomFloat,
        'shortName' => $faker->sentence,
        'type' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        'assets' => ['en' => $faker->sentence],
        'sizes' => ['en' => $faker->sentence],
        
    ];
});
