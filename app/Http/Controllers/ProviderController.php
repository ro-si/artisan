<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;

class ProviderController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Requête pour chercher dans le champ 'service'
        $services = Provider::where('service', 'LIKE', "%{$query}%")->get();

        // Retourne la vue 'home.metier' avec les résultats de recherche
        return view('home.metier', ['services' => $services, 'query' => $query]);
    }
}
