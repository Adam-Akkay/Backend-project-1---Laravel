<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Toggle favorite status for a news item
     */
    public function toggle(News $news)
    {
        $user = auth()->user();
        
        if ($user->favoriteNews()->where('news_id', $news->id)->exists()) {
            // Remove from favorites
            $user->favoriteNews()->detach($news->id);
            $message = 'Nieuwsitem verwijderd uit favorieten.';
        } else {
            // Add to favorites
            $user->favoriteNews()->attach($news->id);
            $message = 'Nieuwsitem toegevoegd aan favorieten.';
        }

        return redirect()->back()->with('success', $message);
    }
}
