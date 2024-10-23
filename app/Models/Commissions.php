<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant_commission',
        'date_commission',
        'commercial_id',
     ];

     protected $primaryKey = 'idcomi';

     protected $table = 'commissions';
}
