<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModelOfBrandRequest;
use App\Http\Requests\UpdateModelOfBrandRequest;
use App\Http\Resources\ModelOfBrandResource;
use App\Models\Brand;
use App\Models\ModelOfBrand;

class ModelOfBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ModelOfBrandResource::collection(ModelOfBrand::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreModelOfBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModelOfBrandRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($modelOfBrand_id)
    {
        $modelOfBrand = ModelOfBrand::find($modelOfBrand_id);

        return new ModelOfBrandResource($modelOfBrand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModelOfBrandRequest  $request
     * @param  \App\Models\ModelOfBrand  $modelOfBrand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModelOfBrandRequest $request, ModelOfBrand $modelOfBrand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModelOfBrand  $modelOfBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelOfBrand $modelOfBrand)
    {
        //
    }

    /**
     * Display the specified resource by Brand.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showByBrand($brand)
    {
        if (is_null($brand)) {
            return 'Brand not found';
        }
        $modelOfBrand = ModelOfBrand::where('brand_id', $brand)->get();

        return  ModelOfBrandResource::collection($modelOfBrand);
    }
}
