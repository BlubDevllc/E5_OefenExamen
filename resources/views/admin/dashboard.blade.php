<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Admin Dashboard</h1>
                <p class="text-gray-600 mt-2">System administration and user management</p>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
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
                            <p class="text-gray-500 text-sm font-medium">Verified</p>
                            <p class="text-3xl font-bold text-green-600">{{ $verifiedUsers }}</p>
                        </div>
                        <div class="text-green-500">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Pending</p>
                            <p class="text-3xl font-bold text-yellow-600">{{ $pendingReview }}</p>
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
                            <p class="text-gray-500 text-sm font-medium">Blocked</p>
                            <p class="text-3xl font-bold text-red-600">{{ $blockedUsers }}</p>
                        </div>
                        <div class="text-red-500">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4v.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Users by Role -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Users by Role</h3>
                    <div class="space-y-3">
                        @forelse ($usersByRole as $role => $count)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 rounded-full bg-blue-600 mr-3"></div>
                                    <span class="text-gray-700 font-medium">{{ ucfirst($role) }}</span>
                                </div>
                                <span class="text-gray-900 font-bold text-lg">{{ $count }}</span>
                            </div>
                        @empty
                            <p class="text-gray-500">No users</p>
                        @endforelse
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Quick Links</h3>
                    <div class="space-y-2">
                        <a href="{{ route('admin.users') }}" class="block w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-center font-medium">
                            Manage All Users
                        </a>
                        <a href="{{ route('moderator.dashboard') }}" class="block w-full px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 text-center font-medium">
                            Moderator Dashboard
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Users -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b">
                    <h3 class="text-lg font-bold text-gray-900">Recent Users</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Joined</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach ($recentUsers as $user)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $user->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        @if ($user->is_blocked)
                                            <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">
                                                Blocked
                                            </span>
                                        @elseif ($user->is_verified)
                                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                                                Verified
                                            </span>
                                        @else
                                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">
                                                Pending
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        {{ $user->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <a href="{{ route('admin.edit-user', $user) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
