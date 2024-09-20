<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Validation de l'image
        ]);

        // Gestion de l'image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('assets', $imageName); // Stocker l'image dans le dossier 'public/images'
        }



        // Obtenir l'ID du prestataire authentifié
        $userId = Auth::guard('prestataires')->id();

        // Vérifier que l'ID du prestataire est valide
        if (!$userId) {
            return redirect()->back()->with('error', 'Vous devez être connecté pour ajouter un service.');
        }

        // Vérifier si l'ID du prestataire existe dans la table prestataires
        $prestataireExists = \App\Models\Prestataire::find($userId);
        if (!$prestataireExists) {
            return redirect()->back()->with('error', 'Le prestataire associé n\'existe pas.');
        }

        // Créer un nouveau service dans la base de données
        $service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName, // Enregistrer le chemin de l'image
            'user_id' => $userId, // Associer le service au prestataire authentifié
        ]);

        // Vérifier les informations ajoutées et l'utilisateur authentifié
        // dd([
        //     'service' => $service,
        //     'authenticated_user_id' => $userId,
        // ]);

        // Rediriger vers la page 'metier' avec un message de succès
        return redirect()->route('home.metier')->with('success', 'Votre service a été ajouté avec succès !');
    }
}
