<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function contact()
    {
        return view('Home.contact');
    }

    //
    public function metier(Request $request)
    {
        // Obtenir l'ID du prestataire authentifié
        $userId = Auth::guard('prestataires')->id();

        // Récupérer les services associés au prestataire
        // $services = Service::where('user_id', $userId)->get();

        // Utiliser dd pour déboguer les services récupérés


        // Récupérer tous les services avec les informations du prestataire
        $services = Service::with('prestataire')->get();

        if ($request->filled('query')) {
            $query =  $request->input('query');
            //$services->where('id', 'like', "%{$query}%")->paginate(20);
            $services = Service::where('name', 'like', "%{$query}%")->paginate(20);
        }

        //dd($services);

        // exit();
        // Passer les services à la vue
        return view('Home.metier', compact('services'));
    }
    //
    public function devenirartisan()
    {
        return view('Home.devenirartisan');
    }


    public function dashboard()
    {
        return view('Home.dashboard');
    }
}
