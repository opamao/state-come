<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objectifs extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut',
        'date_fin',
        'quota_ventes',
        'service_id',
        'responsable_id',
     ];

     protected $primaryKey = 'idobjectif';

     protected $table = 'objectifs';
}
