<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShipperResource;
use App\Actions\CreateShipper;
use App\Actions\UpdateShipper;
use Illuminate\Http\JsonResponse;
use App\Repositories\ShipperRepository;
use App\Http\Resources\ShipperCollection;
use App\Http\Requests\StoreShipperRequest;
use App\Http\Requests\UpdateShipperRequest;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    /**
     * Constructor
     * 
     * @param ShipperRepository $shipperRepository
     */
    public function __construct(
        public ShipperRepository $shipperRepository,
    ) {
    }

    /**
     * Create a new shipper
     * 
     * @param App\Http\Requests\StoreShipperRequest $request
     * 
     * @return JsonResponse
     */
    public function store(StoreShipperRequest $request)
    {
        $creator = app(CreateShipper::class);

        $data = $creator->create($request->all());

        return (new ShipperResource($data))->response()->setStatusCode(201);
    }

    /**
     * Returns all shippers.
     * 
     * @return ShipperCollection
     */
    public function index() : JsonResponse
    {
        $data = $this->shipperRepository->findAll();

        return (new ShipperCollection($data))->response()->setStatusCode(200);
    }

    /**
     * Returns a specific shipper with its contacts.
     * 
     * @param string $uuid
     * 
     * @return ShipperCollection
     */
    public function show(string $uuid) : JsonResponse
    {
        $data = $this->shipperRepository->findById($uuid);

        return (new ShipperResource($data))->response()->setStatusCode(200);
    }

    /**
     * Updates the specified shipper.
     * 
     * @param App\Http\Requests\UpdateShipperRequest $request
     * @param string $uuid
     * @return ShipperResource
     */
    public function update(UpdateShipperRequest $request, string $uuid)
    {
        $shipper = $this->shipperRepository->findById($uuid);

        $action = app(UpdateShipper::class);

        $data = $action->update($shipper, $request->all());

        return (new ShipperResource($data))->response()->setStatusCode(200);
    }
}
