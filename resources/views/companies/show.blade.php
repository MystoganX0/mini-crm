<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Company Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @if ($company->logo)
                        <img
                            src="{{ asset('storage/' . $company->logo) }}"
                            alt="{{ $company->name }}"
                            class="w-24 h-24 object-cover rounded mb-6"
                        >
                    @endif

                    <h3 class="text-2xl font-bold mb-4">
                        {{ $company->name }}
                    </h3>

                    <p class="mb-2">
                        <strong>Email:</strong>
                        {{ $company->email ?? '-' }}
                    </p>

                    <p class="mb-6">
                        <strong>Website:</strong>
                        {{ $company->website ?? '-' }}
                    </p>

                    <a
                        href="{{ route('companies.index') }}"
                        class="px-4 py-2 bg-gray-200 rounded-md"
                    >
                        Back
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>