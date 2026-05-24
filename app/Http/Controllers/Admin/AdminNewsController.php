<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class AdminNewsController extends Controller
{
    //

    public function index()
    {
        // Haal alle nieuwsberichten op voor de admin om te beheren
        $newsItems = News::latest()->paginate(10);

        // Stuur ze naar de admin-overzichtspagina
        return view('admin.news.index', compact('newsItems'));
    }

    public function create()
{
    // Toon het formulier om een nieuw bericht aan te maken
    return view('admin.news.create');
}

    public function store(Request $request)
{
    // 1. Valideer de binnenkomende gegevens
    $validated = $request->validate([
        'title'   => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    // 2. Sla het nieuwe nieuwsbericht op in de database
    News::create([
        'title'   => $validated['title'],
        'content' => $validated['content'],
        'published_at' => now(), // We zetten de publicatiedatum direct op nu
        // Voeg hier eventuele extra velden toe, zoals 'user_id' => auth()->id() indien nodig
    ]);

    // 3. Stuur de admin terug naar het overzicht met een succesmelding
    return redirect()
        ->route('admin.admin.news.index')
        ->with('success', 'Nieuwsbericht is succesvol aangemaakt!');
}
}
