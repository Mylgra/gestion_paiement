<?php
// app/Controllers/PaiementController.php

namespace App\Controllers;

use Config\Database;
use CodeIgniter\Controller;
use App\Models\EtudiantModel;
use App\Models\PaiementModel;

class PaiementController extends Controller
{

    public function index() 
    {
        helper('form');
        $query  = Database::connect();
        $students = $query->table('paiement')
                        ->select('*')
                        ->join('etudiant', 'etudiant.NumMat = paiement.NumMat', 'right')
                        ->orderBy('DateP', 'DESC')
                        ->get()
                        ->getResultArray();

        $etudiants = (new EtudiantModel())->findAll();

        $students;

        return view('paiement/paiement', compact('students', 'etudiants'));
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


    public function editer(int $payer)
    {
        helper('form');
        $paiement = (new PaiementModel)->where('NumMat', $payer)->first();
        $etudiants = (new EtudiantModel())->findAll();


        return view('paiement/edit', compact('paiement', 'etudiants'));
    }

    public function update(int $paiement)
    {
        helper('form');

        $validation = \Config\Services::validation();

        $rules = [
            'NumMat' => 'required',
            'Montant'  => 'required',
            'Motif'  => 'required',
            'DateP'  => 'required',
        ];

        $validation->setRules($rules);
    
        if ($this->request->getMethod() === 'put') {
            $model = new PaiementModel();

            $data = [
                'NumMat' => $this->request->getPost('NumMat'),
                'Montant' => $this->request->getPost('Montant'),
                'Motif' => $this->request->getPost('Motif'),
                'DateP' => $this->request->getPost('DateP'),
            ];

            $model->update($paiement, $data);

            return redirect()->route('paiement');
        } else {
            return redirect()->back()->with('error', 'Invalid request method');
        }
    }


    public function supprimer(int $paiement)
    {
        
        $query = (new PaiementModel)->where('NumP', $paiement)->first();

    
        $query->delete($paiement);

        return redirect()->back();
    }
}
