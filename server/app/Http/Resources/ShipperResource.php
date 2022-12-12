<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShipperResource extends JsonResource
{
    /**
     * Transforms the contact resource into an array.
     * 
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->uuid,
            'company_name' => $this->company_name,
            'address' => $this->address,
            'primary_contact' => (new ContactResource($this->primaryContact())),
            'contacts' => (new ContactCollection($this->contacts))
        ];
    }

    public function with($request)
    {
        $message = 'Shippers retrieved successfully.';

        if ($request->isMethod('POST')) {
            $message = 'Shipper created successfully.';
        }

        return [
            'status' => 'success',
            'message' => $message
        ];
    }
}