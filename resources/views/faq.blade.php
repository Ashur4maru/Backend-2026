<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Veelgestelde Vragen (FAQ)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Introductie tekst -->
            <div class="text-center mb-10">
                <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Hoe kunnen we je helpen?
                </h1>
                <p class="mt-4 text-lg text-gray-500">
                    Hier vind je de antwoorden op de meest gestelde vragen over ons platform en het nieuwsbeheer.
                </p>
            </div>

            <!-- FAQ Lijst -->
            <div class="space-y-4">
                
                <!-- Vraag 1 -->
                <details class="group bg-white rounded-lg shadow-sm border border-gray-200 p-6 [&_summary::-webkit-details-marker]:hidden" open>
                    <summary class="flex items-center justify-between cursor-pointer focus:outline-none">
                        <h2 class="text-lg font-medium text-gray-900">
                            Hoe kan ik een nieuw nieuwsbericht toevoegen?
                        </h2>
                        <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-100 p-1.5 text-gray-900 sm:p-3 group-open:rotate-180 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </summary>
                    <p class="mt-4 leading-relaxed text-gray-700">
                        Als administrator kun je via het dashboard naar 'Nieuws Beheren' navigeren. Klik vervolgens op de groene knop 'Nieuw Bericht Toevoegen', vul de titel, inhoud en publicatiedatum in en klik op opslaan. Het bericht staat direct live op de homepage.
                    </p>
                </details>

                <!-- Vraag 2 -->
                <details class="group bg-white rounded-lg shadow-sm border border-gray-200 p-6 [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between cursor-pointer focus:outline-none">
                        <h2 class="text-lg font-medium text-gray-900">
                            Waarom word ik na het inloggen doorgestuurd naar de homepage?
                        </h2>
                        <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-100 p-1.5 text-gray-900 sm:p-3 group-open:rotate-180 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </summary>
                    <p class="mt-4 leading-relaxed text-gray-700">
                        We hebben de configuratie van de applicatie zo aangepast dat gebruikers na een succesvolle login direct het laatste nieuws kunnen lezen op de homepage, in plaats van op het technische dashboard te landen.
                    </p>
                </details>

                <!-- Vraag 3 -->
                <details class="group bg-white rounded-lg shadow-sm border border-gray-200 p-6 [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between cursor-pointer focus:outline-none">
                        <h2 class="text-lg font-medium text-gray-900">
                            Wat moet ik doen bij een 'RouteNotFoundException'?
                        </h2>
                        <span class="ml-1.5 flex-shrink-0 rounded-full bg-gray-100 p-1.5 text-gray-900 sm:p-3 group-open:rotate-180 transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </summary>
                    <p class="mt-4 leading-relaxed text-gray-700">
                        Dit betekent meestal dat een link in je Blade-bestanden verwijst naar een route die Laravel niet kent of dat je de cache moet legen. Dit los je op door de route correct te definiëren in <code class="bg-gray-100 px-1 rounded text-red-600 text-sm">routes/web.php</code> en het commando <code class="bg-gray-100 px-1 rounded text-sm">php artisan route:clear</code> te draaien.
                    </p>
                </details>

            </div>

            <!-- Contact sectie onderaan -->
            <div class="mt-12 text-center bg-gray-50 rounded-lg p-6 border border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Staat je vraag er niet tussen?</h3>
                <p class="mt-2 text-sm text-gray-500">Neem dan gerust contact op met de beheerder van het platform.</p>
            </div>

        </div>
    </div>
</x-app-layout>