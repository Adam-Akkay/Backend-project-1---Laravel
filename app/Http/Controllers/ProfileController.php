<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Policies\ProfilePolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display the specified user profile
     */
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    /**
     * Show the form for editing the user's own profile
     */
    public function edit()
    {
        $user = auth()->user();
        $this->authorize('update', $user);
        return view('profiles.edit', compact('user'));
    }

    /**
     * Update the user's own profile
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        $this->authorize('update', $user);

        $request->validate([
            'username' => ['nullable', 'string', 'max:255'],
            'birthday' => ['nullable', 'date'],
            'profile_photo' => ['nullable', 'image', 'max:2048'],
            'about_me' => ['nullable', 'string', 'max:1000'],
        ]);

        $data = $request->only(['username', 'birthday', 'about_me']);

        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            // Store new photo
            $data['profile_photo'] = $request->file('profile_photo')->store('profile-photos', 'public');
        }

        $user->update($data);

        return redirect()->route('profiles.show', $user)->with('success', 'Profiel succesvol bijgewerkt.');
    }
}
