<?php

namespace App\Models;

use CodeIgniter\Model;

class GunaModel extends Model
{
    protected $table            = 'guna_lahan';
    protected $primaryKey       = 'id_guna';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['nama_guna', 'des_guna'];
    protected $useTimestamps = true;

    protected $validationRules = [
        'nama_guna'   => 'required'
    ];
    protected $validationMessages = [
        'nama_guna' => [
            'required' => 'Harus diisi.'
        ]
    ];
}
