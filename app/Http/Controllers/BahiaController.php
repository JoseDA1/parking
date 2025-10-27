<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahia;

class BahiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bahias = Bahia::all();

        return view('bahias.index', compact('bahias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cambioestadobahia(Request $request)
	{
		$bahias = Bahia::find($request->id);
		$bahias->estado=$request->estado;
		$bahias->save();
	}
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
