<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UnitKerjaModel;

class UnitKerja extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->uk = new UnitKerjaModel;
        // $this->subjenis = new Crud3Model;
    }
    public function index()
    {
        $data['unit_kerja'] = $this->uk->findAll();
        return view('unitkerja/index', $data);
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
        return view('unitkerja/new');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        $this->uk->Insert($data);
        return redirect()->to(site_url('unitkerja'))->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $unitkerja = $this->uk->find($id);
        if (is_object($unitkerja)) {
            $data['unitkerja'] = $unitkerja;
            // $data['jenis'] = $this->jenis->findAll();
            // dd($data);
            return view('unitkerja/edit', $data);
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
        $this->uk->Update($id, $data);
        return redirect()->to(site_url('unitkerja'))->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->uk->delete($id);
        return redirect()->to(site_url('unitkerja'))->with('success', 'Data berhasil dihapus.');
    }
}
