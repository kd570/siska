<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UnitKerjaModel;
use App\Models\BagianModel;
use App\Models\jabatanModel;

class Jabatan extends ResourceController
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
        $this->jb = new JabatanModel;
    }
    public function index()
    {
        $data['jabatan'] = $this->jb->getAll2();
        return view('jabatan/index', $data);
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
        $data['bagian'] = $this->bg->findAll();
        return view('jabatan/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        // dd($data);
        $this->jb->Insert($data);
        return redirect()->to(site_url('jabatan'))->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $jabatan = $this->jb->find($id);
        if (is_object($jabatan)) {
            $data['jabatan'] = $jabatan;
            $data['bagian'] = $this->bg->findAll();
            // dd($data);
            return view('jabatan/edit', $data);
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
        $this->jb->update($id, $data);
        return redirect()->to(site_url('jabatan'))->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->jb->delete($id);
        return redirect()->to(site_url('jabatan'))->with('success', 'Data berhasil dihapus.');
    }
}
