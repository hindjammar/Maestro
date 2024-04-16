<?php

namespace App\Http\Controllers;
use App\Models\Color;
use App\Models\Reference;
use App\Models\Vehicule;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index(){
        $colors=Color::all();
        $references= Reference::all();
        return view('creator.vehicule',compact('colors','references'));
    }
    public function store(Request $request){
        $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'marque_picture' => 'required|image',
            'modele_picture' => 'required|image',
            'couleur' => 'required',
            'reference' => 'required',
            'annee' => 'required',
            ]);

        if ($request->hasFile('marque_picture')) {
            $fileName = time() . $request->file('marque_picture')->getClientOriginalName();
            $path = $request->file('marque_picture')->storeAs('marque_picture', $fileName, 'public');
            $marquepicturePath = Storage::url($path);
        } else {
            $marquepicturePath = null;
        }


        if ($request->hasFile('modele_picture')) {
            $fileName = time() . $request->file('modele_picture')->getClientOriginalName();
            $path = $request->file('modele_picture')->storeAs('modele_picture', $fileName, 'public');
            $modelepicturePath = Storage::url($path);
        } else {
            $modelepicturePath = null;
        }

        Vehicule::create([
            'marque' => $request->marque,
            'modele' => $request->modele,
            'couleur' => $request->couleur,
            'reference' => $request->reference,
            'annee' => $request->annee,
            'marque_picture' => $marquepicturePath,
            'modele_picture' => $modelepicturePath,
            // 'creator' => $user,
            // 'category' => $request->category,
        ]);

        // $this->sendEmailToAdmin($user);

        return redirect('/dashboard');
    }
}
