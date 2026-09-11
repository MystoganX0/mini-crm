<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Company
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-md">
                            <ul class="list-disc list-inside">
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
                    >
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Company Name *
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', $company->name) }}"
                                class="mt-1 block w-full rounded-md border-gray-300"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', $company->email) }}"
                                class="mt-1 block w-full rounded-md border-gray-300"
                            >
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Website
                            </label>

                            <input
                                type="url"
                                name="website"
                                value="{{ old('website', $company->website) }}"
                                class="mt-1 block w-full rounded-md border-gray-300"
                            >
                        </div>

                        @if ($company->logo)
                            <div class="mb-4">
                                <p class="text-sm font-medium text-gray-700 mb-2">
                                    Current Logo
                                </p>

                                <img
                                    src="{{ asset('storage/' . $company->logo) }}"
                                    alt="{{ $company->name }}"
                                    class="w-24 h-24 object-cover rounded"
                                >
                            </div>
                        @endif

                        <div class="mb-6">
                            <label class="block font-medium text-sm text-gray-700">
                                Replace Logo
                            </label>

                            <input
                                type="file"
                                name="logo"
                                accept="image/jpeg,image/png,image/webp"
                                class="mt-1 block w-full"
                            >

                            <p class="mt-1 text-sm text-gray-500">
                                Minimum dimensions: 100 × 100 pixels.
                            </p>
                        </div>

                        <div class="flex gap-3">
                            <button
                                type="submit"
                                class="px-4 py-2 bg-gray-800 text-white rounded-md"
                            >
                                Update Company
                            </button>

                            <a
                                href="{{ route('companies.index') }}"
                                class="px-4 py-2 bg-gray-200 rounded-md"
                            >
                                Cancel
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>