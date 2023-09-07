<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SertifikatModel;

class Sertifikat extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->sr = new SertifikatModel();
    }
    public function index()
    {
        $data['sertifikat'] = $this->sr->findAll();
        return view('sertifikat/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('sertifikat/new');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        $save = $this->sr->insert($data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->sr->errors());
        } else {
            return redirect()->to(site_url('sertifikat'))->with('success', 'Data berhasil disimpan.');
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data['sertifikat'] = $this->sr->find($id);
        return view('sertifikat/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $save = $this->sr->update($id, $data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->sr->errors());
        } else {
            return redirect()->to(site_url('sertifikat'))->with('success', 'Data berhasil diupdate.');
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->sr->delete($id);
        return redirect()->to(site_url('sertifikat'))->with('success', 'Data berhasil dihapus.');
    }
}
