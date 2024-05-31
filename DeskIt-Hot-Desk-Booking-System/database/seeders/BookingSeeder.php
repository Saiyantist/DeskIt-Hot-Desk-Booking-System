<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {
        //
        DB::table('bookings')->insert([

            // Floor 1
            ['booking_date' => '2024-01-24', 'booking_time' => '09:00:00', 'booking_endtime' => '17:00:00', 'status' => 'accepted', 'user_id' => 1, 'desk_id' => 2],
            ['booking_date' => '2024-01-24', 'booking_time' => '08:00:00', 'booking_endtime' => '16:00:00', 'status' => 'accepted', 'user_id' => 3, 'desk_id' => 4],
            ['booking_date' => '2024-01-24', 'booking_time' => '20:00:00', 'booking_endtime' => '05:00:00', 'status' => 'accepted', 'user_id' => 9, 'desk_id' => 9],
            ['booking_date' => '2024-01-24', 'booking_time' => '09:00:00', 'booking_endtime' => '17:00:00', 'status' => 'accepted', 'user_id' => 4, 'desk_id' => 10],
            ['booking_date' => '2024-01-24', 'booking_time' => '07:00:00', 'booking_endtime' => '16:00:00', 'status' => 'accepted', 'user_id' => 11, 'desk_id' => 11],

            ['booking_date' => '2024-01-24', 'booking_time' => '09:00:00', 'booking_endtime' => '17:00:00', 'status' => 'accepted', 'user_id' => 5, 'desk_id' => 14],
            ['booking_date' => '2024-01-24', 'booking_time' => '08:00:00', 'booking_endtime' => '16:00:00', 'status' => 'accepted', 'user_id' => 6, 'desk_id' => 16],
            // ['booking_date' => '2024-01-24', 'status' => 'accepted', 'user_id' => 13, 'desk_id' => 21],
            ['booking_date' => '2024-01-24', 'booking_time' => '20:00:00', 'booking_endtime' => '05:00:00', 'status' => 'accepted', 'user_id' => 8, 'desk_id' => 27],
            ['booking_date' => '2024-01-24', 'booking_time' => '07:00:00', 'booking_endtime' => '16:00:00', 'status' => 'accepted', 'user_id' => 2, 'desk_id' => 28],

            ['booking_date' => '2024-01-24', 'booking_time' => '17:00:00', 'booking_endtime' => '02:00:00', 'status' => 'accepted', 'user_id' => 12, 'desk_id' => 32],
            ['booking_date' => '2024-01-24', 'booking_time' => '23:00:00', 'booking_endtime' => '07:00:00', 'status' => 'accepted', 'user_id' => 7, 'desk_id' => 35],
            ['booking_date' => '2024-01-24', 'booking_time' => '08:00:00', 'booking_endtime' => '16:00:00', 'status' => 'accepted', 'user_id' => 10, 'desk_id' => 36],

            // Floor 2
            ['booking_date' => '2024-01-25', 'booking_time' => '08:00:00', 'booking_endtime' => '16:00:00', 'status' => 'accepted', 'user_id' => 1, 'desk_id' => 37],
            ['booking_date' => '2024-01-25', 'booking_time' => '07:00:00', 'booking_endtime' => '16:00:00', 'status' => 'accepted', 'user_id' => 3, 'desk_id' => 40],
            ['booking_date' => '2024-01-25', 'booking_time' => '09:00:00', 'booking_endtime' => '17:00:00', 'status' => 'accepted', 'user_id' => 9, 'desk_id' => 44],
            ['booking_date' => '2024-01-25', 'booking_time' => '20:00:00', 'booking_endtime' => '05:00:00', 'status' => 'accepted', 'user_id' => 4, 'desk_id' => 45],
            ['booking_date' => '2024-01-25', 'booking_time' => '23:00:00', 'booking_endtime' => '07:00:00', 'status' => 'accepted', 'user_id' => 11, 'desk_id' => 48],

            ['booking_date' => '2024-01-25', 'booking_time' => '22:00:00', 'booking_endtime' => '06:00:00', 'status' => 'accepted', 'user_id' => 5, 'desk_id' => 49],
            ['booking_date' => '2024-01-25', 'booking_time' => '17:00:00', 'booking_endtime' => '02:00:00', 'status' => 'accepted', 'user_id' => 6, 'desk_id' => 51],
            // ['booking_date' => '2024-01-25', 'status' => 'accepted', 'user_id' => 13, 'desk_id' => 55],
            ['booking_date' => '2024-01-25', 'booking_time' => '23:00:00', 'booking_endtime' => '07:00:00','status' => 'accepted', 'user_id' => 8, 'desk_id' => 65],
            ['booking_date' => '2024-01-25', 'booking_time' => '20:00:00', 'booking_endtime' => '05:00:00', 'status' => 'accepted', 'user_id' => 2, 'desk_id' => 61],

            ['booking_date' => '2024-01-25', 'booking_time' => '08:00:00', 'booking_endtime' => '16:00:00', 'status' => 'accepted', 'user_id' => 12, 'desk_id' => 69],
            ['booking_date' => '2024-01-25', 'booking_time' => '07:00:00', 'booking_endtime' => '16:00:00', 'status' => 'accepted', 'user_id' => 7, 'desk_id' => 71],
            ['booking_date' => '2024-01-25', 'booking_time' => '09:00:00', 'booking_endtime' => '17:00:00', 'status' => 'accepted', 'user_id' => 10, 'desk_id' => 72],

        ]);
    }
}
