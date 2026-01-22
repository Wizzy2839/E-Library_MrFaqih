<x-dynamic-component :component="auth()->user()->role === 'admin' ? 'admin-layout' : 'app-layout'">
    
    <div class="py-6 md:py-12 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <div class="flex flex-col gap-2 border-b border-slate-100 pb-6">
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 tracking-tight">
                    Account Settings
                </h2>
                <p class="text-slate-500 text-sm md:text-base">
                    Manage your profile information and security.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
                
                <div class="bg-white border border-slate-200 shadow-sm rounded-2xl p-6 md:p-8 relative overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="absolute top-0 right-0 w-24 h-24 md:w-32 md:h-32 bg-slate-50 rounded-bl-full -mr-6 -mt-6 md:-mr-10 md:-mt-10 z-0 transition-all"></div>
                    
                    <div class="relative z-10">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="bg-white border border-slate-200 shadow-sm rounded-2xl p-6 md:p-8 relative overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="absolute top-0 right-0 w-24 h-24 md:w-32 md:h-32 bg-slate-50 rounded-bl-full -mr-6 -mt-6 md:-mr-10 md:-mt-10 z-0 transition-all"></div>
                    
                    <div class="relative z-10">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

            </div>

            <div class="bg-white border border-red-100 shadow-sm rounded-2xl p-6 md:p-8 hover:shadow-md transition-shadow duration-300">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-dynamic-component>