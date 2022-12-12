<?php

namespace Database\Seeders;

use App\Models\Shipper;
use Illuminate\Database\Seeder;

class ShipperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shipper::factory()->count(5)->create();
    }
}
