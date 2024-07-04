<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show(): View {
        $user = Auth::user();
        $avatarUrl = $user->avatar ? Storage::url($user->avatar) : asset('images/anonymous.jpg');
        return view('profile.profile', ['avatarUrl' => $avatarUrl]);
    }

    public function edit(Request $request): View
    {
        $user = $request->user();
        $avatarUrl = $user->avatar ? Storage::url($user->avatar) : asset('images/anonymous.jpg');

        return view('profile.edit', [
            'user' => $user,
            'avatarUrl' => $avatarUrl,
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ($request->hasFile('avatar')) {
            $request->validate([
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $avatarPath = $request->file('avatar')->store('avatars', 'public');

            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $user->avatar = $avatarPath;
        }

        $user->save();

        return redirect()->back()->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
