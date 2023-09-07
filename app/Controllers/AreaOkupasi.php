<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\OkupasiModel;
use App\Models\UnitKerjaModel;
use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\Validation\StrictRules\Rules;


class AreaOkupasi extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    private $db;
    public function __construct()
    {
        $this->ao = new OkupasiModel();
        $this->uk = new UnitKerjaModel;
    }
    public function index()
    {
        $data['area_okupasi'] = $this->ao->getAllOkupasi();
        // dd($data);
        return view('area_okupasi/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $id_decript = encrypt_decrypt('decrypt', $id);
        $data['okupasi'] = $this->ao->getAllOkupasi($id_decript);
        // $data['area_okupasi'] = $this->ao->getAllOkupasi();
        // dd($data);
        return view('area_okupasi/show', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data['unit_kerja'] = $this->uk->findAll();
        $data['guna'] = $this->ao->getGuna();
        $data['j_sertifikat'] = $this->ao->getSertifikat();
        $data['provinsi'] = $this->ao->getProvinsi();
        return view('area_okupasi/new', $data);
    }

    public function get_kota()
    {
        $id_provinsi = $this->request->getPost('id_provinsi');
        $data = $this->ao->getKota($id_provinsi);
        echo json_encode($data);
    }

    public function get_kecamatan()
    {
        $id_kota = $this->request->getPost('id_kota');
        $data2 = $this->ao->getKecamatan($id_kota);
        echo json_encode($data2);
    }
    public function get_kelurahan()
    {
        $id_kecamatan = $this->request->getPost('id_kecamatan');
        $data3 = $this->ao->getKelurahan($id_kecamatan);
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
            'nama_okupasi' => $this->request->getPost('nama_okupasi'),
            'nama_okupan' => $this->request->getPost('nama_okupan'),
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
            'luas_okupasi' => $this->request->getPost('luas_okupasi'),
            'des_okupasi' => $this->request->getPost('des_okupasi'),
            'gambar' => $namafilegambar,
            'file' => $namafilegeo,
        ];
        // dd($data);
        $save = $this->ao->insert($data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->ao->errors());
        } else {
            if ($files = $this->request->getFiles()) {
                $idPost = $this->ao->insertId();
                foreach ($files['file_gambar'] as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $file->move('upload/okupasi/' . $idPost . '/file_gambar/');
                    }
                }
                foreach ($files['file_geo'] as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $file->move('upload/okupasi/' . $idPost . '/file_geo/');
                    }
                }
            }
            return redirect()->to(site_url('areaokupasi'))->with('success', 'Data berhasil disimpan.');
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
        $okupasi = $this->ao->find($id_decript);
        if (is_object($okupasi)) {
            $data['okupasi'] = $okupasi;
            $data['unit'] = $this->uk->findAll();
            $data['provinsi'] = $this->ao->getProvinsi();
            $data['kota'] = $this->ao->getKota2($data['okupasi']->provinsi);
            $data['kecamatan'] = $this->ao->getKecamatan2($data['okupasi']->kota);
            $data['kelurahan'] = $this->ao->getKelurahan2($data['okupasi']->kecamatan);
            $data['guna'] = $this->ao->getGuna();
            $data['j_sertifikat'] = $this->ao->getSertifikat();
            $namafilegambar = explode(',', $data['okupasi']->gambar);
            $namafilegeo = explode(',', $data['okupasi']->file);
            $data['namafilegambar'] = $namafilegambar;
            $data['namafilegeo'] = $namafilegeo;
            return view('area_okupasi/edit', $data);
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
            'nama_okupasi' => $this->request->getPost('nama_okupasi'),
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
            'des_okupasi' => $this->request->getPost('des_okupasi')
        ];
        if ($namafilegambar != null) {
            $data['gambar'] = $namafilegambar;
            foreach ($files['file_gambar'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $file->move('upload/okupasi/' . $id_decript . '/file_gambar/');
                }
            }
        }
        if ($namafilegeo != null) {
            $data['file'] = $namafilegeo;
            foreach ($files['file_geo'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $file->move('upload/okupasi/' . $id_decript . '/file_geo/');
                }
            }
        }
        $update = $this->ao->update($id_decript, $data);
        if (!$update) {
            return redirect()->back()->withInput()->with('errors', $this->ao->errors());
        } else {
            return redirect()->to(site_url('areaokupasi'))->with('success', 'Data berhasil diupdate.');
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
        $this->ao->delete($id_decript);
        return redirect()->to(site_url('areaokupasi'))->with('success', 'Data berhasil dihapus.');
    }
}
