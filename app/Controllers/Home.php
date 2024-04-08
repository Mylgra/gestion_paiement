<?php

namespace App\Controllers;

use App\Models\EtudiantModel;
use App\Models\PaiementModel;

class Home extends BaseController
{
    public function index(): string
    {
        $etudiants = (new EtudiantModel())->findAll();

        return view('home', compact('etudiants'));
    }


    public function parDate()
    {
        $query = $this->request->getGet('query');

    dd($query);

        $paiements = (new PaiementModel)->where('DateP', $query)->findAll();
    }

    public function parEtudiant()
    {
        $query = $this->request->getGet('NomEtudiant');

        dd($query);

        $paiements = (new EtudiantModel)->where('NomEtudiant', $query)->findAll();

        dd($paiements);
    }

    public function parPromotion()
    {
        $query = $this->request->getGet('Promotion');

        dd($query);

        $paiements = (new EtudiantModel)->where('Promotion', $query)->findAll();

        dd($paiements);
    }
}
