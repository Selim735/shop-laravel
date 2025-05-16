<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Category: {{ $category->name }}</h1>
                        <div class="flex space-x-2">
                            <a href="{{ route('categories.edit', $category) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                                Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded" onclick="return confirm('Are you sure you want to delete this category?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 p-4 rounded-lg mb-6">
                        <h2 class="text-lg font-semibold mb-2">Category Information</h2>
                        <p><strong>ID:</strong> {{ $category->id }}</p>
                        <p><strong>Name:</strong> {{ $category->name }}</p>
                        <p><strong>Description:</strong> {{ $category->description }}</p>
                        <p><strong>Created:</strong> {{ $category->created_at->format('F j, Y, g:i a') }}</p>
                        <p><strong>Last Updated:</strong> {{ $category->updated_at->format('F j, Y, g:i a') }}</p>
                    </div>
                    
                    <div>
                        <h2 class="text-lg font-semibold mb-4">Products in this Category</h2>
                        
                        @if($category->products->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border">
                                    <thead>
                                        <tr>
                                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Price</th>
                                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category->products as $product)
                                            <tr>
                                                <td class="py-2 px-4 border-b border-gray-200">{{ $product->id }}</td>
                                                <td class="py-2 px-4 border-b border-gray-200">{{ $product->name }}</td>
                                                <td class="py-2 px-4 border-b border-gray-200">${{ number_format($product->price, 2) }}</td>
                                                <td class="py-2 px-4 border-b border-gray-200">
                                                    <a href="{{ route('products.show', $product) }}" class="text-blue-500 hover:text-blue-700">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-gray-500">No products in this category yet.</p>
                        @endif
                    </div>
                    
                    <div class="mt-6">
                        <a href="{{ route('categories.index') }}" class="text-blue-500 hover:text-blue-700">
                            &larr; Back to Categories
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
