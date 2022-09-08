<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('models.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('models.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $model_id
     * @return \Illuminate\Http\Response
     */
    public function show($model_id)
    {
        return view('models.show', compact('model_id'));
    }
}
