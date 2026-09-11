<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Companies
            </h2>

            <a
                href="{{ route('companies.create') }}"
                class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700"
            >
                Add Company
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left">
                                        Logo
                                    </th>
                                    <th class="px-6 py-3 text-left">
                                        Name
                                    </th>
                                    <th class="px-6 py-3 text-left">
                                        Email
                                    </th>
                                    <th class="px-6 py-3 text-left">
                                        Website
                                    </th>
                                    <th class="px-6 py-3 text-left">
                                        Actions
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @forelse ($companies as $company)
                                    <tr>
                                        <td class="px-6 py-4">
                                            @if ($company->logo)
                                                <img
                                                    src="{{ asset('storage/' . $company->logo) }}"
                                                    alt="{{ $company->name }}"
                                                    class="w-12 h-12 object-cover rounded"
                                                >
                                            @else
                                                <span class="text-gray-400">
                                                    No logo
                                                </span>
                                            @endif
                                        </td>

                                        <td class="px-6 py-4">
                                            {{ $company->name }}
                                        </td>

                                        <td class="px-6 py-4">
                                            {{ $company->email ?? '-' }}
                                        </td>

                                        <td class="px-6 py-4">
                                            @if ($company->website)
                                                <a
                                                    href="{{ $company->website }}"
                                                    target="_blank"
                                                    class="text-blue-600 hover:underline"
                                                >
                                                    {{ $company->website }}
                                                </a>
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="flex gap-2">
                                                <a
                                                    href="{{ route('companies.edit', $company) }}"
                                                    class="text-blue-600 hover:underline"
                                                >
                                                    Edit
                                                </a>

                                                <form
                                                    action="{{ route('companies.destroy', $company) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Delete this company?')"
                                                >
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="text-red-600 hover:underline"
                                                    >
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td
                                            colspan="5"
                                            class="px-6 py-8 text-center text-gray-500"
                                        >
                                            No companies found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $companies->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>