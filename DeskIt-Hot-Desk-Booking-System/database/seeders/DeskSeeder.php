<?php

namespace Database\Seeders;
use App\Models\Desk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {   
        $desks = Desk::all();

        foreach ($desks as $desk) {
            $desk->amenities = $this->generateRandomAmenities();
            $desk->save();
        }

        $data = [];
        $data2 = [];

        // for ($deskNum = 101; $deskNum <= 136; $deskNum++) {
        //     $data[] = [
        //         'desk_num' => $deskNum,
        //         'statuses_id' => $statusValues[array_rand($statusValues)],
        //     ];
        // }

        for ($i = 1; $i <= 36; $i++){
            $deskNum = $i + 100;
            $data[] = [
                'id' => $i,
                'desk_num' => $deskNum,
                'status' => 'in_use',
            ];
        };

        for ($i = 37; $i <= 72; $i++){
            $deskNum = $i + 164;
            $data2[] = [
                'id' => $i,
                'desk_num' => $deskNum,
                'status' => 'in_use',
            ];
        };

        // Insert data into the 'desks' table
        
        DB::table('desks')->insert($data);
        DB::table('desks')->insert($data2);
    }


    private function generateRandomAmenities()
    {
        $amenities = [];

        $allAmenities = [
            'High-speed internet',
            'Power outlets',
            'Privacy screen',
            'Adjustable chair',
            'Natural light',
            'Locker',
            'Desk lamp',
            'Headphones',
            'Sticky notes',
            'Dual monitors',
        ];

        // Shuffle amenities array to get random amenities for each desk
        shuffle($allAmenities);
        // Select the first 4 amenities
        $selectedAmenities = array_slice($allAmenities, 0, 4);

        return $selectedAmenities;
    }

}
