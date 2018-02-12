<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'verified' => $verified = $faker->randomElement([\App\User::VERIFIED_USER, \App\User::UNVERIFIED_USER]),
        'verified_token' => $verified == \App\User::VERIFIED_USER ? null : User::generateVerificationCode(),
        'admin' => $verified = $faker->randomElement([\App\User::ADMIN_USER, \App\User::REGULAR_USER]),
    ];
});


