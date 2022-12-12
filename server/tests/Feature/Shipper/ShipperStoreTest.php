<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\Shipper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShipperStoreTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test shipper can be created.
     *
     * @return void
     */
    public function test_shipper_can_be_created()
    {
        $this->withoutExceptionHandling();
        $shipper = Shipper::factory()->create();

        $shipper->contacts()->save(Contact::factory()->state(function(array $attributes){
            return [
                'is_primary_contact' => 1
            ];
        })->make());

        $data = [
            'company_name' => $shipper->company_name,
            'address' => $shipper->address,
            'contact' => [
                'name' => $shipper->primaryContact()->name,
                'contact_number' => $shipper->primaryContact()->contact_number,
                'is_primary_contact' => $shipper->primaryContact()->is_primary_contact,
            ]
        ];

        $response = $this->postJson(route('api.shipper.store'), $data)
                    ->assertCreated();

        $response->assertStatus(201);

        $this->assertEquals('success', $response['status']);
        $this->assertEquals('Shipper created successfully.', $response['message']);

        $this->assertDatabaseHas('shippers', [
            'company_name' => $shipper->company_name,
            'address' => $shipper->address,
        ]);
    }

}
