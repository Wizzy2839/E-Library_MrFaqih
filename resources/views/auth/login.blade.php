<x-guest-layout>
    <div class="space-y-6">
        
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold tracking-tighter text-slate-900">
                Welcome Back.
            </h2>
            <p class="text-xs text-slate-500 font-mono uppercase tracking-widest mt-1">
                Enter credentials to access system
            </p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-bold text-slate-700 mb-1">Email Address</label>
                <input id="email" class="block w-full rounded-lg border-gray-300 bg-white shadow-sm focus:border-black focus:ring-black sm:text-sm py-2.5 transition-colors placeholder-gray-400" 
                       type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@example.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <div class="flex justify-between items-center mb-1">
                    <label for="password" class="block text-sm font-bold text-slate-700">Password</label>
                    @if (Route::has('password.request'))
                        <a class="text-xs font-medium text-slate-500 hover:text-black underline underline-offset-2 transition-colors" href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>
                
                <input id="password" class="block w-full rounded-lg border-gray-300 bg-white shadow-sm focus:border-black focus:ring-black sm:text-sm py-2.5 transition-colors"
                                type="password"
                                name="password"
                                required autocomplete="current-password" placeholder="••••••••" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="pt-2">
                <div class="block mb-4">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-black shadow-sm focus:ring-black cursor-pointer" name="remember">
                        <span class="ms-2 text-sm text-slate-600 group-hover:text-black transition-colors">{{ __('Remember this device') }}</span>
                    </label>
                </div>

                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black uppercase tracking-widest transition-all hover:shadow-lg hover:-translate-y-0.5">
                    {{ __('Log in') }}
                </button>
            </div>

            @if (Route::has('register'))
                <div class="text-center pt-4 border-t border-gray-100">
                    <p class="text-xs text-slate-500">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="font-bold text-black hover:underline underline-offset-2 ml-1 transition-colors">
                            Create Account
                        </a>
                    </p>
                </div>
            @endif

        </form>
    </div>
</x-guest-layout>