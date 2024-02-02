<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::all();
     
        return view('stocks.index', compact('stocks')); // -> resources/views/stocks/index.blade.php 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stocks.create'); // -> resources/views/stocks/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation for required fields and numeric value
        $request->validate([
            'stock_name' => 'required',
            'ticket' => 'required',
            'value' => 'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',
        ]);

        // Create a new Stock model instance with the validated data
        $stock = new Stock([
            'stock_name' => $request->get('stock_name'),
            'ticket' => $request->get('ticket'),
            'value' => $request->get('value'),
        ]);

        // Save the new stock record to the database
        $stock->save();

        // Redirect back to the stocks index page with a success message
        return redirect('/stocks')->with('success', 'Stock saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
