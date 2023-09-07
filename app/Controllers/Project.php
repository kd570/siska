<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ProjectModel;
use App\Models\AsetModel;

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
    }
    public function index()
    {
        $data['project'] = $this->pr->getAllProject();
        // dd($data);
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
        return view('project/show');
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
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
