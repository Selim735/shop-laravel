<x-app-layout>
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6 text-center">Connexion</h2>
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-4">
                            <label for="remember" class="inline-flex items-center">
                                <input id="remember" type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:text-blue-800">
                                Besoin d'un compte?
                            </a>

                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                Se connecter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
