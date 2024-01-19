<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            ['id' => 1, 'status' => 'available', 'status_date' => Carbon::now()],
            ['id' => 2, 'status' => 'booked', 'status_date' => Carbon::now()],
            ['id' => 3, 'status' => 'not_available', 'status_date' => Carbon::now()],
        ]);
    }
}
