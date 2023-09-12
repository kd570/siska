<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table            = 'project';
    protected $primaryKey       = 'id_project';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['nama_project', 'id_aset', 'jenis_project', 'des_project', 'start_project', 'end_project', 'status_project', 'progres_project', 'file_project', 'tim_project', 'project.created_by'];
    protected $useTimestamps = true;

    function getAllProject($id = null)
    {
        $builder = $this->db->table('project');
        $builder->select('project.id_project, nama_project, nama_aset, project.id_aset, jenis_project, des_project, start_project, end_project, status_project, progres_project, file_project, tim_project, project.created_by, p_milestones.id_project_m');
        $builder->join('area_aset', 'area_aset.id_aset = project.id_aset');
        $builder->join('p_milestones', 'p_milestones.id_project = project.id_project', 'left');
        if ($id != null) {
            $builder->where('project.id_project', $id);
            $query   = $builder->get();
            return $query->getRow();
        } else {
            $builder->groupBy('project.id_project');
            return $builder->get()->getResult();
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
            // $builder->groupBy('p_milestones.id_project_m');
            $query   = $builder->get();
            return $query->getResult();
        }
    }
    function getTasks($id = null)
    {
        $builder = $this->db->table('p_task');
        $builder->select('*');
        $builder->join('project', 'project.id_project = p_task.id_project');
        $builder->join('p_milestones', 'p_milestones.id_project_m = p_task.id_project_m', 'left');
        if ($id != null) {
            $builder->where('p_task.id_project', $id);
            $query   = $builder->get();
            return $query->getResult();
        } else {
            $query   = $builder->get();
            return $query->getResult();
        }
    }
    function getTaskDetail($id_project, $id_project_m)
    {
        $builder = $this->db->table('p_task');
        $builder->select('*');
        $builder->where('id_project', array('id_project' => $id_project));
        $builder->where(array('id_project_m', 'id_project_m' => $id_project_m));
        return $builder->get()->getResultArray();
    }
    function del_p_milestone($id = null)
    {
        $builder = $this->db->table('p_milestones');
        $builder->where('id_project_m', $id);
        $builder->delete();
    }
}
