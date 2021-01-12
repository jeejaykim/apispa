<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
			[           
				'username' => 'admin',
	            'name' => 'Admin',
	            'contact_number' => '090909090',
	            'email' => 'admin@admin.com',
	            'role' => 'admin',
	            'password' => bcrypt('apispa123'),
	            'status' => 1,
				'avatar' => 'default.jpg',
				'customers_served' => 0,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[           
				'username' => 'therapist.may',
	            'name' => 'May',
	            'contact_number' => '11111111111',
	            'email' => 'therapist@may.com',
	            'role' => 'staff',
	            'password' => bcrypt('staff'),
	            'status' => 1,
				'avatar' => 'default.jpg',
				'customers_served' => 0,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[           
				'username' => 'therapist.jinna',
	            'name' => 'Jinna',
	            'contact_number' => '22222222222',
	            'email' => 'therapist@jinna.com',
	            'role' => 'staff',
	            'password' => bcrypt('staff'),
	            'status' => 1,
				'avatar' => 'default.jpg',
				'customers_served' => 0,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[           
				'username' => 'therapist.jenny',
	            'name' => 'Jenny',
	            'contact_number' => '33333333333',
	            'email' => 'therapist@jenny.com',
	            'role' => 'staff',
	            'password' => bcrypt('staff'),
	            'status' => 1,
				'avatar' => 'default.jpg',
				'customers_served' => 0,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
        ]);
    }
}
