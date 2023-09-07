<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menusData = [
            ['name' => 'Baby Back Ribs', 'description' => 'lorem ipsum', 'price' => 700, 'status' => 1, 'menu_selection_id' => 1, 'menus_image' => 'Baby Back Ribs.jpg'],
            ['name' => 'Baked Macaroni', 'description' => 'lorem ipsum', 'price' => 600, 'status' => 1, 'menu_selection_id' => 6, 'menus_image' => 'Baked Macaroni.jpg'],
            ['name' => 'Beef Caldereta', 'description' => 'lorem ipsum', 'price' => 800, 'status' => 1, 'menu_selection_id' => 2, 'menus_image' => 'Beef Caldereta.jpg'],
            ['name' => 'Buffalo Chicken Wings', 'description' => 'lorem ipsum', 'price' => 600, 'status' => 1, 'menu_selection_id' => 3, 'menus_image' => 'Buffalo Chicken Wings.jpg'],
            ['name' => 'Buko Fruit Salad', 'description' => 'lorem ipsum', 'price' => 500, 'status' => 1, 'menu_selection_id' => 8, 'menus_image' => 'Buko Fruit Salad.jpg'],
            ['name' => 'Buko Salad', 'description' => 'lorem ipsum', 'price' => 500, 'status' => 1, 'menu_selection_id' => 8, 'menus_image' => 'Buko Salad.jpg'],
            ['name' => 'Charlie Chan Pasta', 'description' => 'lorem ipsum', 'price' => 600, 'status' => 1, 'menu_selection_id' => 6, 'menus_image' => 'Charlie Chan Pasta.jpg'],
            ['name' => 'Chicken Caldereta', 'description' => 'lorem ipsum', 'price' => 600, 'status' => 1, 'menu_selection_id' => 3, 'menus_image' => 'Chicken Caldereta.jpg'],
            ['name' => 'Chicken Pastel', 'description' => 'lorem ipsum', 'price' => 600, 'status' => 1, 'menu_selection_id' => 3, 'menus_image' => 'Chicken Pastel.jpg'],
            ['name' => 'Chinese Beef with Mushroom', 'description' => 'lorem ipsum', 'price' => 800, 'status' => 1, 'menu_selection_id' => 2, 'menus_image' => 'Chinese Beef with Mushroom.jpg'],
            ['name' => 'Crispy Prawn Tempura', 'description' => 'lorem ipsum', 'price' => 700, 'status' => 1, 'menu_selection_id' => 5, 'menus_image' => 'Crispy Prawn Tempura.jpg'],
            ['name' => 'Cucumber Lemonade', 'description' => 'lorem ipsum', 'price' => 300, 'status' => 1, 'menu_selection_id' => 9, 'menus_image' => 'Cucumber Lemonade.jpg'],
            ['name' => 'Fish Sweet and Sour', 'description' => 'lorem ipsum', 'price' => 500, 'status' => 1, 'menu_selection_id' => 4, 'menus_image' => 'Fish Sweet and Sour.jpg'],
            ['name' => 'Korean Style BBQ Beef', 'description' => 'lorem ipsum', 'price' => 800, 'status' => 1, 'menu_selection_id' => 2, 'menus_image' => 'Korean Style BBQ Beef.jpg'],
            ['name' => 'Lengua', 'description' => 'lorem ipsum', 'price' => 1000, 'status' => 1, 'menu_selection_id' => 1, 'menus_image' => 'Lengua.jpg'],
            ['name' => 'mixveg', 'description' => 'lorem ipsum', 'price' => 700, 'status' => 1, 'menu_selection_id' => 7, 'menus_image' => 'mixveg.jpg'],
            ['name' => 'Red Iced Tea', 'description' => 'lorem ipsum', 'price' => 300, 'status' => 1, 'menu_selection_id' => 9, 'menus_image' => 'Red Iced Tea.jpg'],
            ['name' => 'Spicy Pork Ribs', 'description' => 'lorem ipsum', 'price' => 700, 'status' => 1, 'menu_selection_id' => 1, 'menus_image' => 'Spicy Pork Ribs.jpg'],
        ];

        foreach ($menusData as $menu) {
            Menu::create($menu);
        }
    }
}
