<x-app-layout>
    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Edit User</h1>
                <p class="text-gray-600 mt-2">{{ $user->name }} ({{ $user->email }})</p>
            </div>

            <!-- Messages -->
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Edit Form -->
            <form method="POST" action="{{ route('admin.update-user', $user) }}" class="bg-white rounded-lg shadow p-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Krediet -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Krediet (EUR)</label>
                        <input type="number" name="krediet" value="{{ $user->krediet }}" step="0.01" min="0" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('krediet')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Verification Status -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <input type="checkbox" id="is_verified" name="is_verified" value="1" {{ $user->is_verified ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded focus:ring-2 focus:ring-blue-500">
                            <label for="is_verified" class="ml-2 block text-sm font-medium text-gray-700">
                                Verified
                            </label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="is_blocked" name="is_blocked" value="1" {{ $user->is_blocked ? 'checked' : '' }} class="w-4 h-4 text-red-600 rounded focus:ring-2 focus:ring-red-500">
                            <label for="is_blocked" class="ml-2 block text-sm font-medium text-gray-700">
                                Blocked
                            </label>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center space-x-4 pt-6 border-t">
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-medium">
                            Save Changes
                        </button>
                        <a href="{{ route('admin.users') }}" class="px-6 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 font-medium">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>

            <!-- User Info -->
            <div class="mt-8 bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">User Information</h3>
                <dl class="grid grid-cols-2 gap-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-700">Role</dt>
                        <dd class="text-sm text-gray-600 mt-1">{{ ucfirst($user->role) }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-700">Member Since</dt>
                        <dd class="text-sm text-gray-600 mt-1">{{ $user->created_at->format('d/m/Y H:i') }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-700">Last Updated</dt>
                        <dd class="text-sm text-gray-600 mt-1">{{ $user->updated_at->format('d/m/Y H:i') }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-700">Biography</dt>
                        <dd class="text-sm text-gray-600 mt-1">{{ $user->biografie ?? 'N/A' }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
