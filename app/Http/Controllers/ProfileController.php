<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
{
    $user = $request->user();

    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.$user->id],
        'username' => ['nullable', 'string', 'alpha_dash', 'max:255', 'unique:users,username,'.$user->id],
        'birthday' => ['nullable', 'date'],
        'about_me' => ['nullable', 'string', 'max:1000'],
        'profile_photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Max 2MB
    ]);

    // Gegevens invullen
    $user->fill($request->only(['name', 'email', 'username', 'birthday', 'about_me']));

    // Als de e-mail verandert, reset dan de verificatie (Breeze standaard)
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    // Profielfoto uploaden verwerken
    if ($request->hasFile('profile_photo')) {
        // Oude foto verwijderen als die bestaat
        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        // Sla de nieuwe foto op in de map 'public/profile_photos'
        $path = $request->file('profile_photo')->store('profile_photos', 'public');
        $user->profile_photo = $path;
    }

    $user->save();

    return redirect()->route('profile.edit')->with('status', 'profile-updated');
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function show(string $username)
{
    // Zoek de user op basis van de unieke username, toon 404 als hij niet bestaat
    $user = User::where('username', $username)->firstOrFail();
    
    return view('profile.show', compact('user'));
}
}
