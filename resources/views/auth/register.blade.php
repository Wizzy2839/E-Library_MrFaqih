<x-guest-layout>
    <div class="space-y-6">
        
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold tracking-tighter text-slate-900">
                Create Account.
            </h2>
            <p class="text-xs text-slate-500 font-mono uppercase tracking-widest mt-1">
                Join the Lib_OS Ecosystem
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <label for="nama_lengkap" class="block text-sm font-bold text-slate-700 mb-1">Full Name</label>
                <input id="nama_lengkap" class="block w-full rounded-lg border-gray-300 bg-white shadow-sm focus:border-black focus:ring-black sm:text-sm py-2.5 transition-colors placeholder-gray-400" 
                       type="text" name="nama_lengkap" :value="old('nama_lengkap')" required autofocus autocomplete="name" placeholder="John Doe" />
                <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
            </div>

            <div>
                <label for="username" class="block text-sm font-bold text-slate-700 mb-1">Username</label>
                <input id="username" class="block w-full rounded-lg border-gray-300 bg-white shadow-sm focus:border-black focus:ring-black sm:text-sm py-2.5 transition-colors placeholder-gray-400" 
                       type="text" name="username" :value="old('username')" required autocomplete="username" placeholder="johndoe123" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <div>
                <label for="email" class="block text-sm font-bold text-slate-700 mb-1">Email Address</label>
                <input id="email" class="block w-full rounded-lg border-gray-300 bg-white shadow-sm focus:border-black focus:ring-black sm:text-sm py-2.5 transition-colors placeholder-gray-400" 
                       type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@example.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <label for="password" class="block text-sm font-bold text-slate-700 mb-1">Password</label>
                <input id="password" class="block w-full rounded-lg border-gray-300 bg-white shadow-sm focus:border-black focus:ring-black sm:text-sm py-2.5 transition-colors"
                                type="password"
                                name="password"
                                required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-bold text-slate-700 mb-1">Confirm Password</label>
                <input id="password_confirmation" class="block w-full rounded-lg border-gray-300 bg-white shadow-sm focus:border-black focus:ring-black sm:text-sm py-2.5 transition-colors"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black uppercase tracking-widest transition-all hover:shadow-lg hover:-translate-y-0.5">
                    {{ __('Register') }}
                </button>
            </div>

            <div class="text-center pt-2 border-t border-gray-100">
                <p class="text-xs text-slate-500">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="font-bold text-black hover:underline underline-offset-2 ml-1 transition-colors">
                        Log in
                    </a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>