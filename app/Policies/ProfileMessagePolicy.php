<?php

namespace App\Policies;

use App\Models\ProfileMessage;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProfileMessagePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true; // Public profile messages
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, ProfileMessage $profileMessage): bool
    {
        return true; // Public messages
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Logged-in users can post messages
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ProfileMessage $profileMessage): bool
    {
        return false; // Messages cannot be edited
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ProfileMessage $profileMessage): bool
    {
        return $user->isAdmin() || $user->id === $profileMessage->author_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ProfileMessage $profileMessage): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ProfileMessage $profileMessage): bool
    {
        return false;
    }
}
