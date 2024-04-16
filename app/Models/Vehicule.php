<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    
    protected $fillable = ['marque','modele','reference','marque_picture','modele_picture','couleur','annee']; // Ajoutez la colonne 'imagecolor' ici
    


    public function couleur()
    {
        return $this->hasMany(Color::class);
    }

    public function reference()
    {
        return $this->belongsTo(Reference::class);
    }
}
