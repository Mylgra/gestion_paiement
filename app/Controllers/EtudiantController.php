<?php

namespace App\Controllers;

use App\Models\EtudiantModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class EtudiantController extends BaseController
{
    public function index()
    {
        helper('form');

        $etudiants = (new EtudiantModel())->findAll();

        return view('etudiant/etudiant', compact('etudiants'));
    }

    public function voir(int $etudiant)
    {
        $etudiant = (new EtudiantModel)->where('NumMat', $etudiant)->first();

        return view('etudiant/voir', compact('etudiant'));
    }

    public function enregistrer() 
    {
        helper('form');

        $data = $this->request->getPost(['NomEtudiant', 'Promotion']);

        if (! $this->validateData($data, [
            'Promotion' => 'required',
            'NomEtudiant'  => 'required',
        ])) {
            $etudiants = (new EtudiantModel())->findAll();

        return view('etudiant/etudiant', compact('paiements', 'etudiants'));
        }

        $post = $this->validator->getValidated();

        $model = model(EtudiantModel::class);

        $model->save([
            'NomEtudiant' => $post['NomEtudiant'],
            'Promotion'  => $post['Promotion'],
        ]);

        return redirect()->route('etudiant');
    }

    public function editer(int $etudiant) 
    {
        $etudiant = (new EtudiantModel)->where('NumMat', $etudiant)->first();

        return view('etudiant/edit', compact('etudiant'));
    }

    public function update(int $etudiant)
    {
        helper('form');

        $validation = \Config\Services::validation();

        $rules = [
            'NomEtudiant' => 'required',
            'Promotion' => 'required',
        ];

        $validation->setRules($rules);
    
        if ($this->request->getMethod() === 'put') {
            $model = new EtudiantModel();

            $data = [
                'NomEtudiant' => $this->request->getPost('NomEtudiant'),
                'Promotion' => $this->request->getPost('Promotion'),
            ];

            $model->update($etudiant, $data);

            return redirect()->route('etudiant');
        } else {
            return redirect()->back()->with('error', 'Invalid request method');
        }
    }


    public function supprimer(int $etudiant)
    {
        $etudiant = (new EtudiantModel)->where('NumMat', $etudiant);

        $etudiant->delete();

        return redirect()->back();
    }
}
