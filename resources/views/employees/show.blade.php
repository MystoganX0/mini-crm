<x-app-layout>
    <div 
        x-data="{ 
            showDeleteModal: false, 
            deleteUrl: '', 
            deleteTitle: '', 
            deleteMessage: '' 
        }" 
        class="space-y-6 max-w-4xl mx-auto"
    >
        <!-- Back link -->
        <div>
            <a href="{{ route('employees.index') }}" class="inline-flex items-center gap-1 text-xs font-semibold text-gray-500 hover:text-gray-800 mb-2 transition">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                <span>Back to Employees</span>
            </a>
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-[#1B4D3E] text-white flex items-center justify-center font-bold text-xl shadow-xs">
                        {{ strtoupper(substr($employee->first_name, 0, 1) . substr($employee->last_name, 0, 1)) }}
                    </div>
                    <div>
                        <h1 class="font-serif text-3xl font-normal text-gray-900 tracking-tight">
                            {{ $employee->first_name }} {{ $employee->last_name }}
                        </h1>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <a
                        href="{{ route('employees.edit', $employee) }}"
                        class="px-4 py-2.5 text-xs font-semibold text-white bg-emerald-600 rounded-xl hover:bg-emerald-700 transition shadow-sm"
                    >
                        Edit Employee
                    </a>
                    <button
                        type="button"
                        @click="deleteUrl = '{{ route('employees.destroy', $employee) }}'; deleteTitle = 'Delete {{ addslashes($employee->first_name . ' ' . $employee->last_name) }}?'; deleteMessage = 'Are you sure you want to permanently delete this employee?'; showDeleteModal = true"
                        class="px-4 py-2.5 text-xs font-semibold text-white bg-red-600 rounded-xl hover:bg-red-700 transition shadow-sm"
                    >
                        Delete
                    </button>
                </div>
            </div>
        </div>

        <!-- Detail Grid Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Card 1: Contact Information -->
            <div class="bg-white rounded-2xl border border-gray-200/70 p-6 shadow-2xs space-y-4">
                <h3 class="font-bold text-sm text-gray-900 border-b border-gray-100 pb-3">Contact Information</h3>
                
                <div class="space-y-3 text-xs">
                    <div>
                        <span class="text-gray-400 block uppercase font-semibold text-[10px] tracking-wider mb-1">Email Address</span>
                        @if($employee->email)
                            <a href="mailto:{{ $employee->email }}" class="text-sm font-semibold text-blue-600 hover:underline">
                                {{ $employee->email }}
                            </a>
                        @else
                            <span class="text-gray-400 text-sm italic">No email recorded</span>
                        @endif
                    </div>

                    <div>
                        <span class="text-gray-400 block uppercase font-semibold text-[10px] tracking-wider mb-1">Phone Number</span>
                        @if($employee->phone)
                            <a href="tel:{{ $employee->phone }}" class="text-sm font-semibold text-gray-900 hover:text-[#1B4D3E]">
                                {{ $employee->phone }}
                            </a>
                        @else
                            <span class="text-gray-400 text-sm italic">No phone recorded</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Card 2: Company Affiliation -->
            <div class="bg-white rounded-2xl border border-gray-200/70 p-6 shadow-2xs space-y-4">
                <h3 class="font-bold text-sm text-gray-900 border-b border-gray-100 pb-3">Company Affiliation</h3>
                
                @if($employee->company)
                    <div class="flex items-center gap-3">
                        @if($employee->company->logo)
                            <img src="{{ asset('storage/' . $employee->company->logo) }}" alt="{{ $employee->company->name }}" class="w-12 h-12 object-cover rounded-xl border border-gray-100 shadow-2xs shrink-0">
                        @else
                            <div class="w-12 h-12 rounded-xl bg-[#EAF5F1] text-[#1B4D3E] flex items-center justify-center font-bold text-sm shrink-0">
                                {{ strtoupper(substr($employee->company->name, 0, 2)) }}
                            </div>
                        @endif
                        <div class="min-w-0">
                            <a href="{{ route('companies.show', $employee->company) }}" class="font-bold text-sm text-gray-900 hover:text-[#1B4D3E] hover:underline truncate block">
                                {{ $employee->company->name }}
                            </a>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $employee->company->email ?: 'No email' }}</p>
                        </div>
                    </div>
                @else
                    <p class="text-xs text-gray-400 italic">This employee is not currently assigned to a company.</p>
                @endif
            </div>
        </div>

        <!-- Delete Confirmation Modal Component -->
        <x-delete-modal />
    </div>
</x-app-layout>