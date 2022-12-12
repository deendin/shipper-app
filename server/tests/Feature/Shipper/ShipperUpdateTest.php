<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\Shipper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShipperUpdateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test shipper can be updated.
     *
     * @return void
     */
    public function test_shipper_can_be_updated()
    {
        $shipper = Shipper::factory()->create([
            'company_name' => 'Stripe Solutions.',
            'address' => '3A, Broad Street, United States.',
        ]);

        $shipper->contacts()->save(Contact::factory()->state(function(array $attributes){
            return [
                'is_primary_contact' => 1
            ];
        })->make());

        $companyName = 'Alhpabet Inc';
        $address = '33, Ijegun Road Lagos, State.';
        $contact = [
            'name' => 'Malik Ahmad',
            'contact_number' => '07722883372',
            'is_primary_contact' => 1,
        ];
    
        $data = [
            'company_name' => $companyName,
            'address' => $address,
            'contact' => [
                'name' => $contact['name'],
                'contact_number' => $contact['contact_number'],
                'is_primary_contact' => $contact['is_primary_contact'],
            ]
        ];

        $response = $this->patchJson(route('api.shipper.update', ['uuid' => $shipper->uuid]), $data)
                        ->assertStatus(200);

        $response = $response['data'];

        $this->assertEquals($companyName, $response['company_name']);
        $this->assertEquals($address, $response['address']);
    }

}
