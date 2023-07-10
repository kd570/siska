<?php

namespace App\Models;

use CodeIgniter\Model;

class JobdeskModel extends Model
{
    protected $table            = 'jobdesk';
    protected $primaryKey       = 'id_jd';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['id_jd', 'no_jd', 'nama_jd', 'id_jb', 'des_jd', 'file_jd', 'deleted_at'];
    protected $useTimestamps = true;


    protected $validationRules = [
        'no_jd'   => 'required|min_length[3]',
        'nama_jd' => 'required',
        'id_jb' => 'required',
        'file_jd' => 'uploaded[file_jd]|max_size[file_jd,10240]|mime_in[file_jd,application/pdf]',
        // 'file_jd' => 'uploaded[file_jd]',
    ];
    protected $validationMessages = [
        'no_jd' => [
            'required' => 'Nomor jobdesk harus dipilih.',
            'min_length' => 'Nomor jobdesk minimal 3 karakter.',
        ],
        'nama_jd' => [
            'required' => 'Nama jobdesk harus diisi.',
        ],
        'id_jb' => [
            'required' => 'Jabatan harus dipilih.',
        ],
        'file_jd' => [
            'uploaded' => 'File Jobdesk harus dipilih.',
            'max_size' => 'File Jobdesk maksimal 10 Mb.',
            'mime_in' => 'File Jobdesk harus bentuk pdf.',
        ],
    ];

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
    function getAll3($id = null)
    {
        $builder = $this->db->table('jobdesk');

        $builder->join('jabatan', 'jabatan.id_jb = jobdesk.id_jb');
        $builder->join('bagian', 'bagian.id_bg = jabatan.id_bg');
        $builder->where('jobdesk.deleted_at IS NULL');
        if ($id == null) {
            $query   = $builder->get();
            return $query->getResult();
        } else {
            $builder->where('id_jd', $id);
            $query = $builder->get();
            return $query->getRow();
        }
    }
}
