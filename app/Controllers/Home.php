<?php

namespace App\Controllers;

use App\Models\AsetModel;
use App\Models\OkupasiModel;
use App\Models\UnitKerjaModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->uk = new UnitKerjaModel;
        $this->aa = new AsetModel;
        $this->ao = new OkupasiModel();
    }
    public function index()
    {
        $data['unit_kerja'] = $this->uk->findAll();
        $data['area_aset'] = $this->aa->getAllAset();
        $data['area_okupasi'] = $this->ao->getAllOkupasi();

        $data['total_uk'] = $this->uk->total_uk();
        $data['total_aset'] = $this->aa->total_aset();
        $luasaset = $this->aa->select('sum(luas) as luas_aset')->first();
        $luasokupasi = $this->ao->select('sum(luas_okupasi) as luas_okupasi')->first();
        $data['luas_aset'] = (float)$luasaset->luas_aset;
        $data['luas_okupasi'] = (float)$luasokupasi->luas_okupasi;

        echo view('home', $data);
    }
}
