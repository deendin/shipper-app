<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Contact extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ['name', 'contact_number', 'is_primary_contact'];

    /**
     * Returns the associated shipper
     * 
     */
    public function shipper()
    {
        return $this->belongsTo(Shipper::class);
    }
}
