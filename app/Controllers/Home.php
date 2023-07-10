<?php

namespace App\Controllers;

use App\Models\UnitKerjaModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->uk = new UnitKerjaModel;
    }
    public function index()
    {
        $data['unit_kerja'] = $this->uk->findAll();
        $data['total_uk'] = $this->uk->total_uk();
        echo view('home', $data);
    }
}
