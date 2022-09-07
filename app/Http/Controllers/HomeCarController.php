<?php

namespace App\Http\Controllers;

class HomeCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cars.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $car_id
     * @return \Illuminate\Http\Response
     */
    public function show($car_id)
    {
        return view('cars.show', compact('car_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $car_id
     * @return \Illuminate\Http\Response
     */
    public function edit($car_id)
    {
        return view('cars.edit', compact('car_id'));
    }
}
