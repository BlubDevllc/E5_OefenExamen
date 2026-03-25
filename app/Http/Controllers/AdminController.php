<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    /**
     * Display admin dashboard with system statistics
     */
    public function dashboard(): View
    {
        $totalUsers = User::count();
        $verifiedUsers = User::where('is_verified', true)->count();
        $blockedUsers = User::where('is_blocked', true)->count();
        $pendingReview = User::where('is_verified', false)
            ->where('is_blocked', false)
            ->count();

        $usersByRole = User::selectRaw('role, count(*) as count')
            ->groupBy('role')
            ->get()
            ->pluck('count', 'role');

        $recentUsers = User::latest('created_at')->take(10)->get();

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'verifiedUsers' => $verifiedUsers,
            'blockedUsers' => $blockedUsers,
            'pendingReview' => $pendingReview,
            'usersByRole' => $usersByRole,
            'recentUsers' => $recentUsers,
        ]);
    }

    /**
     * Display all users for management
     */
    public function users(): View
    {
        $users = User::paginate(20);

        return view('admin.users', [
            'users' => $users,
        ]);
    }

    /**
     * Update user role
     */
    public function updateRole(User $user, string $role): RedirectResponse
    {
        // Prevent changing own admin status
        if ($user->id === auth()->id() && $role !== 'admin') {
            return back()->with('error', 'Cannot change your own admin role.');
        }

        // Validate role
        $validRoles = ['user', 'maker', 'moderator', 'admin'];
        if (!in_array($role, $validRoles)) {
            return back()->with('error', 'Invalid role.');
        }

        $user->update(['role' => $role]);

        return back()->with('success', "User role updated to '{$role}'.");
    }

    /**
     * Edit user details
     */
    public function editUser(User $user): View
    {
        return view('admin.edit-user', [
            'user' => $user,
        ]);
    }

    /**
     * Update user details
     */
    public function updateUser(User $user): RedirectResponse
    {
        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'krediet' => 'required|numeric|min:0',
            'is_verified' => 'required|boolean',
            'is_blocked' => 'required|boolean',
        ]);

        $user->update($validated);

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    /**
     * Delete user account
     */
    public function deleteUser(User $user): RedirectResponse
    {
        // Prevent deleting admin accounts
        if ($user->role === 'admin') {
            return back()->with('error', 'Cannot delete admin accounts.');
        }

        // Prevent deleting own account
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Cannot delete your own account.');
        }

        $userName = $user->name;
        $user->delete();

        return back()->with('success', "User '{$userName}' has been deleted.");
    }
}
