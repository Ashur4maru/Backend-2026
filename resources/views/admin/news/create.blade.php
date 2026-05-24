<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nieuw Nieuwsbericht') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('admin.admin.news.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
                    &larr; Terug naar overzicht
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-6">{{ __('Maak een nieuw bericht aan') }}</h3>

                    <!-- Het formulier (de action vullen we later in als we gaan opslaan) -->
                    <form action="{{ route('admin.admin.news.store') }}" method="POST">
                        @csrf

                        <!-- Titel -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Titel</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        </div>

                        <!-- Inhoud -->
                        <div class="mb-6">
                            <label for="content" class="block text-sm font-medium text-gray-700">Inhoud</label>
                            <textarea name="content" id="content" rows="6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required></textarea>
                        </div>

                        <!-- Knoppen -->
                        <div class="flex justify-end gap-4">
                            <a href="{{ route('admin.admin.news.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-300 transition">
                                Annuleren
                            </a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition">
                                Opslaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>