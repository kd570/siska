<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ProjectModel;
use App\Models\AsetModel;

use function PHPUnit\Framework\objectHasAttribute;

class Project extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->pr = new ProjectModel();
        $this->aa = new AsetModel();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data['project'] = $this->pr->getAllProject();
        $data['aset'] = $this->aa->findAll();

        return view('project/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $id_decript = encrypt_decrypt('decrypt', $id);
        $data['aset'] = $this->aa->findAll();
        $data['project'] = $this->pr->getAllProject($id_decript);
        $data['milestones'] = $this->pr->getMilestones($id_decript);
        // dd($data);
        return view('project/show', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules(
            [
                'nama_project'   => 'required',
                'jenis_project'   => 'required',
                'id_aset'   => 'required',
                'des_project' => 'required',
                'start_project' => 'required',
                'end_project' => 'required',
                'status_project' => 'required',
            ],
            [
                'nama_project' => [
                    'required' => 'Project title harus diisi.'
                ],
                'jenis_project' => [
                    'required' => 'jenis project harus dipilih.'
                ],
                'id_aset' => [
                    'required' => 'Aset harus dipilih.'
                ],
                'des_project' => [
                    'required' => 'Deskripsi project harus diisi.'
                ],
                'start_project' => [
                    'required' => 'Start date harus diisi.'
                ],
                'end_project' => [
                    'required' => 'Deadline harus diisi.'
                ],
                'status_project' => [
                    'required' => 'Status harus dipilih.'
                ],
            ]
        );
        $startDate = $this->request->getPost('start_project');
        $endDate = $this->request->getPost('end_project');
        if ($endDate <= $startDate) {
            $validation->setError('end_project', 'Deadline harus diatas start date.');
        }
        $data = [
            'nama_project' => $this->request->getPost('nama_project'),
            'jenis_project' => $this->request->getPost('jenis_project'),
            'id_aset' => $this->request->getPost('id_aset'),
            'des_project' => $this->request->getPost('des_project'),
            'start_project' => $this->request->getPost('start_project'),
            'end_project' => $this->request->getPost('end_project'),
            'status_project' => $this->request->getPost('status_project'),
            'created_by' => userLogin()->id_user
        ];
        if ($validation->run($data)) {
            $this->pr->insert($data);
            return redirect()->to(site_url('project'))->with('success', 'Data berhasil disimpan.');
        } else {
            $errors = $validation->getErrors();
            return redirect()->to(site_url('project'))->withInput()->with('errors', $errors);
        }
    }

    public function create_project_m()
    {
        $validation = \Config\Services::validation();
        $validation->setRules(
            [
                'nama_project_m' => 'required',
                'des_project_m' => 'required',
                'start_project_m' => 'required',
                'end_project_m' => 'required',
            ],
            [   // Errors
                'nama_project_m' => [
                    'required' => 'Title milestone harus diisi.',
                ],
                'des_project_m' => [
                    'required' => 'Deskripsi milestone harus diisi.',
                ],
                'start_project_m' => [
                    'required' => 'Start date harus diisi.',
                ],
                'end_project_m' => [
                    'required' => 'Deadline harus diisi.'
                ],
            ]
        );
        $startDate = $this->request->getPost('start_project_m');
        $endDate = $this->request->getPost('end_project_m');
        if ($endDate <= $startDate) {
            $validation->setError('end_project_m', 'Deadline harus diatas start date.');
        }
        $data = [
            'nama_project_m' => $this->request->getPost('nama_project_m'),
            'id_project' => $this->request->getPost('id_project'),
            'des_project_m' => $this->request->getPost('des_project_m'),
            'start_project_m' => $startDate,
            'end_project_m' => $endDate,
            'created_by' => userLogin()->id_user
        ];
        $idproject = $this->request->getPost('id_project');
        if ($validation->run($data)) {
            $builder = $this->db->table('p_milestones');
            $builder->insert($data);
            return redirect()->to(site_url('project/' . encrypt_decrypt('encrypt', $idproject) . '/show'))->with('success1', 'Data berhasil ditambah.');
        } else {
            $errors1 = $validation->getErrors();
            // dd($errors1);
            return redirect()->to(site_url('project/' . encrypt_decrypt('encrypt', $idproject) . '/show'))->withInput()->with('errors1', $errors1);
        }
    }

    public function create_project_t()
    {

        $data = [
            'nama_project' => $this->request->getPost('nama_project'),
            'jenis_project' => $this->request->getPost('jenis_project'),
            'id_aset' => $this->request->getPost('id_aset'),
            'des_project' => $this->request->getPost('des_project'),
            'start_project' => $this->request->getPost('start_project'),
            'end_project' => $this->request->getPost('end_project'),
            'status_project' => $this->request->getPost('status_project'),
            'created_by' => userLogin()->id_user
        ];
        dd($data);
        $save = $this->pr->insert($data);
        if (!$save) {
            return redirect()->to(site_url('project'))->withInput()->with('errors', $this->pr->errors());
        } else {
            return redirect()->to(site_url('project'))->with('success', 'Data berhasil disimpan.');
        }
    }
    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $id_decript = encrypt_decrypt('decrypt', $id);
        $data = [
            'nama_project' => $this->request->getPost('nama_project'),
            'jenis_project' => $this->request->getPost('jenis_project'),
            'id_aset' => $this->request->getPost('id_aset'),
            'des_project' => $this->request->getPost('des_project'),
            'start_project' => $this->request->getPost('start_project'),
            'end_project' => $this->request->getPost('end_project'),
            'status_project' => $this->request->getPost('status_project'),
        ];
        // dd($data);
        $save = $this->pr->update($id_decript, $data);
        if (!$save) {
            return redirect()->to(site_url('project'))->withInput()->with('errors', $this->pr->errors());
        } else {
            return redirect()->to(site_url('project/' . $id . '/show'))->with('success', 'Data berhasil diupdate.');
        }
    }

    public function upd_p_milestone($id = null)
    {
        $id_decript = encrypt_decrypt('decrypt', $id);
        $validation = \Config\Services::validation();
        $validation->setRules(
            [
                'nama_project_m' => 'required',
                'des_project_m' => 'required',
                'start_project_m' => 'required',
                'end_project_m' => 'required',
            ],
            [   // Errors
                'nama_project_m' => [
                    'required' => 'Title milestone harus diisi.',
                ],
                'des_project_m' => [
                    'required' => 'Deskripsi milestone harus diisi.',
                ],
                'start_project_m' => [
                    'required' => 'Start date harus diisi.',
                ],
                'end_project_m' => [
                    'required' => 'Deadline harus diisi.'
                ],
            ]
        );
        $startDate = $this->request->getPost('start_project_m');
        $endDate = $this->request->getPost('end_project_m');
        if ($endDate <= $startDate) {
            $validation->setError('end_project_m', 'Deadline harus diatas start date.');
        }
        $data = [
            'nama_project_m' => $this->request->getPost('nama_project_m'),
            'des_project_m' => $this->request->getPost('des_project_m'),
            'start_project_m' => $this->request->getPost('start_project_m'),
            'end_project_m' => $this->request->getPost('end_project_m'),
        ];
        // dd($data);
        $idproject = $this->request->getPost('id_project');
        if ($validation->run($data)) {
            $builder = $this->db->table('p_milestones');
            $builder->where('id_project_m', $id_decript);
            $builder->update($data);
            return redirect()->to(site_url('project/' . encrypt_decrypt('encrypt', $idproject) . '/show'))->with('success1', 'Data berhasil diupdate.');
        } else {
            $errors1 = $validation->getErrors();
            return redirect()->to(site_url('project/' . encrypt_decrypt('encrypt', $idproject) . '/show'))->withInput()->with('errors1', $errors1);
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $id_decript = encrypt_decrypt('decrypt', $id);
        $this->pr->delete($id_decript);
        return redirect()->to(site_url('project'))->with('success', 'Data berhasil dihapus.');
    }

    public function del_p_milestone($id = null)
    {
        $id_decript = encrypt_decrypt('decrypt', $id);
        $builder = $this->db->table('p_milestones')->select('id_project_m , id_project')->where('id_project_m', $id_decript);
        $data =  $builder->get()->getRow();

        $this->db->table('p_milestones')->where('id_project_m', $id_decript)->delete();
        return redirect()->to(site_url('project/' . encrypt_decrypt('encrypt', $data->id_project) . '/show'))->with('success1', 'Data berhasil dihapus.');
    }
}
