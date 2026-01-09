<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Email address of the protected admin user that cannot be deleted
     */
    private const PROTECTED_ADMIN_EMAIL = 'admin@ehb.be';

    /**
     * Check if a user is the protected admin that cannot be deleted
     */
    private function isProtectedAdmin(User $user): bool
    {
        return $user->email === self::PROTECTED_ADMIN_EMAIL;
    }

    /**
     * Display a listing of users
     */
    public function index()
    {
        $users = User::orderBy('name')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created user
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::defaults()],
            'role' => 'required|in:user,admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker succesvol aangemaakt.');
    }

    /**
     * Toggle admin role for a user
     */
    public function toggleAdmin(User $user)
    {
        // Prevent removing admin role from protected admin
        if ($this->isProtectedAdmin($user) && $user->role === 'admin') {
            return redirect()->route('admin.users.index')
                ->with('error', 'De admin rechten van de hoofdbeheerder kunnen niet worden verwijderd.');
        }

        $user->update([
            'role' => $user->role === 'admin' ? 'user' : 'admin',
        ]);

        $message = $user->role === 'admin' 
            ? 'Gebruiker is nu admin.' 
            : 'Admin rechten zijn verwijderd.';

        return redirect()->route('admin.users.index')->with('success', $message);
    }

    /**
     * Remove the specified user
     * 
     * Backend protection: Prevents deletion of the protected admin user (admin@ehb.be)
     * This check is critical for security and cannot be bypassed via direct API calls.
     */
    public function destroy(User $user)
    {
        // Prevent deleting the protected admin user (admin@ehb.be)
        // This is a critical security check that cannot be bypassed
        if ($this->isProtectedAdmin($user)) {
            return redirect()->route('admin.users.index')
                ->with('error', 'De hoofdbeheerder kan niet worden verwijderd.');
        }

        // Prevent deleting yourself
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'U kunt uzelf niet verwijderen.');
        }

        // Delete related data
        $user->comments()->delete();
        $user->profileMessages()->delete();
        $user->authoredMessages()->delete();

        // Delete user
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Gebruiker succesvol verwijderd. Het e-mailadres is nu beschikbaar voor nieuwe registraties.');
    }
}
