<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:256',
            'type' => 'required|string|max:64',
            'content' => 'required|string|max:2048',
        ]);

        Report::create([
            'user_id' => auth()->id(),
            'title' => $request->input('title'),
            'type' => $request->input('type'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('contact');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        $dayReported = $report->created_at
            ? Carbon::parse($report->created_at)->format('F j, Y')
            : null;

        return view('reports.show', [
            'report' => $report,
            'dayReported' => $dayReported,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $report->delete();

        return redirect()->route('dashboard');
    }
}
