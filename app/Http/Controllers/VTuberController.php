<?php

namespace App\Http\Controllers;

use App\Models\Vtuber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
            'image' => 'required|image|max:2048',
            'birthday' => 'nullable|date',
            'debut_date' => 'required|date',
            'youtube_channel_id' => 'nullable|string|max:128',
            'twitch_channel_id' => 'nullable|string|max:128',
            'twitter_handle' => 'nullable|string|max:128',
            'description' => 'required|string',
        ]);

        $path = $request->file('image')->store('vtubers', 'public');

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
            'image' => Storage::url($path),
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
        $birthdayFormatted = $vtuber->birthday
            ? Carbon::parse($vtuber->birthday)->format('F j, Y')
            : null;

        $debutFormatted = $vtuber->debut_date
            ? Carbon::parse($vtuber->debut_date)->format('F j, Y')
            : null;

        return view('vtubers.show', [
            'vtuber' => $vtuber,
            'birthdayFormatted' => $birthdayFormatted,
            'debutFormatted' => $debutFormatted,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vtuber $vtuber)
    {
        return view('vtubers.edit', compact('vtuber'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vtuber $vtuber)
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
            'image' => 'nullable|image|max:2048',
            'birthday' => 'nullable|date',
            'debut_date' => 'required|date',
            'youtube_channel_id' => 'nullable|string|max:128',
            'twitch_channel_id' => 'nullable|string|max:128',
            'twitter_handle' => 'nullable|string|max:128',
            'description' => 'required|string',
        ]);

        $data = $request->only([
            'name',
            'agency',
            'age',
            'gender',
            'height',
            'weight',
            'nationality',
            'zodiac_sign',
            'fandom_name',
            'emoji',
            'birthday',
            'debut_date',
            'youtube_channel_id',
            'twitch_channel_id',
            'twitter_handle',
            'description'
        ]);

        if ($request->hasFile('image')) {
            $newPath = $request->file('image')->store('vtubers', 'public');
            $data['image'] = Storage::url($newPath);

            if (!empty($vtuber->image)) {
                if (str_starts_with($vtuber->image, '/storage/')) {
                    $old = substr($vtuber->image, strlen('/storage/'));
                    Storage::disk('public')->delete($old);
                } elseif (preg_match('#/storage/(.+)$#', $vtuber->image, $m)) {
                    Storage::disk('public')->delete($m[1]);
                }
            }
        }

        $vtuber->update($data);

        return redirect()->route('vtubers.show', $vtuber->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vtuber $vtuber)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        if (!empty($vtuber->image)) {
            if (str_starts_with($vtuber->image, '/storage/')) {
                $old = substr($vtuber->image, strlen('/storage/'));
                Storage::disk('public')->delete($old);
            } elseif (preg_match('#/storage/(.+)$#', $vtuber->image, $m)) {
                Storage::disk('public')->delete($m[1]);
            }
        }

        $vtuber->delete();

        return redirect()->route('vtubers.index');
    }
}
