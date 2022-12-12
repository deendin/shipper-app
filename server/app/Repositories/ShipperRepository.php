<?php

namespace App\Repositories;

use App\Contracts\Repositories\ShipperRepositoryInterface as Contract;
use App\Models\Shipper;

class ShipperRepository implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        return Shipper::latest()->paginate(20);
    }

    /**
     * {@inheritdoc}
     */
    public function findById(string $uuid) : Shipper
    {
        return Shipper::where('uuid', $uuid)->first();
    }
}