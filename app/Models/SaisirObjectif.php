<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaisirObjectif extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_objectifa',
        'quantite',
        'service_id',
        'categorie_id',
        'objectif_id',
     ];

     protected $primaryKey = 'idobjectifa';

     protected $table = 'objectifs_ajout';
}
