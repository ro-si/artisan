<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestataire;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

class PrestataireController extends Controller
{
    public function create()
    {
        return view('auth.prestataires');
    }

    public function store(Request $request)
    {
        try {
            // Valider les données du formulaire
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'situation_geographique' => 'required|string|max:255',
                'numero_mobile' => 'required|string|max:255|unique:prestataires',
                'secteur_activite' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:prestataires',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'plage_horaire' => 'required|string|max:255',
                'ville' => 'required|string|max:255',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Utiliser dd() pour voir les messages d'erreur
            // dd($e->errors());
        }

        // Créer un nouveau prestataire dans la base de données
        $prestataire = Prestataire::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'situation_geographique' => $request->situation_geographique,
            'numero_mobile' => $request->numero_mobile,
            'secteur_activite' => $request->secteur_activite,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'plage_horaire' => $request->plage_horaire,
            'ville' => $request->ville,
        ]);

        // Rediriger vers la page de connexion pour que le prestataire puisse se connecter
        return redirect()->route('prestataires.login.form')->with('success', 'Inscription réussie ! Veuillez vous connecter.');
    }



    public function showLoginForm()
    {
        return view('auth.prestataires-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('prestataires')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home.dashboard')->with('success', 'Vous êtes connecté avec succès !');
        }

        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas.',
        ]);
    }
}
