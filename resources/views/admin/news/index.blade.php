<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nieuws Beheren') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Terug naar Dashboard knop -->
            <div class="mb-4">
                <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-600 hover:text-gray-900">
                    &larr; Terug naar Dashboard
                </a>
            </div>

            @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md shadow-sm">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">{{ __('Alle Nieuwsberichten') }}</h3>
                        <!-- Knop voor later om nieuws toe te voegen -->
                        <a href="{{ route('admin.admin.news.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 transition">
                            Nieuw Bericht Toevoegen
                        </a>
                    </div>

                    <!-- Tabel met nieuwsberichten -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titel</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Datum</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acties</th>
                                </tr>
                            </table>
                        </table>
                    </div>

                    <!-- Als er geen nieuws is -->
                    @if($newsItems->isEmpty())
                        <p class="text-gray-500 text-center py-4">Er zijn nog geen nieuwsberichten aangemaakt.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>