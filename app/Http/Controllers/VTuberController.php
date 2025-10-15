<?php

namespace App\Http\Controllers;

use App\Models\Vtuber;
use Illuminate\Http\Request;

class VTuberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vtubers = Vtuber::all();
        return view('vtubers.index', compact('vtubers'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
    public function show(Vtuber $vtuber)
    {
        return view('vtubers.show', [
            'vtuber' => $vtuber
        ]);
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
