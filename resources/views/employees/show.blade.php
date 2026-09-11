<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Employee Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <div class="space-y-4">

                        <div>
                            <p class="text-sm text-gray-500">First Name</p>
                            <p class="text-lg font-medium">
                                {{ $employee->first_name }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Last Name</p>
                            <p class="text-lg font-medium">
                                {{ $employee->last_name }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Company</p>
                            <p class="text-lg font-medium">
                                {{ $employee->company->name }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="text-lg">
                                {{ $employee->email ?? '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Phone</p>
                            <p class="text-lg">
                                {{ $employee->phone ?? '-' }}
                            </p>
                        </div>

                    </div>

                    <div class="mt-6 flex gap-3">
                        <a
                            href="{{ route('employees.edit', $employee) }}"
                            class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700"
                        >
                            Edit
                        </a>

                        <a
                            href="{{ route('employees.index') }}"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300"
                        >
                            Back
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>