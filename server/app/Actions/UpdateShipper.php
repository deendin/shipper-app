<?php

namespace App\Actions;

use App\Models\Shipper;

class UpdateShipper
{
    /**
     * Creates the shipper model.
     * 
     */
    public function update(Shipper $shipper, array $data)
    {
        if (isset($data['company_name'])) {
            $shipper->forceFill([
                'company_name' => $data['company_name']
            ]);
        }

        if (isset($data['address'])) {
            $shipper->forceFill([
                'address' => $data['address']
            ]);
        }

        /**
         * Assuming that when the user is updating the shipper,
         * they are also updating the primary contact just like
         * the way they assign a primary contact to a shipper upon
         * creation.
         * 
         */
        
        $contact = $data['contact'];

        $primaryContact = $shipper->primaryContact();

        if ($primaryContact) {
            if (isset($contact['name'])) {
                $primaryContact->forceFill([
                    'name' => $contact['name'],
                ]);
            }
    
            if (isset($contact['contact_number'])) {
                $primaryContact->forceFill([
                    'contact_number' => $contact['contact_number']
                ]);
            }

            $primaryContact->save();
        } else {
            $shipper->contacts()->create([
                'name' => $contact['name'],
                'contact_number' => $contact['contact_number'],
                'is_primary_contact' => 1,
            ]);
        }

        

        $shipper->save();


        return $shipper;
    }
}