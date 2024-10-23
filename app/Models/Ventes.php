<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventes extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit',
        'quantite',
        'montant_total',
        'date_vente',
        'commercial_id',
        'client_id',
     ];

     protected $primaryKey = 'idvente';

     protected $table = 'ventes';
}
