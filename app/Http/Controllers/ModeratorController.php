<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ModeratorController extends Controller
{
    /**
     * Display dashboard with pending user verifications
     */
    public function dashboard(): View
    {
        $pendingVerifications = User::where('is_verified', false)
            ->where('is_blocked', false)
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        $blockedUsers = User::where('is_blocked', true)
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        $verifiedCount = User::where('is_verified', true)->count();
        $totalUsers = User::count();

        return view('moderator.dashboard', [
            'pendingVerifications' => $pendingVerifications,
            'blockedUsers' => $blockedUsers,
            'verifiedCount' => $verifiedCount,
            'totalUsers' => $totalUsers,
        ]);
    }

    /**
     * Approve a user account
     */
    public function approveUser(User $user): RedirectResponse
    {
        // Verify user is not already verified and not blocked
        if ($user->is_verified || $user->is_blocked) {
            return back()->with('error', 'This user cannot be approved.');
        }

        $user->update(['is_verified' => true]);

        return back()->with('success', "User '{$user->name}' has been verified.");
    }

    /**
     * Reject/Block a user account
     */
    public function blockUser(User $user): RedirectResponse
    {
        // Prevent blocking admin accounts
        if ($user->role === 'admin') {
            return back()->with('error', 'Cannot block admin accounts.');
        }

        $user->update(['is_blocked' => true]);

        return back()->with('success', "User '{$user->name}' has been blocked.");
    }

    /**
     * Unblock a user account
     */
    public function unblockUser(User $user): RedirectResponse
    {
        $user->update(['is_blocked' => false]);

        return back()->with('success', "User '{$user->name}' has been unblocked.");
    }
}
