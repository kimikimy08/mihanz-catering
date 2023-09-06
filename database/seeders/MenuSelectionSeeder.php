<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class MenuSelectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $menuSelection = [
            [
                'menu_category' => 'Pork',
                'menu_image' => 'images/pork.jpeg',
            ],
            [
                'menu_category' => 'Beef',
                'menu_image' => 'images/pork.jpeg', 
            ],
            [
                'menu_category' => 'Chicken',
                'menu_image' => 'images/pork.jpeg', 
            ],
            [
                'menu_category' => 'Fish',
                'menu_image' => 'images/pork.jpeg', 
            ],
            [
                'menu_category' => 'SeaFood',
                'menu_image' => 'images/pork.jpeg', 
            ],
            [
                'menu_category' => 'Pasta',
                'menu_image' => 'images/pork.jpeg', 
            ],
            [
                'menu_category' => 'Vegetables',
                'menu_image' => 'images/pork.jpeg', 
            ],
            [
                'menu_category' => 'Desserts',
                'menu_image' => 'images/pork.jpeg', 
            ],
            [
                'menu_category' => 'Drinks',
                'menu_image' => 'images/pork.jpeg', 
            ],
        ];

        foreach ($menuSelection as $item) {
            DB::table('menu_selection')->insert($item);
        }
    }
}
