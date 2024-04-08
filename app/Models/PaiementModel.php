<?php 

namespace App\Models;

use CodeIgniter\Model;

class PaiementModel extends Model
{
    protected $table = 'Paiement';

    protected $primaryKey = 'NumP';

    protected $allowedFields = ['NumMat', 'Montant', 'Motif', 'DateP'];

    protected $useAutoIncrement = true;
    
    protected $protectFields    = true;


    public function etudiant()
    {
        return $this->belongsTo(EtudiantModel::class, 'NumMat');
    }
}
