<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UnitKerjaModel;
use App\Models\BagianModel;

class Bagian extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->uk = new UnitKerjaModel;
        $this->bg = new BagianModel;
    }
    public function index()
    {
        $data['bagian'] = $this->bg->getAll();
        return view('bagian/index', $data);
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
        $data['unitkerja'] = $this->uk->findAll();
        return view('bagian/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        $this->bg->Insert($data);
        return redirect()->to(site_url('bagian'))->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $bagian = $this->bg->find($id);
        if (is_object($bagian)) {
            $data['bagian'] = $bagian;
            $data['unitkerja'] = $this->uk->findAll();
            // dd($data);
            return view('bagian/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->bg->update($id, $data);
        return redirect()->to(site_url('bagian'))->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->bg->delete($id);
        return redirect()->to(site_url('bagian'))->with('success', 'Data berhasil dihapus.');
    }
}
