<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'username',
        'birthday',
        'profile_photo',
        'about_me',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birthday' => 'date',
        ];
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Get the comments written by this user
     */
    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the messages on this user's profile
     */
    public function profileMessages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProfileMessage::class, 'profile_user_id')->orderBy('created_at', 'desc');
    }

    /**
     * Get the messages written by this user
     */
    public function authoredMessages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProfileMessage::class, 'author_id');
    }

    /**
     * Get the news items favorited by this user (many-to-many relationship)
     */
    public function favoriteNews(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(News::class, 'favorites')->withTimestamps();
    }
}
