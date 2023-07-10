<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table            = 'jabatan';
    protected $primaryKey       = 'id_jb';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['nama_jb', 'id_bg', 'des_jb', 'tingkatan'];
    protected $useTimestamps = true;

    function getAll()
    {
        $builder = $this->db->table('bagian');
        $builder->join('unit_kerja', 'unit_kerja.id_uk = bagian.id_uk');
        $query   = $builder->get();
        return $query->getResult();
    }
    function getAll2()
    {
        $builder = $this->db->table('jabatan');
        $builder->join('bagian', 'bagian.id_bg = jabatan.id_bg');
        $query   = $builder->get();
        return $query->getResult();
    }
}
