<?php

namespace App\Models;

use App\Models\Projet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable=[
        "libelle",
        "updated_at",
        "created_at",
    ];
    public function projets(){
        return $this->hasMany(Projet::class);
    }
}
