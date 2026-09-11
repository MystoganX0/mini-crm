<x-app-layout>
    <div class="space-y-6 max-w-4xl mx-auto">
        <!-- Header -->
        <div>
            <p class="text-[11px] font-bold tracking-widest text-gray-400 uppercase mb-1">
                — Account Settings
            </p>
            <h1 class="font-serif text-3xl font-normal text-gray-900 tracking-tight">
                Profile & Security
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Manage your profile information, password security, and account preferences.
            </p>
        </div>

        <div class="space-y-6">
            <div class="p-6 sm:p-8 bg-white rounded-2xl border border-gray-200/70 shadow-2xs">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 sm:p-8 bg-white rounded-2xl border border-gray-200/70 shadow-2xs">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 sm:p-8 bg-white rounded-2xl border border-gray-200/70 shadow-2xs">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
