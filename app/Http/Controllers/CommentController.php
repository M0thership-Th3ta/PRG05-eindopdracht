<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Vtuber;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::with(['user', 'vtuber'])->latest()->get();
        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Vtuber $vtuber)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        Comment::create([
            'content' => $request->input('content'),
            'vtuber_id' => $request->vtuber_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('vtubers.show', $vtuber);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $datePosted = $comment->created_at
            ? Carbon::parse($comment->created_at)->format('F j, Y')
            : null;

        return view('comments.show', [
            'comment' => $comment,
            'datePosted' => $datePosted,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
