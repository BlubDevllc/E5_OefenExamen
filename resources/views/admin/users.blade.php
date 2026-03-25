<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">User Management</h1>
                    <p class="text-gray-600 mt-2">Manage all system users</p>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                    Back
                </a>
            </div>

            <!-- Messages -->
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

            <!-- Users Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Krediet</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @forelse ($users as $user)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $user->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <form method="POST" action="{{ route('admin.update-role', [$user, $user->role]) }}" class="inline-block">
                                            @csrf
                                            <select name="role" onchange="this.form.submit()" class="px-3 py-1 border border-gray-300 rounded-md text-sm">
                                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                                <option value="maker" {{ $user->role === 'maker' ? 'selected' : '' }}>Maker</option>
                                                <option value="moderator" {{ $user->role === 'moderator' ? 'selected' : '' }}>Moderator</option>
                                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">EUR {{ number_format($user->krediet, 2, ',', '.') }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <div class="flex items-center space-x-2">
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
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm space-x-2">
                                        <a href="{{ route('admin.edit-user', $user) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                                            Edit
                                        </a>
                                        @if ($user->id !== auth()->id() && $user->role !== 'admin')
                                            <form method="POST" action="{{ route('admin.delete-user', $user) }}" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium" onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                        No users found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
