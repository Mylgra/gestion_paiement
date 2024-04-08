<?php
// app/Controllers/ConsultationController.php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PaiementModel;

class ConsultationController extends Controller
{
    public function parEtudiant($numMat)
    {
        $paiementModel = new PaiementModel();
        $paiements = $paiementModel->where('NumMat', $numMat)->findAll();
        
        // Charger la vue pour afficher les paiements par étudiant
        return view('consultation/par_etudiant', ['paiements' => $paiements]);
    }

    public function parPromotion($promotion)
    {
        $paiementModel = new PaiementModel();
        $paiements = $paiementModel->select('*')
                                   ->join('Etudiant', 'Etudiant.NumMat = Paiement.NumMat')
                                   ->where('Promotion', $promotion)
                                   ->findAll();
        
        // Charger la vue pour afficher les paiements par promotion
        return view('consultation/par_promotion', ['paiements' => $paiements]);
    }

    public function parDate($date)
    {
        $paiementModel = new PaiementModel();
        $paiements = $paiementModel->where('DateP', $date)->findAll();
        
        // Charger la vue pour afficher les paiements par date
        return view('consultation/par_date', ['paiements' => $paiements]);
    }
}
