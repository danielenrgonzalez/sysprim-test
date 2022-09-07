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
        dd($car_id);
        // $faqCategory = FaqCategory::find($car_id);
        // if ($faqCategory) {
        //     $faqs = Faq::where('faq_category_id', $faqCategory->id)->paginate(config('app.pagination_large'));
        //     return view('admin.backend.faq-categories.show', compact('faqCategory', 'faqs'));
        // } else {
        //     return redirect()->back()->with('error', 'Categoría no encontrada');
        // }
    }
}
