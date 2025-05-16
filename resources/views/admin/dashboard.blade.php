<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-blue-50 p-6 rounded-lg shadow">
                            <h3 class="text-lg font-bold text-blue-700">Products</h3>
                            <p class="text-3xl font-bold">{{ $productsCount }}</p>
                            <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline mt-2 inline-block">
                                Manage Products →
                            </a>
                        </div>
                        
                        <div class="bg-green-50 p-6 rounded-lg shadow">
                            <h3 class="text-lg font-bold text-green-700">Categories</h3>
                            <p class="text-3xl font-bold">{{ $categoriesCount }}</p>
                            <a href="{{ route('categories.index') }}" class="text-green-600 hover:underline mt-2 inline-block">
                                Manage Categories →
                            </a>
                        </div>
                        
                        <div class="bg-purple-50 p-6 rounded-lg shadow">
                            <h3 class="text-lg font-bold text-purple-700">Users</h3>
                            <p class="text-3xl font-bold">{{ App\Models\User::count() }}</p>
                            <a href="{{ route('users.index') }}" class="text-purple-600 hover:underline mt-2 inline-block">
                                Manage Users →
                            </a>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white border rounded-lg overflow-hidden shadow-md p-6">
                            <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
                            <div class="space-y-2">
                                <a href="{{ route('products.create') }}" class="block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-center">
                                    Add New Product
                                </a>
                                <a href="{{ route('categories.create') }}" class="block bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded text-center">
                                    Add New Category
                                </a>
                                <a href="{{ route('users.create') }}" class="block bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded text-center">
                                    Add New User
                                </a>
                            </div>
                        </div>
                        
                        <div class="bg-white border rounded-lg overflow-hidden shadow-md p-6">
                            <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
                            <p class="text-gray-500">No recent activity to display.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
