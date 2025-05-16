<x-app-layout>
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8">
                <!-- Product image -->
                <div class="lg:max-w-lg lg:self-end">
                    <div class="rounded-lg overflow-hidden">
                        <img src="https://via.placeholder.com/600x400?text={{ urlencode($product->name) }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover">
                    </div>
                </div>

                <!-- Product details -->
                <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                    <div class="flex flex-col">
                        <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ $product->name }}</h1>
                        <h2 class="sr-only">Product information</h2>
                        <p class="mt-1 text-sm text-gray-500">Catégorie: {{ $product->category->name }}</p>
                        <p class="mt-3 text-3xl text-gray-900">${{ number_format($product->price, 2) }}</p>

                        <div class="mt-6">
                            <h3 class="sr-only">Description</h3>
                            <div class="text-base text-gray-700 space-y-6">
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>

                        <div class="mt-10">
                            <form action="{{ route('cart.add') }}" method="POST" class="flex flex-col space-y-4">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                
                                <div>
                                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantité</label>
                                    <select id="quantity" name="quantity" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                
                                <button type="submit" class="w-full bg-blue-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Ajouter au panier
                                </button>
                            </form>
                        </div>

                        <div class="mt-8 border-t border-gray-200 pt-8">
                            <h2 class="text-sm font-medium text-gray-900">Détails</h2>
                            <div class="mt-4 prose prose-sm text-gray-500">
                                <ul role="list">
                                    <li>ID: {{ $product->id }}</li>
                                    <li>Catégorie: {{ $product->category->name }}</li>
                                    <li>Ajouté le: {{ $product->created_at->format('d/m/Y') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related products -->
            @if($relatedProducts->count() > 0)
                <div class="mt-16 sm:mt-24">
                    <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Produits similaires</h2>
                    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach($relatedProducts as $relatedProduct)
                            <div class="group relative">
                                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                                    <img src="https://via.placeholder.com/300x300?text={{ urlencode($relatedProduct->name) }}" alt="{{ $relatedProduct->name }}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <h3 class="text-sm text-gray-700">
                                            <a href="{{ route('products.details', $relatedProduct) }}" class="font-medium text-gray-900 hover:text-blue-600">
                                                {{ $relatedProduct->name }}
                                            </a>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ $relatedProduct->category->name }}</p>
                                    </div>
                                    <p class="text-sm font-medium text-gray-900">${{ number_format($relatedProduct->price, 2) }}</p>
                                </div>
                                <div class="mt-4">
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $relatedProduct->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md transition duration-150 ease-in-out">
                                            Ajouter au panier
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
