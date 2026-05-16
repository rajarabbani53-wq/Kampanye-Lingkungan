<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gray-50">
        <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white shadow-xs border border-gray-100 rounded-2xl">
            
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-black text-gray-900 tracking-tight">Gabung GreenAction</h2>
                <p class="text-sm text-gray-500 mt-1">Daftarkan akunmu dan mulai aksi nyata untuk bumi hari ini.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Nama Lengkap</label>
                    <input id="name" 
                           class="block w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-green-500 focus:ring-2 focus:ring-green-500/20 transition duration-200 outline-hidden text-gray-800 font-medium placeholder-gray-400" 
                           type="text" 
                           name="name" 
                           value="{{ old('name') }}" 
                           placeholder="Masukkan nama lengkapmu"
                           required 
                           autofocus 
                           autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1.5 text-xs text-red-500 font-medium" />
                </div>

                <div>
                    <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Alamat Email</label>
                    <input id="email" 
                           class="block w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-green-500 focus:ring-2 focus:ring-green-500/20 transition duration-200 outline-hidden text-gray-800 font-medium placeholder-gray-400" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           placeholder="nama@email.com"
                           required 
                           autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-red-500 font-medium" />
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Kata Sandi</label>
                    <input id="password" 
                           class="block w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-green-500 focus:ring-2 focus:ring-green-500/20 transition duration-200 outline-hidden text-gray-800 font-medium placeholder-gray-400" 
                           type="password"
                           name="password"
                           placeholder="Minimal 8 karakter"
                           required 
                           autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs text-red-500 font-medium" />
                </div>

                <div>
                    <label for="password_confirmation" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Ulangi Kata Sandi</label>
                    <input id="password_confirmation" 
                           class="block w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:bg-white focus:border-green-500 focus:ring-2 focus:ring-green-500/20 transition duration-200 outline-hidden text-gray-800 font-medium placeholder-gray-400" 
                           type="password"
                           name="password_confirmation" 
                           placeholder="Masukkan ulang kata sandi"
                           required 
                           autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5 text-xs text-red-500 font-medium" />
                </div>

                <div class="pt-2 space-y-4">
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-xl shadow-xs hover:shadow-md transition duration-200 text-sm tracking-wide">
                        Daftar Sebagai Relawan
                    </button>

                    <div class="text-center">
                        <p class="text-sm text-gray-500">
                            Sudah punya akun? 
                            <a class="font-bold text-green-600 hover:text-green-700 transition" href="{{ route('login') }}">
                                Masuk di sini
                            </a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>