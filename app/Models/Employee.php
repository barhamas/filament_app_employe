<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pointage; // Correction du nom de la classe
use App\Models\Paiment; // Correction du nom de la classe

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'Cni',
        'Nom',
        'Prenom',
        'email',
        'qrcode',
        'horaire',
        'telephone',
        'salaire',
        'cjm',
        'isAdmin',
    ];

    // Relations avec les autres modèles (s'il y en a)

    // Relation avec les pointages
    public function pointages()
    {
        return $this->hasMany(Pointage::class);
    }

    // Relation avec les paiements
    public function paiements()
    {
        return $this->hasMany(Paiment::class); // Correction du nom de la classe
    }
    public function calculerSalaire()
    {
        // Récupérer tous les pointages de l'employé
        $pointages = $this->pointages;

        // Initialiser le total du salaire
        $totalSalaire = 0;

        // Calculer le salaire pour chaque pointage
        foreach ($pointages as $pointage) {
            $heureEntree = strtotime($pointage->heure_entree);
            $heureSortie = strtotime($pointage->heure_sortie);

            // Calculer la durée travaillée en secondes
            $dureeTravail = $heureSortie - $heureEntree;

            // Convertir la durée travaillée en heures
            $heuresTravaillees = $dureeTravail / 3600; // 3600 secondes = 1 heure

            // Calculer le salaire pour ce pointage
            $salaire = $this->cjm * $heuresTravaillees;

            // Ajouter le salaire au total
            $totalSalaire += $salaire;
        }

        return $totalSalaire;
    }


}
