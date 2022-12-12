<?php

namespace App\Contracts\Repositories;

use App\Models\Shipper;

interface ShipperRepositoryInterface
{
    /**
     * Finds all of the shippers.
     * 
     */
    public function findAll();

    /**
     * Find a specific shipper
     * 
     * @param string $uuid
     * 
     * @return Shipper
     */
    public function findById(string $uuid) : Shipper;

}