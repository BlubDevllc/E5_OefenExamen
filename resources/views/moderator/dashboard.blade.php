<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Moderator Dashboard</h1>
                <p class="text-gray-600 mt-2">Manage user accounts and verify new registrations</p>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Users</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $totalUsers }}</p>
                        </div>
                        <div class="text-blue-500">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10h.01M11 10h.01M7 10h.01M6 20h12a2 2 0 002-2V8a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Pending Verification</p>
                            <p class="text-3xl font-bold text-yellow-600">{{ $pendingVerifications->total() }}</p>
                        </div>
                        <div class="text-yellow-500">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4v.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Verified Users</p>
                            <p class="text-3xl font-bold text-green-600">{{ $verifiedCount }}</p>
                        </div>
                        <div class="text-green-500">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Pending Verifications Section -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Pending Verifications</h2>
                @if ($pendingVerifications->count() > 0)
                    <div class="overflow-x-auto bg-white rounded-lg shadow">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Role</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Registered</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @foreach ($pendingVerifications as $user)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $user->name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                                        <td class="px-6 py-4 text-sm">
                                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            {{ $user->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="px-6 py-4 text-sm space-x-2">
                                            <form method="POST" action="{{ route('moderator.approve', $user) }}" class="inline-block">
                                                @csrf
                                                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 text-sm font-medium">
                                                    Approve
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('moderator.block', $user) }}" class="inline-block">
                                                @csrf
                                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 text-sm font-medium" onclick="return confirm('Are you sure?')">
                                                    Reject
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $pendingVerifications->links() }}
                @else
                    <div class="bg-white rounded-lg shadow p-8 text-center">
                        <p class="text-gray-500">No pending verifications</p>
                    </div>
                @endif
            </div>

            <!-- Blocked Users Section -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Blocked Users</h2>
                @if ($blockedUsers->count() > 0)
                    <div class="overflow-x-auto bg-white rounded-lg shadow">
                        <table class="w-full">
                            <thead class="bg-gray-50 border-b">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Role</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Blocked On</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @foreach ($blockedUsers as $user)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $user->name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                                        <td class="px-6 py-4 text-sm">
                                            <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            {{ $user->updated_at->format('d/m/Y H:i') }}
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            <form method="POST" action="{{ route('moderator.unblock', $user) }}" class="inline-block">
                                                @csrf
                                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-medium">
                                                    Unblock
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $blockedUsers->links() }}
                @else
                    <div class="bg-white rounded-lg shadow p-8 text-center">
                        <p class="text-gray-500">No blocked users</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
