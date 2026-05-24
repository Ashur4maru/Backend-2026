<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    //

    public function index() {
// Haal het nieuws op, gesorteerd op de nieuwste publicatiedatum
$newsItems = News::where('published_at', '<=', now())
                 ->orderBy('published_at', 'desc')
                 ->get();

return view('welcome', compact('newsItems'));
}


}

