<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Shipper extends Model
{
    use HasFactory, HasUuid;

    /**
     * Get all of the contacts that belongs to the shipper.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class)->orderBy('created_at', 'desc');
    }

    /**
     * Returns the primary contact of the shipper.
     * 
     * @return Contact
     */
    public function primaryContact()
    {
        return $this->contacts()->where('is_primary_contact', true)->first();
    }
}
