<?php

namespace App\Controllers;

use Config\Database;
use App\Models\EtudiantModel;
use App\Models\PaiementModel;

class Home extends BaseController
{
    public function index(): string
    {
        $query  = Database::connect();
        $paiements = $query->table('paiement')
                        ->select('*')
                        ->join('etudiant', 'etudiant.NumMat = paiement.NumMat', 'right')
                        ->orderBy('DateP', 'DESC')
                        ->get()
                        ->getResultArray();


        return view('home', compact('paiements'));
    }


    public function search()
    {
        $q = $this->request->getPost('query');
        $query  = Database::connect();

        $paiements = $query->table('paiement')
                        ->select('*')
                        ->join('etudiant', 'etudiant.NumMat = paiement.NumMat', 'right');

        if(isset($q)) {
            $result = $paiements->like('paiement.NumMat', $q)
                ->orLike('paiement.DateP', $q)
                ->orLike('etudiant.NomEtudiant', $q)
                ->orLike('paiement.Motif', $q);
            $resultats = $result->get()->getResultArray();

            return view('recherche', compact('resultats'));
        }
        
    }
}
