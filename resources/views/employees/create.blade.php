<x-app-layout>
    <div class="max-w-3xl mx-auto space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <a href="{{ route('employees.index') }}" class="inline-flex items-center gap-1 text-xs font-semibold text-gray-500 hover:text-gray-800 mb-1 transition">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                    <span>Back to Employees</span>
                </a>
                <h1 class="font-serif text-3xl font-normal text-gray-900 tracking-tight">
                    Add New Employee
                </h1>
            </div>
        </div>

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
                action="{{ route('employees.store') }}"
                method="POST"
                class="space-y-6"
            >
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="first_name" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            First Name <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="first_name"
                            id="first_name"
                            value="{{ old('first_name') }}"
                            required
                            placeholder="e.g. Khairul"
                            pattern="^[A-Za-z\s'\-]+$"
                            title="First name must not contain numbers or special characters."
                            class="w-full text-sm rounded-xl border-gray-300 focus:border-[#1B4D3E] focus:ring focus:ring-[#1B4D3E]/20 transition shadow-2xs"
                        >
                    </div>

                    <div>
                        <label for="last_name" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Last Name <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="last_name"
                            id="last_name"
                            value="{{ old('last_name') }}"
                            required
                            placeholder="e.g. Hakimi"
                            pattern="^[A-Za-z\s'\-]+$"
                            title="Last name must not contain numbers or special characters."
                            class="w-full text-sm rounded-xl border-gray-300 focus:border-[#1B4D3E] focus:ring focus:ring-[#1B4D3E]/20 transition shadow-2xs"
                        >
                    </div>
                </div>

                <div>
                    <label for="company_id" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                        Company <span class="text-red-500">*</span>
                    </label>
                    <select
                        name="company_id"
                        id="company_id"
                        required
                        class="w-full text-sm rounded-xl border-gray-300 focus:border-[#1B4D3E] focus:ring focus:ring-[#1B4D3E]/20 transition shadow-2xs"
                    >
                        <option value="">-- Select Company --</option>
                        @foreach ($companies as $company)
                            <option
                                value="{{ $company->id }}"
                                {{ old('company_id', request('company_id')) == $company->id ? 'selected' : '' }}
                            >
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Email Address
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email') }}"
                            placeholder="example@company.com"
                            pattern="[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,6}"
                            title="Please enter a valid email address with a valid domain (e.g. name@company.com)"
                            class="w-full text-sm rounded-xl border-gray-300 focus:border-[#1B4D3E] focus:ring focus:ring-[#1B4D3E]/20 transition shadow-2xs"
                        >
                    </div>

                    <div>
                        <label for="phone" class="block text-xs font-semibold uppercase tracking-wider text-gray-700 mb-1.5">
                            Phone Number
                        </label>
                        <input
                            type="tel"
                            name="phone"
                            id="phone"
                            value="{{ old('phone') }}"
                            placeholder="e.g. 0187858049"
                            pattern="^(\+?60|0)[0-9]{8,11}$"
                            title="Please enter a valid phone number (e.g. 0187858049)"
                            class="w-full text-sm rounded-xl border-gray-300 focus:border-[#1B4D3E] focus:ring focus:ring-[#1B4D3E]/20 transition shadow-2xs"
                        >
                    </div>
                </div>

                <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
                    <a
                        href="{{ route('employees.index') }}"
                        class="px-4 py-2.5 text-xs font-semibold text-gray-700 bg-white border border-gray-200/80 rounded-xl hover:bg-gray-50 transition"
                    >
                        Cancel
                    </a>
                    <button
                        type="submit"
                        class="px-5 py-2.5 text-xs font-semibold text-white bg-gray-950 rounded-xl hover:bg-gray-800 transition shadow-sm"
                    >
                        Save Employee
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
