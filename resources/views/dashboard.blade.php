<x-app-layout>
    <div class="space-y-8">
        <!-- Hero Header Area -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <p class="text-[11px] font-bold tracking-widest text-gray-400 uppercase mb-1">
                    — Overview & Analytics
                </p>
                <h1 class="font-serif text-3xl sm:text-4xl font-normal text-gray-900 tracking-tight">
                    CRM Summary
                </h1>
            </div>
        </div>

        <!-- Metric Stat Cards (Compact Cards, Natural Spacing) -->
        <div class="flex flex-wrap items-center gap-5">
            <!-- Metric 1: Total Companies -->
            <div class="w-64 p-5 bg-white rounded-2xl border border-gray-200/70 shadow-2xs hover:shadow-subtle transition flex flex-col gap-3">
                <div class="flex items-center justify-between text-gray-500">
                    <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">Total Companies</span>
                    <div class="w-8 h-8 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/>
                            <path d="M6 12H4a2 2 0 0 0-2 2v8h4"/>
                            <path d="M18 9h2a2 2 0 0 1 2 2v11h-4"/>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-3xl font-bold text-gray-900 tracking-tight">
                        {{ number_format($totalCompanies) }}
                    </p>
                    <div class="mt-1.5 flex items-center gap-1.5 text-xs text-emerald-700 font-medium">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <polyline points="18 15 12 9 6 15"/>
                        </svg>
                        <span>Active registered</span>
                    </div>
                </div>
            </div>

            <!-- Metric 2: Total Employees -->
            <div class="w-64 p-5 bg-white rounded-2xl border border-gray-200/70 shadow-2xs hover:shadow-subtle transition flex flex-col gap-3">
                <div class="flex items-center justify-between text-gray-500">
                    <span class="text-xs font-semibold uppercase tracking-wider text-gray-400">Total Employees</span>
                    <div class="w-8 h-8 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-3xl font-bold text-gray-900 tracking-tight">
                        {{ number_format($totalEmployees) }}
                    </p>
                    <div class="mt-1.5 flex items-center gap-1.5 text-xs text-emerald-700 font-medium">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <polyline points="18 15 12 9 6 15"/>
                        </svg>
                        <span>Personnel connected</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
