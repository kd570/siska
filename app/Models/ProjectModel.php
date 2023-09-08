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

    function getAllProject($id = null)
    {
        $builder = $this->db->table('project');
        $builder->select('*');
        $builder->join('area_aset', 'area_aset.id_aset = project.id_aset');
        if ($id != null) {
            $builder->where('project.id_project', $id);
            $query   = $builder->get();
            return $query->getRow();
        } else {
            $query   = $builder->get();
            return $query->getResult();
        }
    }
    function getMilestones($id = null)
    {
        $builder = $this->db->table('p_milestones');
        $builder->select('*');
        $builder->join('project', 'project.id_project = p_milestones.id_project');
        if ($id != null) {
            $builder->where('project.id_project', $id);
            $query   = $builder->get();
            return $query->getResult();
        } else {
            $query   = $builder->get();
            return $query->getResult();
        }
    }
    function del_p_milestone($id = null)
    {
        $builder = $this->db->table('p_milestones');
        $builder->where('id_project_m', $id);
        $builder->delete();
    }
}
