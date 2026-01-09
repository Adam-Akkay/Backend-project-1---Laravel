<?php

namespace App\Http\Controllers;

use App\Models\ProfileMessage;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileMessageController extends Controller
{
    /**
     * Store a newly created profile message
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'message' => 'required|string|max:500',
        ]);

        ProfileMessage::create([
            'profile_user_id' => $user->id,
            'author_id' => auth()->id(),
            'message' => $request->message,
        ]);

        return redirect()->route('profiles.show', $user)
            ->with('success', 'Bericht succesvol geplaatst.');
    }

    /**
     * Remove the specified profile message
     */
    public function destroy(ProfileMessage $profileMessage)
    {
        $this->authorize('delete', $profileMessage);
        
        $user = $profileMessage->profileUser;
        $profileMessage->delete();

        return redirect()->route('profiles.show', $user)
            ->with('success', 'Bericht succesvol verwijderd.');
    }
}
