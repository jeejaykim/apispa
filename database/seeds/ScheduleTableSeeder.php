<?php

use Illuminate\Database\Seeder;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('schedules')->insert([
            [
                'sched_time' => "11:00:00",
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
            ],
            [
                'sched_time' => "12:00:00",
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
            ],
            [
                'sched_time' => "13:00:00",
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
            ],
            [
                'sched_time' => "14:00:00",
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
            ],
            [
                'sched_time' => "15:00:00",
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
            ],
            [
                'sched_time' => "16:00:00",
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
            ],
            [
                'sched_time' => "17:00:00",
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
            ],
            [
                'sched_time' => "18:00:00",
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
            ],
            [
                'sched_time' => "19:00:00",
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
            ],
            [
                'sched_time' => "20:00:00",
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
            ],
            [
                'sched_time' => "21:00:00",
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
            ],
            [
                'sched_time' => "22:00:00",
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
            ],
            [
                'sched_time' => "23:00:00",
    			'created_at' => Carbon::now(),
    			'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
