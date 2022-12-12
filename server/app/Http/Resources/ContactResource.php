<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'name' => $this->name,
            'contact_number' => $this->contact_number,
            'primary_contact' => $this->is_primary_contact ? true : false,
        ];
    }

    public function with($request)
    {
        return [
            'status' => 'success',
            'message' => 'Contact created successfully.'
        ];
    }
}