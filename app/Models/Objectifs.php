<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objectifs extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_objectif',
        'objectif',
        'service_id',
        'responsable_id',
     ];

     protected $primaryKey = 'idobjectif';

     protected $table = 'objectifs';
}
