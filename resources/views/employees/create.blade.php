<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Employee
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @if ($errors->any())
                        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                First Name
                            </label>

                            <input
                                type="text"
                                name="first_name"
                                value="{{ old('first_name') }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300"
                            >
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Last Name
                            </label>

                            <input
                                type="text"
                                name="last_name"
                                value="{{ old('last_name') }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300"
                            >
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Company
                            </label>

                            <select
                                name="company_id"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300"
                            >
                                <option value="">Select a company</option>

                                @foreach ($companies as $company)
                                    <option
                                        value="{{ $company->id }}"
                                        @selected(old('company_id') == $company->id)
                                    >
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="mt-1 block w-full rounded-md border-gray-300"
                            >
                        </div>

                        <div class="mb-6">
                            <label class="block font-medium text-sm text-gray-700">
                                Phone
                            </label>

                            <input
                                type="text"
                                name="phone"
                                value="{{ old('phone') }}"
                                class="mt-1 block w-full rounded-md border-gray-300"
                            >
                        </div>

                        <div class="flex items-center gap-3">
                            <button
                                type="submit"
                                class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700"
                            >
                                Save Employee
                            </button>

                            <a
                                href="{{ route('employees.index') }}"
                                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300"
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