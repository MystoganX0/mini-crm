<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Employees
            </h2>

            <a
                href="{{ route('employees.create') }}"
                class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700"
            >
                Add Employee
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @if ($employees->count())
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Name
                                        </th>

                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Company
                                        </th>

                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Email
                                        </th>

                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Phone
                                        </th>

                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $employee->first_name }}
                                                {{ $employee->last_name }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $employee->company->name }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $employee->email ?? '-' }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $employee->phone ?? '-' }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                                <a
                                                    href="{{ route('employees.show', $employee) }}"
                                                    class="text-gray-600 hover:text-gray-900 mr-3"
                                                >
                                                    View
                                                </a>

                                                <a
                                                    href="{{ route('employees.edit', $employee) }}"
                                                    class="text-blue-600 hover:text-blue-900 mr-3"
                                                >
                                                    Edit
                                                </a>

                                                <form
                                                    action="{{ route('employees.destroy', $employee) }}"
                                                    method="POST"
                                                    class="inline"
                                                >
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="text-red-600 hover:text-red-900"
                                                        onclick="return confirm('Are you sure you want to delete this employee?')"
                                                    >
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6">
                            {{ $employees->links() }}
                        </div>
                    @else
                        <p class="text-gray-500">
                            No employees found.
                        </p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>