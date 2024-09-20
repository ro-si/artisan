<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /**
     * Affiche le formulaire de connexion pour l'administrateur.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Gère la connexion de l'administrateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            // Authentification réussie
            return redirect()->route('admin.dashboard');
        }

        // Authentification échouée
        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements ou vous n\'êtes pas un administrateur.',
        ]);
    }

    /**
     * Déconnecte l'administrateur.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Déconnecté avec succès.');
    }
}
