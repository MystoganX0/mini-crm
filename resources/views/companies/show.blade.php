<x-app-layout>
    <div 
        x-data="{ 
            showDeleteModal: false, 
            deleteUrl: '', 
            deleteTitle: '', 
            deleteMessage: '' 
        }" 
        class="space-y-8 max-w-5xl mx-auto"
    >
        <div>
            <a href="{{ route('companies.index') }}" class="inline-flex items-center gap-1 text-xs font-semibold text-gray-500 hover:text-gray-800 mb-2 transition">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                <span>Back to Companies</span>
            </a>
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    @if ($company->logo)
                        <img
                            src="{{ asset('storage/' . $company->logo) }}"
                            alt="{{ $company->name }}"
                            class="w-16 h-16 object-cover rounded-2xl border border-gray-100 shadow-sm"
                        >
                    @else
                        <div class="w-16 h-16 rounded-2xl bg-[#EAF5F1] text-[#1B4D3E] flex items-center justify-center font-bold text-xl shadow-2xs">
                            {{ strtoupper(substr($company->name, 0, 2)) }}
                        </div>
                    @endif
                    <div>
                        <h1 class="font-serif text-3xl font-normal text-gray-900 tracking-tight">
                            {{ $company->name }}
                        </h1>
                        <div class="flex items-center gap-3 text-xs text-gray-500 mt-1">
                            @if($company->email)
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                    {{ $company->email }}
                                </span>
                            @endif
                            @if($company->website)
                                <span class="text-gray-300">•</span>
                                <a href="{{ $company->website }}" target="_blank" class="text-blue-600 hover:underline flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
                                    {{ str_replace(['http://', 'https://'], '', $company->website) }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <a
                        href="{{ route('employees.create', ['company_id' => $company->id]) }}"
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
            <div class="p-4 sm:p-4 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h2 class="font-bold text-sm text-gray-900">Employees at {{ $company->name }}</h2>
                    <p class="text-[11px] text-gray-400 mt-0.5">Total {{ $company->employees->count() }} staff registered</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="bg-[#F9FAF7] text-gray-400 uppercase tracking-wider border-b border-gray-100">
                            <th class="py-3.5 px-6 font-semibold">Full Name</th>
                            <th class="py-3.5 px-6 font-semibold">Email</th>
                            <th class="py-3.5 px-6 font-semibold">Phone</th>
                            <th class="py-3.5 px-6 font-semibold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($company->employees as $employee)
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
                                <td class="py-4 px-6 text-gray-600 font-medium">
                                    {{ $employee->email ?: '-' }}
                                </td>
                                <td class="py-4 px-6 text-gray-600">
                                    {{ $employee->phone ?: '-' }}
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
                                            @click="deleteUrl = '{{ route('employees.destroy', $employee) }}'; deleteTitle = 'Delete {{ addslashes($employee->first_name . ' ' . $employee->last_name) }}?'; deleteMessage = 'Are you sure you want to delete this employee?'; showDeleteModal = true"
                                            class="px-3 py-1.5 rounded-lg bg-red-600 text-white hover:bg-red-700 transition shadow-2xs"
                                        >
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-10 text-center text-gray-400">
                                    No employees registered in this company yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <x-delete-modal />
    </div>
</x-app-layout>
