<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-2.5 bg-gray-950 border border-transparent rounded-xl font-semibold text-xs text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-950 focus:ring-offset-2 transition shadow-sm']) }}>
    {{ $slot }}
</button>
