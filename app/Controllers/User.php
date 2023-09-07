<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UnitKerjaModel;
use App\Models\BagianModel;
use App\Models\JabatanModel;
use App\Models\JobdeskModel;
use App\Models\UserModel;
// use App\Libraries\DataTables;

class User extends ResourceController
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
        $this->jd = new JobdeskModel;
        $this->us = new UserModel;
        // $this->dt = new DataTables;
        // $this->validation =  \Config\Services::validation();


        // $this->request = \Config\Services::request();
        // $file = new \CodeIgniter\Files\File($path);
    }
    public function index()
    {
        $data['users'] = $this->us->getAll2();
        return view('user/index', $data);
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
        return view('user/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        $save = $this->us->insert($data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->us->errors());
        } else {
            $pass = password_hash(($this->request->getPost('password_user')), PASSWORD_BCRYPT);
            $param = [
                'id_user'       => $this->us->getInsertID(),
                'password_user' => $pass
            ];
            $this->us->save($param);
            return redirect()->to(site_url('user'))->with('success', 'Data berhasil disimpan.');
        }
    }

    public function edit($id = null)
    {
        $id_decript = encrypt_decrypt('decrypt', $id);
        $user = $this->us->where('id_user', $id_decript)->first();
        if (is_object($user)) {
            $data['user'] = $user;
            $data['bagian'] = $this->bg->findAll();
            // dd($data);
            return view('user/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        // dd($data);
        $this->us->Update($id, $data);
        return redirect()->to(site_url('user'))->with('success', 'Data berhasil diupdate.');
    }

    public function delete($id = null)
    {
        $this->us->delete($id);
        return redirect()->to(site_url('user'))->with('success', 'Data berhasil dihapus.');
    }

    public function reset_pass($id = null)
    {
        $data['password_user'] = password_hash('123456', PASSWORD_BCRYPT);
        $this->us->Update($id, $data);
        return redirect()->to(site_url('user'))->with('success', 'Password berhasil di reset menjadi 123456.');
    }
}
