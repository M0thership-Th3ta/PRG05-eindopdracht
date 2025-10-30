<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Vtuber;
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
        $user = auth()->user();

        if (! $user || (! $user->is_admin && ! $user->isAtLeastDaysOld(7))) {
            return redirect()->route('vtubers.show', $vtuber)
                ->with('comment_error', 'your account needs to be at least 7 days old to post comments');
        }

        $request->validate([
            'content' => 'required|string'
        ]);

        Comment::create([
            'content' => $request->input('content'),
            'vtuber_id' => $request->vtuber_id,
            'user_id' => $user->id,
        ]);

        return redirect()->route('vtubers.show', $vtuber);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        abort_if(! auth()->check() || auth()->user()->id !== $comment->user_id, 403);

        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        abort_if(! auth()->check() || auth()->user()->id !== $comment->user_id, 403);

        $request->validate([
            'content' => 'required|string'
        ]);

        $comment->update([
            'content' => $request->input('content'),
        ]);

        return redirect()->route('vtubers.show', $comment->vtuber);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        abort_if(! auth()->check() || (auth()->id() !== $comment->user_id && ! auth()->user()->is_admin), 403);

        $vtuber = $comment->vtuber;
        $comment->delete();

        return redirect()->route('vtubers.show', $vtuber);
    }
}
