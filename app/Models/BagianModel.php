<?php

namespace App\Models;

use CodeIgniter\Model;

class BagianModel extends Model
{
    protected $table            = 'bagian';
    protected $primaryKey       = 'id_bg';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['nama_bg', 'des_bg', 'id_uk'];
    protected $useTimestamps = true;

    function getAll()
    {
        $builder = $this->db->table('bagian');
        $builder->join('unit_kerja', 'unit_kerja.id_uk = bagian.id_uk');
        $query   = $builder->get();
        return $query->getResult();
    }
}
