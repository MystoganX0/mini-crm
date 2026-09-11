<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#F8F9FA]">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'FNXperts CRM') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-full font-sans antialiased text-[#1E293B] bg-[#F8F9FA]" x-data="{ sidebarOpen: false }">
        <div class="min-h-screen flex">
            <!-- Sidebar Navigation -->
            @include('layouts.navigation')

            <!-- Mobile Backdrop Overlay -->
            <div 
                x-show="sidebarOpen" 
                @click="sidebarOpen = false"
                x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-30 bg-gray-900/40 backdrop-blur-sm lg:hidden"
                style="display: none;"
            ></div>

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col min-w-0 lg:pl-64">
                <!-- Top Header Bar -->
                <header class="sticky top-0 z-20 h-16 bg-[#F8F9FA]/90 backdrop-blur border-b border-gray-200/60 px-4 sm:px-8 flex items-center justify-between">
                    <!-- Left: Mobile Toggle & Breadcrumbs -->
                    <div class="flex items-center gap-4">
                        <!-- Mobile Hamburger Button -->
                        <button 
                            @click="sidebarOpen = !sidebarOpen" 
                            type="button" 
                            class="lg:hidden p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg focus:outline-none"
                        >
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>

                        <!-- Breadcrumb -->
                        <div class="flex items-center text-xs text-gray-500 font-medium gap-2">
                            <span>Workspace</span>
                            <span class="text-gray-300">/</span>
                            <span class="text-gray-900 font-semibold">
                                @if(request()->routeIs('dashboard'))
                                    Dashboard
                                @elseif(request()->routeIs('companies.*'))
                                    Companies
                                @elseif(request()->routeIs('employees.*'))
                                    Employees
                                @elseif(request()->routeIs('profile.*'))
                                    Profile
                                @else
                                    Overview
                                @endif
                            </span>
                        </div>
                    </div>

                    <!-- Right: Date Indicator & Actions -->
                    <div class="flex items-center gap-4">

                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-[#1B4D3E] text-white flex items-center justify-center font-semibold text-xs shadow-xs">
                                {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 2)) }}
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Page Content Body -->
                <main class="flex-1 px-4 sm:px-8 py-8 max-w-7xl w-full mx-auto space-y-6">
                    <!-- Global Flash Alerts -->
                    @if (session('success'))
                        <div 
                            x-data="{ show: true }" 
                            x-show="show" 
                            x-init="setTimeout(() => show = false, 4000)"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2"
                            class="flex items-center justify-between p-4 rounded-xl bg-emerald-50 border border-emerald-200/80 text-emerald-900 text-sm shadow-xs"
                        >
                            <div class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                        <polyline points="20 6 9 17 4 12"/>
                                    </svg>
                                </div>
                                <span class="font-medium">{{ session('success') }}</span>
                            </div>
                            <button @click="show = false" class="text-emerald-600 hover:text-emerald-800 transition">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                            </button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div 
                            x-data="{ show: true }" 
                            x-show="show" 
                            x-init="setTimeout(() => show = false, 3000)"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2"
                            class="flex items-center justify-between p-4 rounded-xl bg-red-50 border border-red-200/80 text-red-900 text-sm shadow-xs"
                        >
                            <div class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-red-100 text-red-700 flex items-center justify-center shrink-0">
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                        <circle cx="12" cy="12" r="10"/>
                                        <line x1="12" y1="8" x2="12" y2="12"/>
                                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                                    </svg>
                                </div>
                                <span class="font-medium">{{ session('error') }}</span>
                            </div>
                            <button @click="show = false" class="text-red-600 hover:text-red-800 transition">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                            </button>
                        </div>
                    @endif

                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
