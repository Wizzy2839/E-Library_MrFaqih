<section>
    <header>
        <h2 class="text-lg font-bold text-slate-900">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-1 text-sm text-slate-500">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="current_password" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Current Password</label>
            <input id="current_password" name="current_password" type="password" class="block w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-900 transition-all" 
                   autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">New Password</label>
            <input id="update_password_password" name="password" type="password" class="block w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-900 transition-all" 
                   autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Confirm New Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="block w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-900 transition-all" 
                   autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-900 text-white text-xs font-bold uppercase tracking-widest rounded-xl hover:bg-black transition-all shadow-lg shadow-slate-900/20 hover:-translate-y-0.5">
                Update Password
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600 font-bold flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                    Saved.
                </p>
            @endif
        </div>
    </form>
</section>