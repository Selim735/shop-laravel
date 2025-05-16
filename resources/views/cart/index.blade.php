<x-app-layout>
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">Votre Panier</h1>

            @if(count($cartItems) > 0)
                <div class="mt-12">
                    <div class="flow-root">
                        <ul role="list" class="-my-6 divide-y divide-gray-200">
                            @foreach($cartItems as $id => $item)
                                <li class="py-6 flex">
                                    <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                                        <img src="https://via.placeholder.com/300x300?text={{ urlencode($item['product']->name) }}" alt="{{ $item['product']->name }}" class="w-full h-full object-center object-cover">
                                    </div>

                                    <div class="ml-4 flex-1 flex flex-col">
                                        <div>
                                            <div class="flex justify-between text-base font-medium text-gray-900">
                                                <h3>
                                                    <a href="{{ route('products.details', $item['product']) }}">{{ $item['product']->name }}</a>
                                                </h3>
                                                <p class="ml-4">${{ number_format($item['product']->price * $item['quantity'], 2) }}</p>
                                            </div>
                                            <p class="mt-1 text-sm text-gray-500">{{ $item['product']->category->name }}</p>
                                        </div>
                                        <div class="flex-1 flex items-end justify-between text-sm">
                                            <div class="flex items-center">
                                                <p class="text-gray-500 mr-3">Quantité</p>
                                                <form action="{{ route('cart.update') }}" method="POST" class="flex items-center">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $id }}">
                                                    <select name="quantity" class="rounded-md border-gray-300 py-1.5 text-base leading-5 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" onchange="this.form.submit()">
                                                        @for($i = 1; $i <= 10; $i++)
                                                            <option value="{{ $i }}" {{ $item['quantity'] == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </form>
                                            </div>

                                            <div class="flex">
                                                <form action="{{ route('cart.remove') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $id }}">
                                                    <button type="submit" class="font-medium text-red-600 hover:text-red-500">Supprimer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                    <div class="flex justify-between text-base font-medium text-gray-900">
                        <p>Sous-total</p>
                        <p>${{ number_format($total, 2) }}</p>
                    </div>
                    <p class="mt-0.5 text-sm text-gray-500">Frais de livraison et taxes calculés à la caisse.</p>
                    <div class="mt-6">
                        <a href="#" class="flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700">
                            Passer à la caisse
                        </a>
                    </div>
                    <div class="mt-6 flex justify-center text-sm text-center text-gray-500">
                        <p>
                            ou <a href="{{ route('home') }}" class="text-blue-600 font-medium hover:text-blue-500">Continuer vos achats<span aria-hidden="true"> &rarr;</span></a>
                        </p>
                    </div>
                </div>
            @else
                <div class="mt-12 text-center py-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Votre panier est vide</h3>
                    <p class="mt-1 text-sm text-gray-500">Commencez à ajouter des produits à votre panier.</p>
                    <div class="mt-6">
                        <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Voir les produits
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
