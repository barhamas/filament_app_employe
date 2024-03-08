<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'montant',
        'mois',
        'annee',
    ];

    // Relation avec l'employé
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }
}
