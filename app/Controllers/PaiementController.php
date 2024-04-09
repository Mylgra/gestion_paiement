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
            $query  = Database::connect();
            $students = $query->table('paiement')
                        ->select('*')
                        ->join('etudiant', 'etudiant.NumMat = paiement.NumMat', 'right')
                        ->orderBy('DateP', 'DESC')
                        ->get()
                        ->getResultArray();
            $etudiants = (new EtudiantModel())->findAll();

        return view('paiement/paiement', compact('students', 'etudiants'));
        }

        $post = $this->validator->getValidated();

        $model = model(PaiementModel::class);

        $model->save([
            'NumMat' => $post['NumMat'],
            'Montant'  => $post['Montant'],
            'Motif'  => $post['Motif'],
            'DateP'  => $post['DateP'],
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


    public function supprimer(int $query)
    {
        
        $result = new PaiementModel();

        $etudiant = new EtudiantModel();

    
        $paiement = $result->find($query);

        $resultat = $etudiant->where('NumMat', $paiement['NumMat'])->delete();

        if ($paiement) {

            $result->delete($query);

            // Redirect to a success page or display a success message
            return redirect()->to(site_url('paiement'))->with('success', 'Paiement deleted successfully.');
        } else {
            // Redirect to an error page or display an error message
            return redirect()->to(site_url('paiement'))->with('error', 'Paiement not found.');
        }

        return redirect()->back();
    }
}
