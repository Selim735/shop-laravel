<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">User: {{ $user->name }}</h1>
                        <div class="flex space-x-2">
                            <a href="{{ route('users.edit', $user) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                                Edit
                            </a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded" onclick="return confirm('Are you sure you want to delete this user?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 p-4 rounded-lg mb-6">
                        <h2 class="text-lg font-semibold mb-2">User Information</h2>
                        <p><strong>ID:</strong> {{ $user->id }}</p>
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Role:</strong> 
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </p>
                        <p><strong>Created:</strong> {{ $user->created_at->format('F j, Y, g:i a') }}</p>
                        <p><strong>Last Updated:</strong> {{ $user->updated_at->format('F j, Y, g:i a') }}</p>
                    </div>
                    
                    <div class="mt-6">
                        <a href="{{ route('users.index') }}" class="text-blue-500 hover:text-blue-700">
                            &larr; Back to Users
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
