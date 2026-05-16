<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="w-full sm:max-w-md mx-auto my-12 p-8 bg-white rounded-2xl shadow-md border border-gray-100">
        
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-bold text-gray-800">Selamat Datang</h2>
            <p class="text-sm text-gray-500 mt-1">Masuk untuk melanjutkan aksi lingkunganmu</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" class="font-semibold text-gray-700" />
                <x-text-input id="email" class="block mt-1 w-full p-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="font-semibold text-gray-700" />
                <x-text-input id="password" class="block mt-1 w-full p-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-green-600 rounded-md focus:outline-none" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-200 shadow-sm">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>