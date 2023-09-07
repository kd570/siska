<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\GunaModel;

class Guna extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->gn = new GunaModel;
    }
    public function index()
    {
        $data['guna'] = $this->gn->findAll();
        return view('guna/index', $data);
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
        return view('guna/new');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        $save = $this->gn->insert($data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->gn->errors());
        } else {
            return redirect()->to(site_url('guna'))->with('success', 'Data berhasil disimpan.');
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data['guna'] = $this->gn->find($id);
        return view('guna/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $save = $this->gn->update($id, $data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->gn->errors());
        } else {
            return redirect()->to(site_url('guna'))->with('success', 'Data berhasil diupdate.');
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->gn->delete($id);
        return redirect()->to(site_url('guna'))->with('success', 'Data berhasil dihapus.');
    }
}
