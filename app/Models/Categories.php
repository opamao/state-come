<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_categorie',
        'etat_categorie',
        'service_id',
     ];

     protected $primaryKey = 'idcategorie';

     protected $table = 'categories';
}
