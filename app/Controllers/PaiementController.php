<?php
// app/Controllers/PaiementController.php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EtudiantModel;
use App\Models\PaiementModel;

class PaiementController extends Controller
{

    public function index() 
    {
        helper('form');

        $paiements = (new PaiementModel())->findAll();
        $etudiants = (new EtudiantModel())->findAll();

        return view('paiement/paiement', compact('paiements', 'etudiants'));
    }

    public function enregistrer()
    {
        helper('form');

        $data = $this->request->getPost(['NumMat', 'Montant', 'Motif', 'DateP']);

        if (! $this->validateData($data, [
            'NumMat' => 'required',
            'Montant'  => 'required',
            'Motif'  => 'required',
            'DateP'  => 'required',
        ])) {
            $paiements = (new PaiementModel())->findAll();
            $etudiants = (new EtudiantModel())->findAll();

        return view('paiement/paiement', compact('paiements', 'etudiants'));
        }

        $post = $this->validator->getValidated();

        $model = model(PaiementModel::class);

        $model->save([
            'NumMat' => trim($post['NumMat']),
            'Montant'  => trim($post['Montant']),
            'Motif'  => trim($post['Motif']),
            'DateP'  => trim($post['DateP']),
        ]);

        return redirect()->route('paiement');
    }
}
