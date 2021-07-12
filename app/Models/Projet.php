<?php

namespace App\Models;

use App\Models\User;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projet extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'duree' => 'datetime',
    ];
    protected $fillable=[
        "user_id",
        "nom",
        "slogan",
        "description",
        "objectif",
        "duree",
        "etat",
        "image",
        "categorie_id",
        "updated_at",
        "created_at",
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
