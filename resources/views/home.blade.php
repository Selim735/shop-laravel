<x-app-layout>
    <div class="relative bg-blue-600 overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-blue-600 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <div class="pt-10 mx-auto max-w-7xl px-4 sm:pt-12 sm:px-6 md:pt-16 lg:pt-20 lg:px-8 xl:pt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                            <span class="block">Découvrez nos</span>
                            <span class="block text-yellow-400">produits de qualité</span>
                        </h1>
                        <p class="mt-3 text-base text-white sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Bienvenue dans notre boutique en ligne. Nous proposons une large gamme de produits de qualité à des prix compétitifs.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="#products" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-white hover:bg-gray-100 md:py-4 md:text-lg md:px-10">
                                    Voir les produits
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="{{ route('cart.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-800 hover:bg-blue-700 md:py-4 md:text-lg md:px-10">
                                    Voir le panier
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80" alt="Shopping">
        </div>
    </div>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl" id="categories">
                    Nos Catégories
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Explorez notre sélection de produits par catégorie
                </p>
            </div>
            
            <div class="mt-10">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($categories as $category)
                        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900">{{ $category->name }}</h3>
                                <p class="mt-2 text-gray-600">{{ $category->description }}</p>
                                <div class="mt-4">
                                    <span class="text-sm font-medium text-blue-600">{{ $category->products->count() }} produits</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl" id="products">
                    Nos Produits
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Découvrez notre sélection de produits de qualité
                </p>
            </div>
            
            <div class="mt-10">
                <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    @foreach ($products as $product)
                        <div class="group relative">
                            <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                                <img src="https://via.placeholder.com/300x300?text={{ urlencode($product->name) }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-sm text-gray-700">
                                        <a href="{{ route('products.details', $product) }}" class="font-medium text-gray-900 hover:text-blue-600">
                                            {{ $product->name }}
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500">{{ $product->category->name }}</p>
                                </div>
                                <p class="text-sm font-medium text-gray-900">${{ number_format($product->price, 2) }}</p>
                            </div>
                            <div class="mt-4">
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
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
        </div>
    </div>

    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Pourquoi nous choisir ?
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Nous nous engageons à vous offrir la meilleure expérience d'achat
                </p>
            </div>
            
            <div class="mt-10">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <h3 class="mt-2 text-lg font-medium text-gray-900">Qualité garantie</h3>
                            <p class="mt-3 text-base text-gray-500">
                                Tous nos produits sont soigneusement sélectionnés pour leur qualité exceptionnelle.
                            </p>
                        </div>
                    </div>
                    
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="mt-2 text-lg font-medium text-gray-900">Livraison rapide</h3>
                            <p class="mt-3 text-base text-gray-500">
                                Nous expédions vos commandes dans les plus brefs délais pour une satisfaction maximale.
                            </p>
                        </div>
                    </div>
                    
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            <h3 class="mt-2 text-lg font-medium text-gray-900">Paiement sécurisé</h3>
                            <p class="mt-3 text-base text-gray-500">
                                Vos transactions sont protégées par les systèmes de sécurité les plus avancés.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
