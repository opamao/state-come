<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intercations extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_interaction',
        'date_interaction',
        'heure_interaction',
        'note_interaction',
        'commercial_id',
        'client_id',
     ];

     protected $primaryKey = 'idincli';

     protected $table = 'interactions_clients';
}
