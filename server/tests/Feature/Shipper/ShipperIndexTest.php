<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\Shipper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ShipperIndexTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Test shippers can be retrieved.
     *
     * @return void
     */
    public function test_shippers_can_be_retrieved()
    {
        Shipper::factory()->count(4)->create();

        $response = $this->getJson(route('api.shipper.index'));

        $response->assertJsonCount(5, 'data');

        $this->assertDatabaseCount('shippers', 5);
    }

}
