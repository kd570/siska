<?php

namespace App\Models;

use CodeIgniter\Model;

class SertifikatModel extends Model
{
    protected $table            = 'j_sertifikat';
    protected $primaryKey       = 'id_sertifikat';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['nama_sertifikat', 'des_sertifikat'];
    protected $useTimestamps = true;

    protected $validationRules = [
        'nama_sertifikat'   => 'required'
    ];
    protected $validationMessages = [
        'nama_sertifikat' => [
            'required' => 'Harus diisi.'
        ]
    ];
}
