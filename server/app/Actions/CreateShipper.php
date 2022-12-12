<?php

namespace App\Actions;

use App\Models\Shipper;

class CreateShipper
{
    /**
     * Creates the shipper model.
     * 
     */
    public function create(array $data)
    {
        $shipper = new Shipper;

        $shipper->company_name = $data['company_name'];
        $shipper->address = $data['address'];
        $shipper->save();

        $contact = $data['contact'];

        $shipper->contacts()->create([
            'name' => $contact['name'],
            'contact_number' => $contact['contact_number'],
            'is_primary_contact' => 1, // sets first contact to default to 1.
        ]);

        return $shipper;
    }
}