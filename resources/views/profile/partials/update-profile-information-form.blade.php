<section>
    <header>
        <h2 class="text-lg font-bold text-slate-900">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-slate-500">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="nama_lengkap" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Full Name</label>
            <input id="nama_lengkap" name="nama_lengkap" type="text" class="block w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-900 transition-all" 
                   value="{{ old('nama_lengkap', $user->nama_lengkap) }}" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('nama_lengkap')" />
        </div>

        <div>
            <label for="username" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Username</label>
            <input id="username" name="username" type="text" class="block w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-900 transition-all" 
                   value="{{ old('username', $user->username) }}" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div>
            <label for="email" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Email Address</label>
            <input id="email" name="email" type="email" class="block w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-900 transition-all" 
                   value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 p-4 bg-amber-50 rounded-lg border border-amber-100">
                    <p class="text-sm text-amber-800">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="underline text-sm text-amber-900 hover:text-slate-900 font-bold ml-1">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-900 text-white text-xs font-bold uppercase tracking-widest rounded-xl hover:bg-black transition-all shadow-lg shadow-slate-900/20 hover:-translate-y-0.5">
                Save Changes
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600 font-bold flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                    Saved.
                </p>
            @endif
        </div>
    </form>
</section>