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
                    <!-- Welkomstboodschap -->
                    <h3 class="text-lg font-medium mb-2">
                        {{ __('Welkom Admin!') }}
                    </h3>
                    <p class="text-gray-600 mb-6">
                        {{ __('Je bent succesvol ingelogd op het beheerpaneel van de website.') }}
                    </p>
                    
                    <hr class="border-gray-200 mb-6" />

                    <!-- Beheer Acties / Knoppen -->
                    <div class="flex flex-wrap gap-4">
                        <!-- Gebruikers Beheren -->
                        <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md text-sm font-medium hover:bg-blue-700 transition shadow-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            {{ __('Gebruikers Beheren') }}
                        </a>

                        <!-- Nieuws Beheren (NU ACTIEF) -->
                        <a href="{{ route('admin.admin.news.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white rounded-md text-sm font-medium hover:bg-black transition shadow-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M19 20a2 2 0 002-2V8a2 2 0 00-2-2h-5M19 20a2 2 0 01-2-2V8m-5 4h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            {{ __('Nieuws Beheren') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>