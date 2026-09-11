<x-app-layout>
    <div class="max-w-3xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <a href="{{ route('companies.index') }}" class="inline-flex items-center gap-1 text-xs font-semibold text-gray-500 hover:text-gray-800 mb-1 transition">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                    <span>Back to Companies</span>
                </a>
                <h1 class="font-serif text-3xl font-normal text-gray-900 tracking-tight">
                    Edit Company: {{ $company->name }}
                </h1>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl border border-gray-200/70 p-6 sm:p-8 shadow-2xs">
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 text-xs">
                    <p class="font-bold mb-1">Please check the form for errors:</p>
                    <ul class="list-disc list-inside space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('companies.update', $company) }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6"
            >
                @csrf
                @method('PUT')

                <!-- Company Name -->
                <div>
                    <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                        Company Name <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name', $company->name) }}"
                        required
                        class="w-full text-sm rounded-xl border-gray-300 focus:border-[#1B4D3E] focus:ring focus:ring-[#1B4D3E]/20 transition shadow-2xs"
                    >
                </div>

                <!-- Email & Website 2-col -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Official Email
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email', $company->email) }}"
                            placeholder="contact@company.com"
                            pattern="[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}"
                            title="Please enter a valid email address (e.g. contact@company.com)"
                            class="w-full text-sm rounded-xl border-gray-300 focus:border-[#1B4D3E] focus:ring focus:ring-[#1B4D3E]/20 transition shadow-2xs"
                        >
                    </div>

                    <div>
                        <label for="website" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Website URL
                        </label>
                        <input
                            type="url"
                            name="website"
                            id="website"
                            value="{{ old('website', $company->website) }}"
                            class="w-full text-sm rounded-xl border-gray-300 focus:border-[#1B4D3E] focus:ring focus:ring-[#1B4D3E]/20 transition shadow-2xs"
                        >
                    </div>
                </div>

                <!-- Existing Logo & Update Box -->
                <div x-data="{ logoPreview: '{{ $company->logo ? asset('storage/' . $company->logo) : '' }}' }">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                        Company Logo
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-2xl hover:border-gray-400 transition bg-[#F9FAF7]">
                        <div class="space-y-2 text-center">
                            <template x-if="logoPreview">
                                <div class="mb-3 flex flex-col items-center gap-1">
                                    <img :src="logoPreview" class="w-20 h-20 object-cover rounded-xl border shadow-sm">
                                    <span class="text-[11px] text-gray-400">Current Logo</span>
                                </div>
                            </template>
                            <template x-if="!logoPreview">
                                <div class="w-12 h-12 mx-auto rounded-full bg-gray-100 flex items-center justify-center text-gray-400">
                                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2"/>
                                        <circle cx="9" cy="9" r="2"/>
                                        <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>
                                    </svg>
                                </div>
                            </template>
                            <div class="flex text-xs text-gray-600 justify-center">
                                <label for="logo" class="relative cursor-pointer bg-white px-2.5 py-1 rounded-lg border border-gray-200 font-semibold text-[#1B4D3E] hover:bg-gray-50 transition">
                                    <span>Change Logo</span>
                                    <input 
                                        id="logo" 
                                        name="logo" 
                                        type="file" 
                                        accept="image/*" 
                                        class="sr-only"
                                        @change="const file = $event.target.files[0]; if (file) { const reader = new FileReader(); reader.onload = (e) => { logoPreview = e.target.result; }; reader.readAsDataURL(file); }"
                                    >
                                </label>
                                <p class="pl-2 pt-1 text-gray-500">or drag new file here</p>
                            </div>
                            <p class="text-[11px] text-gray-400">PNG, JPG, JPEG up to 2MB</p>
                        </div>
                    </div>
                </div>

                <!-- Form Footer Actions -->
                <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
                    <a
                        href="{{ route('companies.index') }}"
                        class="px-4 py-2.5 text-xs font-semibold text-gray-700 bg-white border border-gray-200/80 rounded-xl hover:bg-gray-50 transition"
                    >
                        Cancel
                    </a>
                    <button
                        type="submit"
                        class="px-5 py-2.5 text-xs font-semibold text-white bg-gray-950 rounded-xl hover:bg-gray-800 transition shadow-sm"
                    >
                        Update Company
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>