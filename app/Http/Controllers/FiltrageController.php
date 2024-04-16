<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Reference;
use App\Models\Vehicule;

class FiltrageController extends Controller
{
    // public function getviewfilter(){
    //     return view('client.filtrage');
    // }
    // public function getModels(Request $request)
    // {
    //     $marqueId = $request->input('id');
    //     $modeles = Vehicule::where('id', $marqueId)->distinct('modele')->pluck('modele');
    //     $html = '';
    //     foreach ($modeles as $modele) {
    //         $html .= '<button type="button" class="modelButton" data-marque-id="' . $marqueId . '" data-modele="' . $modele . '">' . $modele . '</button>';
    //     }
    //     return $html;
    // }

    // public function getColors(Request $request)
    // {
    //     $marqueId = $request->input('id');
    //     $modele = $request->input('modele');
    //     $couleurs = Vehicule::where('id', $marqueId)
    //                          ->where('modele', $modele)
    //                          ->distinct('couleur')
    //                          ->pluck('couleur');
    //     $html = '';
    //     foreach ($couleurs as $couleur) {
    //         $html .= '<button type="button" class="colorButton" data-marque-id="' . $marqueId . '" data-modele="' . $modele . '" data-couleur="' . $couleur . '">' . $couleur . '</button>';
    //     }
    //     return $html;
    // }

    // public function getReferences(Request $request)
    // {
    //     $marqueId = $request->input('id');
    //     $modele = $request->input('modele');
    //     $couleur = $request->input('couleur');
    //     $references = Vehicule::where('id', $marqueId)
    //                           ->where('modele', $modele)
    //                           ->where('couleur', $couleur)
    //                           ->get();
    //     $html = '';
    //     foreach ($references as $reference) {
    //         $html .= '<button type="button" class="referenceButton" data-marque-id="' . $marqueId . '" data-modele="' . $modele . '" data-couleur="' . $couleur . '" data-reference-id="' . $reference->id . '">' . $reference->reference . '</button>';
    //     }
    //     return $html;
    // }



    public function index()
    {
    
        
        $vehicules = Vehicule::all();
        return view('client.filtrage', compact('vehicules'));
    }

    // Autres méthodes pour récupérer les modèles, couleurs et références
}


