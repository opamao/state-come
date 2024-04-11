<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_service',
        'etat_service',
     ];

     protected $primaryKey = 'idservice';

     protected $table = 'services';
}
