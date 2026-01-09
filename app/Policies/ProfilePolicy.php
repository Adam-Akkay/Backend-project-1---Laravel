<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProfilePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Anyone can view profiles
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, User $model): bool
    {
        return true; // Public profiles
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
<<<<<<< HEAD
        // Users can edit their own profile, admins can edit any profile
        return $user->id === $model->id || $user->isAdmin();
=======
        return $user->id === $model->id; // Users can only edit their own profile
>>>>>>> d8a97282b9145629dc952d67913417992d407051
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
}
