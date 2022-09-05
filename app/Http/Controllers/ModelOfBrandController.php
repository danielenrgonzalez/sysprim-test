<?php

namespace App\Http\Controllers;

use App\Models\ModelOfBrand;
use App\Http\Requests\StoreModelOfBrandRequest;
use App\Http\Requests\UpdateModelOfBrandRequest;

class ModelOfBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\ModelOfBrand  $modelOfBrand
     * @return \Illuminate\Http\Response
     */
    public function show(ModelOfBrand $modelOfBrand)
    {
        //
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
}
