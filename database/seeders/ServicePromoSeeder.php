<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServicePromo;

class ServicePromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicePromoData = [
            ['name' => 'Birthday Promo #1', 'description' => '50 guest', 'service_promo_image' => 'birthday promo 1.png', 'service_selection_id' => 1],
            ['name' => 'Birthday Promo #2', 'description' => '100 guest', 'service_promo_image' => 'birthday promo 2.png', 'service_selection_id' => 1],
            ['name' => 'Birthday Promo #3', 'description' => '150 guest', 'service_promo_image' => 'birthday promo 3.png', 'service_selection_id' => 1],
            ['name' => 'Baptismal Promo #1', 'description' => '50 guest', 'service_promo_image' => 'baptismal promo 1.png', 'service_selection_id' => 2],
            ['name' => 'Baptismal Promo #2', 'description' => '100 guest', 'service_promo_image' => 'baptismal promo 2.png', 'service_selection_id' => 2],
            ['name' => 'Baptismal Promo #3', 'description' => '150 guest', 'service_promo_image' => 'baptismal promo 3.png', 'service_selection_id' => 2],
        ];

        foreach ($servicePromoData as $servicePromo) {
            ServicePromo::create($servicePromo);
        }
    }
}
