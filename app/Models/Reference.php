<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $fillable = ['reference','couleur', 'imagereference']; 
    
    protected $table='references';


    public function vehicules()
    {
        return $this->hasMany(Vehicule::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
