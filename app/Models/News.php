<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
=======
>>>>>>> d8a97282b9145629dc952d67913417992d407051

class News extends Model
{
    protected $fillable = [
        'title',
        'image',
        'content',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'date',
        ];
    }
<<<<<<< HEAD

    /**
     * Get the comments for this news item
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    /**
     * Get the users who favorited this news item (many-to-many relationship)
     */
    public function favoritedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
=======
>>>>>>> d8a97282b9145629dc952d67913417992d407051
}
