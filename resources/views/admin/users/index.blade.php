<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Gebruikers Beheer') }}
            </h2>
            <!-- Knop naar het aanmaakformulier -->
            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md text-sm font-medium hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 transition">
                + Nieuwe Gebruiker
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Succes- of foutmeldingen tonen -->
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg dark:bg-green-900/50 dark:text-green-200">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg dark:bg-red-900/50 dark:text-red-200">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-400 text-sm">
                                    <th class="py-3 px-4 font-semibold">Naam</th>
                                    <th class="py-3 px-4 font-semibold">Email</th>
                                    <th class="py-3 px-4 font-semibold">Rol</th>
                                    <th class="py-3 px-4 font-semibold text-right">Acties</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="border-b border-gray-100 dark:border-gray-700/50 hover:bg-gray-50 dark:hover:bg-gray-700/30">
                                        <td class="py-3 px-4 text-sm font-medium">{{ $user->name }}</td>
                                        <td class="py-3 px-4 text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</td>
                                        <td class="py-3 px-4 text-sm">
                                            <!-- Gekleurd label op basis van de rol -->
                                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full {{ $user->hasRole('admin') ? 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400' : 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' }}">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4 text-sm text-right">
                                            <!-- Zorg dat de admin zichzelf niet kan verwijderen -->
                                            @if(auth()->id() !== $user->id)
                                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 font-medium transition">
                                                        Verwijderen
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-gray-400 dark:text-gray-500 text-xs italic">Jijzelf</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginatie links (voor als je veel users hebt) -->
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>