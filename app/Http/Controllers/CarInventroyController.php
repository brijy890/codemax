<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarInventory;
use App\Http\Resources\CarInventorylCollection;
use App\Http\Resources\CarInventoryResource;
use Symfony\Component\HttpFoundation\Response;

class CarInventroyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CarInventorylCollection::collection(CarInventory::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response([
            "data" => new CarInventoryResource(CarInventory::create($request->all())),
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CarInventory $car_inventory)
    {
        return new CarInventoryResource($car_inventory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarInventory $car_inventory)
    {
        $car_inventory->update($request->all());
        return response([
            "data" => new CarInventoryResource($car_inventory),
        ], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarInventory $car_inventory)
    {
        $car_inventory->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
