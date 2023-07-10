<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitKerjaModel extends Model
{
    protected $table            = 'unit_kerja';
    protected $primaryKey       = 'id_uk';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['nama_uk', 'koordinat', 'alamat', 'des_uk',];
    protected $useTimestamps = true;

    function total_uk()
    {
        $builder = $this->db->table('unit_kerja');
        if ($builder->countAll() > 0) {
            return $builder->countAll();
        } else {
            return 0;
        }
    }
}
