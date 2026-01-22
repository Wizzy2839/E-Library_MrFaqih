<x-guest-layout>
    <div class="w-full max-w-[400px] bg-white/80 backdrop-blur-xl border border-white/20 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] p-8 md:p-10 relative overflow-hidden">
        
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="text-center mb-8 relative z-10">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-slate-900 text-white mb-4 shadow-lg shadow-slate-900/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900">Welcome back</h2>
            <p class="text-sm text-slate-500 mt-2">Masuk ke dashboard perpustakaan</p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5 relative z-10">
            @csrf

            <div class="space-y-1.5">
                <label for="email" class="block text-xs font-semibold text-slate-600 uppercase tracking-wide">Email</label>
                <input id="email" class="block w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-900 placeholder-slate-400 focus:border-black focus:bg-white focus:ring-black transition-all" 
                       type="email" name="email" :value="old('email')" required autofocus placeholder="nama@email.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="space-y-1.5">
                <div class="flex justify-between items-center">
                    <label for="password" class="block text-xs font-semibold text-slate-600 uppercase tracking-wide">Password</label>
                    @if (Route::has('password.request'))
                        <a class="text-xs font-medium text-slate-500 hover:text-black transition-colors" href="{{ route('password.request') }}">
                            Lupa password?
                        </a>
                    @endif
                </div>
                <input id="password" class="block w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-900 placeholder-slate-400 focus:border-black focus:bg-white focus:ring-black transition-all"
                       type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center">
                <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black" name="remember">
                <label for="remember_me" class="ml-2 block text-sm text-slate-600 cursor-pointer select-none">Ingat perangkat ini</label>
            </div>

            <button type="submit" class="w-full inline-flex justify-center items-center rounded-xl bg-slate-900 py-3.5 px-4 text-sm font-bold text-white shadow-lg shadow-slate-900/20 hover:bg-black hover:shadow-slate-900/30 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2 transition-all duration-200">
                Sign In
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-slate-500 relative z-10">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="font-bold text-slate-900 hover:underline">Daftar disini</a>
        </div>
    </div>
</x-guest-layout>