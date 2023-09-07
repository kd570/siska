<?php

namespace App\Models;

use CodeIgniter\Model;

class OkupasiModel extends Model
{
    protected $table            = 'area_okupasi';
    protected $primaryKey       = 'id_okupasi';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['nama_okupasi', 'nama_okupan', 'id_uk', 'provinsi', 'kota', 'kecamatan', 'kelurahan', 'j_sertifikat', 'no_sertifikat', 'tgl_terbit', 'tgl_expire', 'guna', 'luas_okupasi', 'des_okupasi', 'gambar', 'file'];
    protected $useTimestamps = true;

    protected $validationRules = [
        'nama_okupasi'   => 'required',
        'nama_okupan'   => 'required',
        'id_uk'   => 'required',
        'provinsi' => 'required',
        'kota' => 'required',
        'kecamatan' => 'required',
        'kelurahan' => 'required',
        'j_sertifikat' => 'required',
        'no_sertifikat' => 'required',
        'tgl_terbit' => 'required',
        'tgl_expire' => 'required',
        'guna' => 'required',
        'luas_okupasi' => 'required',
        // 'file_gambar' => 'required',
        // 'file_geo' => 'required',
    ];
    protected $validationMessages = [
        'nama_okupasi' => [
            'required' => 'Nama area okupasi harus diisi.'
        ],
        'nama_okupan' => [
            'required' => 'Nama pemilik harus diisi.'
        ],
        'id_uk' => [
            'required' => 'Unit Kerja harus dipilih.'
        ],
        'provinsi' => [
            'required' => 'Provinsi harus dipilih.'
        ],
        'kota' => [
            'required' => 'Kota harus dipilih.'
        ],
        'kecamatan' => [
            'required' => 'Kecamatan harus dipilih.'
        ],
        'kelurahan' => [
            'required' => 'Kelurahan harus dipilih.'
        ],
        'j_sertifikat' => [
            'required' => 'Jenis sertifikat harus dipilih.'
        ],
        'no_sertifikat' => [
            'required' => 'Nomor sertifikat harus diisi.'
        ],
        'tgl_terbit' => [
            'required' => 'Tanggal sertifikat harus diisi.'
        ],
        'tgl_expire' => [
            'required' => 'Tanggal berakhir sertifikat harus diisi.'
        ],
        'guna' => [
            'required' => 'Penggunaan area harus dipilih.'
        ],
        'luas_okupasi' => [
            'required' => 'Luas harus diisi (Ha).'
        ],
        // 'file_gambar' => [
        //     'required' => 'Pilih gambar.'
        // ],
        // 'file_geo' => [
        //     'required' => 'Pilih file GIS JSON.',
        // ]
    ];

    function getAllOkupasi($id = null)
    {
        $builder = $this->db->table('area_okupasi');
        $builder->select('provinces.name AS nama_provinsi, regencies.name AS nama_kabupaten, districts.name AS nama_kecamatan, villages.name AS nama_kelurahan, nama_uk, id_okupasi, id_sertifikat, area_okupasi.id_uk, des_okupasi, luas_okupasi, nama_guna, nama_okupan, nama_okupasi,  nama_sertifikat, no_sertifikat, tgl_expire, tgl_terbit, area_okupasi.created_at, area_okupasi.updated_at , file, gambar, koordinat ');
        $builder->join('unit_kerja', 'unit_kerja.id_uk = area_okupasi.id_uk');
        $builder->join('j_sertifikat', 'j_sertifikat.id_sertifikat = area_okupasi.j_sertifikat');
        $builder->join('guna_lahan', 'guna_lahan.id_guna = area_okupasi.guna');
        $builder->join('provinces', 'provinces.id = area_okupasi.provinsi');
        $builder->join('regencies', 'regencies.id = area_okupasi.kota');
        $builder->join('districts', 'districts.id = area_okupasi.kecamatan');
        $builder->join('villages', 'villages.id = area_okupasi.kelurahan');
        if ($id != null) {
            $builder->where('area_okupasi.id_okupasi', $id);
            $query   = $builder->get();
            return $query->getRow();
        } else {
            $query   = $builder->get();
            return $query->getResult();
        }
    }
    function getGuna()
    {
        $builder = $this->db->table('guna_lahan');
        $query   = $builder->get();
        return $query->getResult();
    }
    function getSertifikat()
    {
        $builder = $this->db->table('j_sertifikat');
        $query   = $builder->get();
        return $query->getResult();
    }
    function getProvinsi()
    {
        $builder = $this->db->table('provinces');
        $query   = $builder->get();
        return $query->getResult();
    }
    function getKota($id_provinsi)
    {
        $builder = $this->db->table('regencies');
        return $builder->getWhere(array('province_id' => $id_provinsi))->getResultArray();
    }
    function getKecamatan($id_kota)
    {
        $builder = $this->db->table('districts');
        return $builder->getWhere(array('regency_id' => $id_kota))->getResultArray();
    }
    function getKelurahan($id_district)
    {
        $builder = $this->db->table('villages');
        return $builder->getWhere(array('district_id' => $id_district))->getResultArray();
    }
    function getKota2($id)
    {
        $builder = $this->db->table('regencies');
        $builder->where('province_id', $id);
        $query   = $builder->get();
        return $query->getResult();
    }
    function getKecamatan2($id)
    {
        $builder = $this->db->table('districts');
        $builder->where('regency_id', $id);
        $query   = $builder->get();
        return $query->getResult();
    }
    function getKelurahan2($id)
    {
        $builder = $this->db->table('villages');
        $builder->where('district_id', $id);
        $query   = $builder->get();
        return $query->getResult();
    }

    function total_okupasi()
    {
        $builder = $this->db->table('area_okupasi');
        if ($builder->countAll() > 0) {
            return $builder->countAll();
        } else {
            return 0;
        }
    }
    function luas_okupasi()
    {
        $builder = $this->db->table('area_okupasi');
        $builder->selectSum('luas_okupasi');
        $query = $builder->get();
        return $query;
    }
}
