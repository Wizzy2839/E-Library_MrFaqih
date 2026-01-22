<x-guest-layout>
    <div class="w-full max-w-[450px] bg-white/80 backdrop-blur-xl border border-white/20 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] p-8 md:p-10 relative overflow-hidden my-10">
        
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="text-center mb-8 relative z-10">
            <h2 class="text-2xl font-bold tracking-tight text-slate-900">Create Account</h2>
            <p class="text-sm text-slate-500 mt-2">Join the Lib_OS Ecosystem</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5 relative z-10">
            @csrf

            <div class="space-y-1.5">
                <label for="nama_lengkap" class="block text-xs font-semibold text-slate-600 uppercase tracking-wide">Full Name</label>
                <input id="nama_lengkap" class="block w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-900 placeholder-slate-400 focus:border-black focus:bg-white focus:ring-black transition-all" 
                       type="text" name="nama_lengkap" :value="old('nama_lengkap')" required autofocus autocomplete="name" placeholder="John Doe" />
                <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
            </div>

            <div class="space-y-1.5">
                <label for="username" class="block text-xs font-semibold text-slate-600 uppercase tracking-wide">Username</label>
                <input id="username" class="block w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-900 placeholder-slate-400 focus:border-black focus:bg-white focus:ring-black transition-all" 
                       type="text" name="username" :value="old('username')" required autocomplete="username" placeholder="johndoe123" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <div class="space-y-1.5">
                <label for="email" class="block text-xs font-semibold text-slate-600 uppercase tracking-wide">Email Address</label>
                <input id="email" class="block w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-900 placeholder-slate-400 focus:border-black focus:bg-white focus:ring-black transition-all" 
                       type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@example.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="space-y-1.5">
                <label for="password" class="block text-xs font-semibold text-slate-600 uppercase tracking-wide">Password</label>
                <input id="password" class="block w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-900 placeholder-slate-400 focus:border-black focus:bg-white focus:ring-black transition-all"
                       type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="space-y-1.5">
                <label for="password_confirmation" class="block text-xs font-semibold text-slate-600 uppercase tracking-wide">Confirm Password</label>
                <input id="password_confirmation" class="block w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-900 placeholder-slate-400 focus:border-black focus:bg-white focus:ring-black transition-all"
                       type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full inline-flex justify-center items-center rounded-xl bg-slate-900 py-3.5 px-4 text-sm font-bold text-white shadow-lg shadow-slate-900/20 hover:bg-black hover:shadow-slate-900/30 hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2 transition-all duration-200">
                    Register Account
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>
        </form>

        <div class="mt-8 text-center text-sm text-slate-500 relative z-10">
            Already have an account? 
            <a href="{{ route('login') }}" class="font-bold text-slate-900 hover:underline">Log in</a>
        </div>
    </div>
</x-guest-layout>