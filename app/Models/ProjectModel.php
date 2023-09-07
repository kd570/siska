<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table            = 'project';
    protected $primaryKey       = 'id_project';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['nama_project', 'id_aset', 'jenis_project', 'des_project', 'start_project', 'end_project', 'status_project', 'progres_project', 'gambar', 'file_project', 'tim_project', 'created_by'];
    protected $useTimestamps = true;

    protected $validationRules = [
        'nama_project'   => 'required',
        'jenis_project'   => 'required',
        'id_aset'   => 'required',
        'des_project' => 'required',
        'start_project' => 'required',
        'end_project' => 'required',
        'status_project' => 'required',
    ];
    protected $validationMessages = [
        'nama_project' => [
            'required' => '%s harus diisi.'
        ],
        'jenis_project' => [
            'required' => 'haris dipilih.'
        ],
        'id_aset' => [
            'required' => 'Nama pemilik harus diisi.'
        ],
        'des_project' => [
            'required' => '%s harus diisi.'
        ],
        'start_project' => [
            'required' => 'Tanggal sertifikat harus diisi.'
        ],
        'end_project' => [
            'required' => 'Tanggal berakhir sertifikat harus diisi.'
        ],
        'status_project' => [
            'required' => 'Pengstatus_projectan area harus dipilih.'
        ],
    ];

    function getAllProject($id = null)
    {
        $builder = $this->db->table('project');
        $builder->select('*');
        $builder->join('area_aset', 'area_aset.id_aset = project.id_aset');
        if ($id != null) {
            $builder->where('area_aset.id_aset', $id);
            $query   = $builder->get();
            return $query->getRow();
        } else {
            $query   = $builder->get();
            return $query->getResult();
        }
    }
}
