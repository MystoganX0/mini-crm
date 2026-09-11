<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="fixed inset-y-0 left-0 z-40 w-64 bg-white border-r border-gray-200/80 transition-transform duration-200 ease-in-out flex flex-col justify-between">
    <!-- Top Section -->
    <div>
        <!-- Brand Header -->
        <div class="h-16 flex items-center px-6 border-b border-gray-100">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 group">
                <div
                    class="w-8 h-8 rounded-lg bg-[#1B4D3E] flex items-center justify-center text-white shadow-sm transition-transform group-hover:scale-105 overflow-hidden">
                    <img src="{{ asset('assests/logo.png') }}" alt="FNXperts Logo" class="w-full h-full object-cover">
                </div>
                <span class="font-bold text-lg tracking-tight text-gray-900">FNXperts</span>
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="px-3 py-2 space-y-6">
            <div>
                <p class="px-3 mb-2 text-[11px] font-bold tracking-wider text-gray-400 uppercase">
                    Workspace
                </p>
                <nav class="space-y-1">
                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}"
                        class="group flex items-center justify-between px-3 py-2.5 text-sm font-medium rounded-xl transition {{ request()->routeIs('dashboard') ? 'bg-[#EAF5F1] text-[#1B4D3E] font-semibold' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100/70' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ request()->routeIs('dashboard') ? 'text-[#1B4D3E]' : 'text-gray-400 group-hover:text-gray-600' }}"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect width="7" height="9" x="3" y="3" rx="1" />
                                <rect width="7" height="5" x="14" y="3" rx="1" />
                                <rect width="7" height="9" x="14" y="12" rx="1" />
                                <rect width="7" height="5" x="3" y="16" rx="1" />
                            </svg>
                            <span>Dashboard</span>
                        </div>
                        @if(request()->routeIs('dashboard'))
                            <span class="w-1.5 h-1.5 rounded-full bg-[#1B4D3E]"></span>
                        @endif
                    </a>

                    <!-- Companies -->
                    <a href="{{ route('companies.index') }}"
                        class="group flex items-center justify-between px-3 py-2.5 text-sm font-medium rounded-xl transition {{ request()->routeIs('companies.*') ? 'bg-[#EAF5F1] text-[#1B4D3E] font-semibold' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100/70' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ request()->routeIs('companies.*') ? 'text-[#1B4D3E]' : 'text-gray-400 group-hover:text-gray-600' }}"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z" />
                                <path d="M6 12H4a2 2 0 0 0-2 2v8h4" />
                                <path d="M18 9h2a2 2 0 0 1 2 2v11h-4" />
                                <path d="M10 6h4" />
                                <path d="M10 10h4" />
                                <path d="M10 14h4" />
                                <path d="M10 18h4" />
                            </svg>
                            <span>Companies</span>
                        </div>
                        @if(request()->routeIs('companies.*'))
                            <span class="w-1.5 h-1.5 rounded-full bg-[#1B4D3E]"></span>
                        @endif
                    </a>

                    <!-- Employees -->
                    <a href="{{ route('employees.index') }}"
                        class="group flex items-center justify-between px-3 py-2.5 text-sm font-medium rounded-xl transition {{ request()->routeIs('employees.*') ? 'bg-[#EAF5F1] text-[#1B4D3E] font-semibold' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100/70' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ request()->routeIs('employees.*') ? 'text-[#1B4D3E]' : 'text-gray-400 group-hover:text-gray-600' }}"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                            <span>Employees</span>
                        </div>
                        @if(request()->routeIs('employees.*'))
                            <span class="w-1.5 h-1.5 rounded-full bg-[#1B4D3E]"></span>
                        @endif
                    </a>
                </nav>
            </div>

            <!-- General Settings Section -->
            <div>
                <p class="px-3 mb-2 text-[11px] font-bold tracking-wider text-gray-400 uppercase">
                    Settings
                </p>
                <nav class="space-y-1">
                    <a href="{{ route('profile.edit') }}"
                        class="group flex items-center justify-between px-3 py-2.5 text-sm font-medium rounded-xl transition {{ request()->routeIs('profile.*') ? 'bg-[#EAF5F1] text-[#1B4D3E] font-semibold' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100/70' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 {{ request()->routeIs('profile.*') ? 'text-[#1B4D3E]' : 'text-gray-400 group-hover:text-gray-600' }}"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="3" />
                                <path
                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z" />
                            </svg>
                            <span>Profile & Account</span>
                        </div>
                    </a>
                </nav>
            </div>
        </div>
    </div>

    <!-- User Profile Footer -->
    <div class="p-3 border-t border-gray-100 bg-[#FCFDFB]">
        <div class="flex items-center justify-between p-2 rounded-xl hover:bg-gray-100/70 transition">
            <div class="flex items-center gap-2.5 min-w-0">
                <div
                    class="w-8 h-8 rounded-full bg-[#1B4D3E] text-white flex items-center justify-center font-semibold text-xs shrink-0">
                    {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 2)) }}
                </div>
                <div class="min-w-0">
                    <p class="text-xs font-semibold text-gray-900 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-[11px] text-gray-500 truncate">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <!-- Logout Form Button -->
            <form method="POST" action="{{ route('logout') }}" class="shrink-0">
                @csrf
                <button type="submit" title="Log Out"
                    class="p-1.5 text-gray-400 hover:text-red-600 rounded-lg hover:bg-red-50 transition">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" x2="9" y1="12" y2="12" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</aside>