<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarModel;
use App\Http\Resources\CarModelCollection;
use App\Http\Resources\CarModelResource;
use Symfony\Component\HttpFoundation\Response;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CarModelCollection::collection(CarModel::paginate(10));
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
            "data" => new CarModelResource(CarModel::create($request->all())),
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CarModel $car_model)
    {
        return new CarModelResource($car_model);
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
    public function update(Request $request, CarModel $car_model)
    {
        $car_model->update($request->all());
        return response([
            "data" => new CarModelResource($car_model),
        ], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarModel $car_model)
    {
        $car_model->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
