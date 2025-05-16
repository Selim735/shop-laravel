<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Product: {{ $product->name }}</h1>
                        <div class="flex space-x-2">
                            <a href="{{ route('products.edit', $product) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                                Edit
                            </a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded" onclick="return confirm('Are you sure you want to delete this product?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 p-4 rounded-lg mb-6">
                        <h2 class="text-lg font-semibold mb-2">Product Information</h2>
                        <p><strong>ID:</strong> {{ $product->id }}</p>
                        <p><strong>Name:</strong> {{ $product->name }}</p>
                        <p><strong>Description:</strong> {{ $product->description }}</p>
                        <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                        <p><strong>Category:</strong> <a href="{{ route('categories.show', $product->category) }}" class="text-blue-500 hover:text-blue-700">{{ $product->category->name }}</a></p>
                        <p><strong>Created:</strong> {{ $product->created_at->format('F j, Y, g:i a') }}</p>
                        <p><strong>Last Updated:</strong> {{ $product->updated_at->format('F j, Y, g:i a') }}</p>
                    </div>
                    
                    <div class="mt-6">
                        <a href="{{ route('products.index') }}" class="text-blue-500 hover:text-blue-700">
                            &larr; Back to Products
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
