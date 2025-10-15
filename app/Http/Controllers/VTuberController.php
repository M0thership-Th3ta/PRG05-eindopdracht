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
        return view('vtubers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:128',
            'agency' => 'nullable|string|max:128',
            'age' => 'nullable|string|max:64',
            'gender' => 'required|string|max:64',
            'height' => 'nullable|string|max:64',
            'weight' => 'nullable|string|max:64',
            'nationality' => 'nullable|string|max:64',
            'zodiac_sign' => 'nullable|string|max:64',
            'fandom_name' => 'nullable|string|max:128',
            'emoji' => 'nullable|string|max:64',
            'image_url' => 'required|string|max:256',
            'birthday' => 'nullable|date',
            'debut_date' => 'required|date',
            'youtube_channel_id' => 'nullable|string|max:128',
            'twitch_channel_id' => 'nullable|string|max:128',
            'twitter_handle' => 'nullable|string|max:128',
            'description' => 'required|text',
        ]);

        Vtuber::create([
            'name' => $request->name,
            'agency' => $request->agency,
            'age' => $request->age,
            'gender' => $request->gender,
            'height' => $request->height,
            'weight' => $request->weight,
            'nationality' => $request->nationality,
            'zodiac_sign' => $request->zodiac_sign,
            'fandom_name' => $request->fandom_name,
            'emoji' => $request->emoji,
            'image_url' => $request->image_url,
            'birthday' => $request->birthday,
            'debut_date' => $request->debut_date,
            'youtube_channel_id' => $request->youtube_channel_id,
            'twitch_channel_id' => $request->twitch_channel_id,
            'twitter_handle' => $request->twitter_handle,
            'description' => $request->description
        ]);

        return redirect()->route('vtubers.index');
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
