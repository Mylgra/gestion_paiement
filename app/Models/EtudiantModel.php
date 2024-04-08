<?php 

namespace App\Models;

use CodeIgniter\Model;

class EtudiantModel extends Model
{
    protected $table = 'Etudiant';

    protected $primaryKey = 'NumMat';

    protected $allowedFields = ['NomEtudiant', 'Promotion'];

    protected $useAutoIncrement = true;

    protected $protectFields    = true;



    public function post()
    {
        return $this->hasMany(PaiementModel::class);
    }
}
