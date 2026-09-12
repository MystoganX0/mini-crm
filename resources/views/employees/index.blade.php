<x-app-layout>
    <div 
        x-data="{ 
            showDeleteModal: false, 
            deleteUrl: '', 
            deleteTitle: '', 
            deleteMessage: '' 
        }" 
        class="space-y-6"
    >
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <p class="text-[11px] font-bold tracking-widest text-gray-400 uppercase mb-1">
                    — Personnel & Team
                </p>
                <h1 class="font-serif text-3xl sm:text-4xl font-normal text-gray-900 tracking-tight">
                    Employees
                </h1>
                <div class="mt-8 flex items-center gap-2.5">
                    <a 
                        href="{{ route('employees.create') }}" 
                        class="inline-flex items-center gap-2 px-4 py-2.5 text-xs font-semibold text-white bg-gray-950 rounded-xl hover:bg-gray-800 transition shadow-sm hover:shadow"
                    >
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        <span>Add Employee</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-200/70 shadow-2xs overflow-hidden">
            <div class="p-4 sm:p-4 border-b border-gray-100 flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <span class="text-sm font-semibold text-gray-900">Employees List</span>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="bg-[#F9FAF7] text-gray-400 uppercase tracking-wider border-b border-gray-100">
                            <th class="py-3.5 px-6 font-semibold">Full Name</th>
                            <th class="py-3.5 px-6 font-semibold">Company</th>
                            <th class="py-3.5 px-6 font-semibold">Email</th>
                            <th class="py-3.5 px-6 font-semibold">Phone</th>
                            <th class="py-3.5 px-6 font-semibold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($employees as $employee)
                            <tr class="hover:bg-[#F9FAF7]/60 transition group">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-[#1B4D3E] text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-2xs">
                                            {{ strtoupper(substr($employee->first_name, 0, 1) . substr($employee->last_name, 0, 1)) }}
                                        </div>
                                        <div class="min-w-0">
                                            <a href="{{ route('employees.show', $employee) }}" class="font-semibold text-sm text-gray-900 group-hover:text-[#1B4D3E] transition hover:underline">
                                                {{ $employee->first_name }} {{ $employee->last_name }}
                                            </a>
                                        </div>
                                    </div>
                                </td>

                                <td class="py-4 px-6">
                                    @if ($employee->company)
                                        <a href="{{ route('companies.show', $employee->company) }}" class="inline-flex items-center gap-2">
                                            @if ($employee->company->logo)
                                                <img
                                                    src="{{ asset('storage/' . $employee->company->logo) }}"
                                                    alt="{{ $employee->company->name }}"
                                                    class="w-8 h-8 object-cover rounded-md border border-gray-200/60 shrink-0"
                                                >
                                            @else
                                                <div class="w-8 h-8 rounded-md bg-[#EAF5F1] text-[#1B4D3E] flex items-center justify-center font-bold text-[10px] shrink-0">
                                                    {{ strtoupper(substr($employee->company->name, 0, 2)) }}
                                                </div>
                                            @endif
                                            <span>{{ $employee->company->name }}</span>
                                        </a>
                                    @else
                                        <span class="text-gray-400 italic text-xs">Unassigned</span>
                                    @endif
                                </td>

                                <td class="py-4 px-6 text-gray-600 font-medium">
                                    @if ($employee->email)
                                        <a href="mailto:{{ $employee->email }}" class="hover:text-[#1B4D3E] hover:underline">
                                            {{ $employee->email }}
                                        </a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>

                                <td class="py-4 px-6 text-gray-600">
                                    @if ($employee->phone)
                                        <a href="tel:{{ $employee->phone }}" class="hover:text-[#1B4D3E]">
                                            {{ $employee->phone }}
                                        </a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>

                                <td class="py-4 px-6 text-center">
                                    <div class="inline-flex items-center gap-2 text-xs font-semibold">
                                        <a
                                            href="{{ route('employees.show', $employee) }}"
                                            class="px-3 py-1.5 rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition shadow-2xs"
                                        >
                                            View
                                        </a>

                                        <a
                                            href="{{ route('employees.edit', $employee) }}"
                                            class="px-3 py-1.5 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700 transition shadow-2xs"
                                        >
                                            Edit
                                        </a>

                                        <button
                                            type="button"
                                            @click="deleteUrl = '{{ route('employees.destroy', $employee) }}'; deleteTitle = 'Delete {{ addslashes($employee->first_name . ' ' . $employee->last_name) }}?'; deleteMessage = 'Are you sure you want to delete this employee? This action cannot be undone.'; showDeleteModal = true"
                                            class="px-3 py-1.5 rounded-lg bg-red-600 text-white hover:bg-red-700 transition shadow-2xs"
                                        >
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center text-gray-400">
                                    No employees registered yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($employees->hasPages())
                <div class="p-4 sm:px-6 sm:py-4 border-t border-gray-100 bg-white">
                    {{ $employees->links() }}
                </div>
            @endif
        </div>

        <x-delete-modal />
    </div>
</x-app-layout>
