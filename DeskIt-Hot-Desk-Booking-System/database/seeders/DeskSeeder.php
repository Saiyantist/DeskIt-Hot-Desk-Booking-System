<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusValues = [1, 2, 3];

        $data = [];

        for ($deskNum = 101; $deskNum <= 136; $deskNum++) {
            $data[] = [
                'desk_num' => $deskNum,
                'statuses_id' => $statusValues[array_rand($statusValues)],
            ];
        }

        // Insert data into the 'desks' table
        DB::table('desks')->insert($data);
    }
}
