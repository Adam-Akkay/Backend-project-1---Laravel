<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created comment
     */
    public function store(Request $request, News $news)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'news_id' => $news->id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->route('news.show', $news)
            ->with('success', 'Reactie succesvol geplaatst.');
    }

    /**
     * Remove the specified comment
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        
        $news = $comment->news;
        $comment->delete();

        return redirect()->route('news.show', $news)
            ->with('success', 'Reactie succesvol verwijderd.');
    }
}
