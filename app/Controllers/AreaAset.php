<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\AsetModel;
use App\Models\UnitKerjaModel;
use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\Validation\StrictRules\Rules;


class AreaAset extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    private $db;
    public function __construct()
    {
        $this->aa = new AsetModel();
        $this->uk = new UnitKerjaModel;
    }
    public function index()
    {
        $data['area_aset'] = $this->aa->getAllAset();
        // dd($data);
        return view('area_aset/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $id_decript = encrypt_decrypt('decrypt', $id);
        $data['aset'] = $this->aa->getAllAset($id_decript);
        // dd($data);
        return view('area_aset/show', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data['unit_kerja'] = $this->uk->findAll();
        $data['guna'] = $this->aa->getGuna();
        $data['j_sertifikat'] = $this->aa->getSertifikat();
        $data['provinsi'] = $this->aa->getProvinsi();
        return view('area_aset/new', $data);
    }

    public function get_kota()
    {
        $id_provinsi = $this->request->getPost('id_provinsi');
        $data = $this->aa->getKota($id_provinsi);
        echo json_encode($data);
    }

    public function get_kecamatan()
    {
        $id_kota = $this->request->getPost('id_kota');
        $data2 = $this->aa->getKecamatan($id_kota);
        echo json_encode($data2);
    }
    public function get_kelurahan()
    {
        $id_kecamatan = $this->request->getPost('id_kecamatan');
        $data3 = $this->aa->getKelurahan($id_kecamatan);
        echo json_encode($data3);
    }


    public function create()
    {
        $filegambar = array();
        $filegeo = array();
        if ($files = $this->request->getFiles()) {
            foreach ($files['file_gambar'] as $file) {
                $filegambar[] = $file->getName();
            }
            foreach ($files['file_geo'] as $file) {
                $filegeo[] = $file->getName();
            }
        }
        $namafilegambar = implode(',', $filegambar);
        $namafilegeo = implode(',', $filegeo);

        $data = [
            'nama_aset' => $this->request->getPost('nama_aset'),
            'nama_pemilik' => $this->request->getPost('nama_pemilik'),
            'id_uk' => $this->request->getPost('id_uk'),
            'provinsi' => $this->request->getPost('provinsi'),
            'kota' => $this->request->getPost('kota'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kelurahan' => $this->request->getPost('kelurahan'),
            'j_sertifikat' => $this->request->getPost('j_setifikat'),
            'no_sertifikat' => $this->request->getPost('no_sertifikat'),
            'tgl_terbit' => $this->request->getPost('tgl_terbit'),
            'tgl_expire' => $this->request->getPost('tgl_expire'),
            'guna' => $this->request->getPost('guna'),
            'luas' => $this->request->getPost('luas'),
            'des_aset' => $this->request->getPost('des_aset'),
            'gambar' => $namafilegambar,
            'file' => $namafilegeo,
        ];
        $save = $this->aa->insert($data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->aa->errors());
        } else {
            if ($files = $this->request->getFiles()) {
                $idPost = $this->aa->insertId();
                foreach ($files['file_gambar'] as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $file->move('upload/aset/' . $idPost . '/file_gambar/');
                    }
                }
                foreach ($files['file_geo'] as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $file->move('upload/aset/' . $idPost . '/file_geo/');
                    }
                }
            }
            return redirect()->to(site_url('areaaset'))->with('success', 'Data berhasil disimpan.');
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $id_decript = encrypt_decrypt('decrypt', $id);
        $aset = $this->aa->find($id_decript);
        if (is_object($aset)) {
            $data['aset'] = $aset;
            $data['unit'] = $this->uk->findAll();
            $data['provinsi'] = $this->aa->getProvinsi();
            $data['kota'] = $this->aa->getKota2($data['aset']->provinsi);
            $data['kecamatan'] = $this->aa->getKecamatan2($data['aset']->kota);
            $data['kelurahan'] = $this->aa->getKelurahan2($data['aset']->kecamatan);
            $data['guna'] = $this->aa->getGuna();
            $data['j_sertifikat'] = $this->aa->getSertifikat();
            $namafilegambar = explode(',', $data['aset']->gambar);
            $namafilegeo = explode(',', $data['aset']->file);
            $data['namafilegambar'] = $namafilegambar;
            $data['namafilegeo'] = $namafilegeo;
            return view('area_aset/edit', $data);
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
        $id_decript = encrypt_decrypt('decrypt', $id);
        $filegambar = array();
        $filegeo = array();
        if ($files = $this->request->getFiles()) {
            foreach ($files['file_gambar'] as $file) {
                $filegambar[] = $file->getName();
            }
            foreach ($files['file_geo'] as $file) {
                $filegeo[] = $file->getName();
            }
        }
        $namafilegambar = implode(',', $filegambar);
        $namafilegeo = implode(',', $filegeo);
        $data = [
            'nama_aset' => $this->request->getPost('nama_aset'),
            'nama_pemilik' => $this->request->getPost('nama_pemilik'),
            'id_uk' => $this->request->getPost('id_uk'),
            'provinsi' => $this->request->getPost('provinsi'),
            'kota' => $this->request->getPost('kota'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kelurahan' => $this->request->getPost('kelurahan'),
            'j_sertifikat' => $this->request->getPost('j_setifikat'),
            'no_sertifikat' => $this->request->getPost('no_sertifikat'),
            'tgl_terbit' => $this->request->getPost('tgl_terbit'),
            'tgl_expire' => $this->request->getPost('tgl_expire'),
            'guna' => $this->request->getPost('guna'),
            'luas' => $this->request->getPost('luas'),
            'des_aset' => $this->request->getPost('des_aset'),
        ];
        if ($namafilegambar != null) {
            $data['gambar'] = $namafilegambar;
            foreach ($files['file_gambar'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $file->move('upload/aset/' . $id_decript . '/file_gambar/');
                }
            }
        }
        if ($namafilegeo != null) {
            $data['file'] = $namafilegeo;
            foreach ($files['file_geo'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $file->move('upload/aset/' . $id_decript . '/file_geo/');
                }
            }
        }
        $update = $this->aa->update($id_decript, $data);
        if (!$update) {
            return redirect()->back()->withInput()->with('errors', $this->aa->errors());
        } else {
            return redirect()->to(site_url('areaaset'))->with('success', 'Data berhasil diupdate.');
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
        $this->aa->delete($id_decript);
        return redirect()->to(site_url('areaaset'))->with('success', 'Data berhasil dihapus.');
    }
}
