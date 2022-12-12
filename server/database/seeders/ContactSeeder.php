<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Shipper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        Shipper::all()->each(fn ($shipper) => $shipper->contacts()->saveMany(
            Contact::factory()->count(3)->make()
        ));

        // Shipper::all()->each(fn ($shipper) => $shipper->contacts()->saveMany(
        //     Contact::factory()->state(function(array $attributes) use($shipper){
        //         $primaryContactExist = Contact::where('shipper_id', $shipper->id)->first();
        //         // \Log::info($primaryContactExist);
        //         if ($primaryContactExist) {
        //             return ['is_primary_contact' => 0];
        //         } else {
        //             return ['is_primary_contact' => 1];
        //         }
        //         // return ['is_primary_contact' => 0];

        //     })->count(3)->make()
        // ));
    }
}
