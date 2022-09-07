<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('brands.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $brand_id
     * @return \Illuminate\Http\Response
     */
    public function show($brand_id)
    {
        return view('brands.show', compact('brand_id'));
    }
}
