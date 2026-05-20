<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welkom Admin! Je bent ingelogd op het beheerpaneel.") }}
                </div>
            </div>
        </div>
    </div>

    <div class="p-6 text-gray-900 dark:text-gray-100">
    <p class="mb-4">Welkom op het Admin Dashboard!</p>
    
    <!-- Voeg deze knop toe -->
    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md text-sm font-medium hover:bg-blue-700 transition">
        Gebruikers Beheren
    </a>
</div>
</x-app-layout>

