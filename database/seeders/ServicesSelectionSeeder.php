<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSelectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicesSelection = [
            [
                'services_category' => 'Birthday',
                'services_image' => 'images/pork.jpeg',
            ],
            [
                'services_category' => 'Baptismal',
                'services_image' => 'images/pork.jpeg', 
            ],
            
        ];

        foreach ($servicesSelection as $item) {
            DB::table('services_selection')->insert($item);
        }
    }
}
