<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $car_id
     * @return \Illuminate\Http\Response
     */
    public function show($car_id)
    {
        return view('show', compact('car_id'));
    }
}
