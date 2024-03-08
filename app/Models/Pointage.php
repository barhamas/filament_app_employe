<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pointage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'heure_entree',
        'heure_sortie',
    ];

    // Relation avec l'employé
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }
}
