<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('issues')->insert(['subject' => 'Yucky Office Chair', 'description' => 'Smelly chair seat and grimey armrests, it seemed like it was buit-up sweat from previous employees that used this desk.', 'type' => 'feedback', 'user_id' => 8, 'desk_id' => 35, 'created_at' => Carbon::now()]);
        DB::table('issues')->insert(['subject' => 'Broken Ports', 'description' => 'Smelly chair seat and grimey armrests, it seemed like it was buit-up sweat from previous employees that used this desk.', 'type' => 'feedback', 'user_id' => 3, 'desk_id' => 56, 'created_at' => Carbon::now()]);
        DB::table('issues')->insert(['subject' => 'Slow Wifi Reception', 'description' => 'Smelly chair seat and grimey armrests, it seemed like it was buit-up sweat from previous employees that used this desk.', 'type' => 'feedback', 'user_id' => 2, 'desk_id' => 72, 'created_at' => Carbon::now()]);
        DB::table('issues')->insert(['subject' => 'Desk instability and chair', 'description' => 'Smelly chair seat and grimey armrests, it seemed like it was buit-up sweat from previous employees that used this desk.', 'type' => 'feedback', 'user_id' => 5, 'desk_id' => 13, 'created_at' => Carbon::now()]);
        DB::table('issues')->insert(['subject' => 'Armrest broken', 'description' => 'Smelly chair seat and grimey armrests, it seemed like it was buit-up sweat from previous employees that used this desk.', 'type' => 'feedback', 'user_id' => 4, 'desk_id' => 11, 'created_at' => Carbon::now()]);
        DB::table('issues')->insert(['subject' => 'Office Chair not adjustable', 'description' => 'Smelly chair seat and grimey armrests, it seemed like it was buit-up sweat from previous employees that used this desk.', 'type' => 'feedback', 'user_id' => 1, 'desk_id' => 16, 'created_at' => Carbon::now()]);
        DB::table('issues')->insert(['subject' => 'Chair wheels stuck', 'description' => 'Smelly chair seat and grimey armrests, it seemed like it was buit-up sweat from previous employees that used this desk.', 'type' => 'feedback', 'user_id' => 7, 'desk_id' => 5, 'created_at' => Carbon::now()]);
        DB::table('issues')->insert(['subject' => 'Desk Hygiene', 'description' => 'Smelly chair seat and grimey armrests, may nakalagay na booger sa armrest.', 'type' => 'feedback', 'user_id' => 7, 'desk_id' => 5, 'created_at' => Carbon::now()]);
    }
}
