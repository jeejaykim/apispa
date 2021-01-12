<?php

use App\Reservation;
use Faker\Generator as Faker;

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
 
$factory->define(App\Reservation::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'contact_number'=> $faker->PhoneNumber,
        'therapist' => $faker->name,
        'category' => 'Full Body Massage',
        'service' => 'Full Body Massage',
        'minutes' => '45',
        'price' => '350',
        'role' => 'guest',
        'reserved_date' => $faker->date,
        'reserved_time' => $faker->time,
        'active' => '0',
        'sched_id' => '0',

        
    ];
});
