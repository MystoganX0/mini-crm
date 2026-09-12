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
                    — CRM Directory
                </p>
                <h1 class="font-serif text-3xl sm:text-4xl font-normal text-gray-900 tracking-tight">
                    Companies
                </h1>
                <div class="mt-8 flex items-center gap-2.5">
                <a 
                    href="{{ route('companies.create') }}" 
                    class="inline-flex items-center gap-2 px-4 py-2.5 text-xs font-semibold text-white bg-gray-950 rounded-xl hover:bg-gray-800 transition shadow-sm hover:shadow"
                >
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"/>
                        <line x1="5" y1="12" x2="19" y2="12"/>
                    </svg>
                    <span>Add Company</span>
                </a>
            </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-200/70 shadow-2xs overflow-hidden">
            <div class="p-4 sm:p-4 border-b border-gray-100 flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <span class="text-sm font-semibold text-gray-900">Companies List</span>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="bg-[#F9FAF7] text-gray-400 uppercase tracking-wider border-b border-gray-100">
                            <th class="py-3.5 px-6 font-semibold">Company Name</th>
                            <th class="py-3.5 px-6 font-semibold">Email</th>
                            <th class="py-3.5 px-6 font-semibold">Website</th>
                            <th class="py-3.5 px-6 font-semibold text-center">Employees</th>
                            <th class="py-3.5 px-6 font-semibold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($companies as $company)
                            <tr class="hover:bg-[#F9FAF7]/60 transition group">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        @if ($company->logo)
                                            <img
                                                src="{{ asset('storage/' . $company->logo) }}"
                                                alt="{{ $company->name }}"
                                                class="w-10 h-10 object-cover rounded-xl border border-gray-100 shadow-2xs shrink-0"
                                            >
                                        @else
                                            <div class="w-10 h-10 rounded-xl bg-[#EAF5F1] text-[#1B4D3E] flex items-center justify-center font-bold text-xs shrink-0">
                                                {{ strtoupper(substr($company->name, 0, 2)) }}
                                            </div>
                                        @endif
                                        <div class="min-w-0">
                                            <a href="{{ route('companies.show', $company) }}" class="font-semibold text-sm text-gray-900 group-hover:text-[#1B4D3E] transition hover:underline">
                                                {{ $company->name }}
                                            </a>
                                        </div>
                                    </div>
                                </td>

                                <td class="py-4 px-6 text-gray-600 font-medium">
                                    {{ $company->email ?: '-' }}
                                </td>

                                <td class="py-4 px-6">
                                    @if ($company->website)
                                        <a
                                            href="{{ $company->website }}"
                                            target="_blank"
                                            class="inline-flex items-center gap-1 text-blue-600 hover:underline font-medium"
                                        >
                                            <span>{{ Str::limit(str_replace(['http://', 'https://'], '', $company->website), 22) }}</span>
                                            <svg class="w-3 h-3 opacity-60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                                        </a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>

                                <td class="py-4 px-6 text-gray-600 font-medium text-center">
                                    {{ $company->employees->count() }}
                                </td>

                                <td class="py-4 px-6 text-center">
                                    <div class="inline-flex items-center gap-2 text-xs font-semibold">
                                        <a
                                            href="{{ route('companies.show', $company) }}"
                                            class="px-3 py-1.5 rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition shadow-2xs"
                                        >
                                            View
                                        </a>

                                        <a
                                            href="{{ route('companies.edit', $company) }}"
                                            class="px-3 py-1.5 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700 transition shadow-2xs"
                                        >
                                            Edit
                                        </a>

                                        <button
                                            type="button"
                                            @click="deleteUrl = '{{ route('companies.destroy', $company) }}'; deleteTitle = 'Delete {{ addslashes($company->name) }}?'; deleteMessage = 'Are you sure you want to delete this company? All {{ $company->employees->count() }} affiliated employees will also be permanently removed.'; showDeleteModal = true"
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
                                    No companies registered yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($companies->hasPages())
                <div class="p-4 sm:px-6 sm:py-4 border-t border-gray-100 bg-white">
                    {{ $companies->links() }}
                </div>
            @endif
        </div>

        <x-delete-modal />
    </div>
</x-app-layout>
