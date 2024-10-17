<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprises extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_entre',
        'logo_entre',
        'localisation_entre',
        'adresse_entre',
        'contact_entre',
     ];

     protected $primaryKey = 'identre';

     protected $table = 'entreprises';
}
