<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commercial extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_come',
        'prenom_come',
        'phone_come',
        'email_come',
        'zone_geographique_come',
        'date_embauche_come',
        'password_come',
        'responsable_id',
        'entreprise_id',
     ];

     protected $primaryKey = 'idcome';

     protected $table = 'commercial';
}
