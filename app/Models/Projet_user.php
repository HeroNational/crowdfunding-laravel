<?php

namespace App\Models;

use App\Models\Projet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projet_user extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'projet_id',
        "montant",
        "message",
        "updated_at",
        "created_at",
    ];
}
