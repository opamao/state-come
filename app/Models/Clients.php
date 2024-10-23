<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_client',
        'email_client',
        'phone_client',
        'adresse_client',
        'type_client',
        'entreprise_id',
     ];

     protected $primaryKey = 'idclient';

     protected $table = 'clients';
}
