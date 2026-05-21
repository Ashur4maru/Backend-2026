<x-guest-layout>
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 my-12">
        
        <div class="flex flex-col items-center text-center">
            <!-- Profielfoto of Standaard Avatar -->
            @if($user->profile_photo)
                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="{{ $user->username ?? $user->name }}" class="w-32 h-32 rounded-full object-cover shadow">
            @else
                <div class="w-32 h-32 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-400 text-4xl font-bold shadow">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif

            <!-- Naam & Username -->
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mt-4">
                {{ $user->username ? '@' . $user->username : $user->name }}
            </h1>
            
            @if($user->username)
                <p class="text-sm text-gray-500 dark:text-gray-400">({{ $user->name }})</p>
            @endif

            <!-- Verjaardag -->
            @if($user->birthday)
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2 flex items-center gap-1">
                    🎂 Jarig op: {{ \Carbon\Carbon::parse($user->birthday)->format('d-m-Y') }}
                </p>
            @endif
        </div>

        <!-- Over Mij Sectie -->
        <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Over mij</h2>
            <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line text-sm leading-relaxed">
                {{ $user->about_me ?? 'Deze gebruiker heeft nog niets over zichzelf geschreven.' }}
            </p>
        </div>

        <!-- Link terug naar home of dashboard (als je ingelogd bent) -->
        <div class="mt-8 text-center">
            <a href="/" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                Terug naar de website
            </a>
        </div>

    </div>
</x-guest-layout>