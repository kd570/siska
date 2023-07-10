<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
// use CodeIgniter\Files\File;
use App\Models\UnitKerjaModel;
use App\Models\BagianModel;
use App\Models\JabatanModel;
use App\Models\JobdeskModel;
use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\Validation\StrictRules\Rules;
use setasign\Fpdi\Fpdi;

require_once(ROOTPATH . 'vendor/autoload.php');

class Jobdesk extends ResourceController
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
        // $this->request = \Config\Services::request();
        // $file = new \CodeIgniter\Files\File($path);
        // Set options to enable embedded PHP 
    }
    public function index()
    {

        $data['jobdesk'] = $this->jd->getAll3();
        return view('jobdesk/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data['jobdesk'] = $this->jd->getAll3($id);
        // dd($data);
        return view('jobdesk/show', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data['jabatan'] = $this->jb->getAll2();
        return view('jobdesk/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $namaBerkas = $this->request->getFile('file_jd')->getName();
        // dd($namaBerkas);
        $data = [
            'no_jd' => $this->request->getPost('no_jd'),
            'nama_jd' => $this->request->getPost('nama_jd'),
            'id_jb' => $this->request->getPost('id_jb'),
            'des_jd' => $this->request->getPost('des_jd'),
            'file_jd' => $namaBerkas,
        ];
        $save = $this->jd->insert($data);
        if (!$save) {
            return redirect()->back()->withInput()->with('errors', $this->jd->errors());
        } else {
            $this->request->getFile('file_jd')->move('upload/jobdesk');
            return redirect()->to(site_url('jobdesk'))->with('success', 'Data berhasil disimpan.');
            // echo "berhasil";
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $jobdesk = $this->jd->find($id);
        if (is_object($jobdesk)) {
            $data['jobdesk'] = $jobdesk;
            $data['jabatan'] = $this->jb->findAll();
            // dd($jobdesk);
            return view('jobdesk/edit', $data);
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
        $this->jd->update($id, $data);
        return redirect()->to(site_url('jobdesk'))->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $data =  $this->jd->find($id);
        // dd($data);
        if (is_object($data)) {
            unlink('upload/' . $data->file_jd);
            $this->jd->delete($id);
            return redirect()->to(site_url('jobdesk'))->with('success', 'Data berhasil dihapus.');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $this->jd->delete($id);
        return redirect()->to(site_url('jobdesk'))->with('success', 'Data berhasil dihapus.');
    }

    function download($id)
    {
        $data = $this->jd->find($id);
        $file = 'upload/jobdesk/' . $data->file_jd;
        $text = 'DOKUMENT RAHASIA';
        $text2 = ' Dokument ini di download melalui DJP PTPN XIV.
' . date(" d-m-Y  H:i ") . 'WITA by ' . userLogin()->name_user . '.';

        $name = uniqid();
        $font_size = 10;
        $opacity = 80;
        $ts = explode("\n", $text);
        $width = 0;
        foreach ($ts as $k => $string) {
            $width = max($width, strlen($string));
        }
        $width  = imagefontwidth($font_size) * $width;
        $height = imagefontheight($font_size) * count($ts);
        $el = imagefontheight($font_size);
        $em = imagefontwidth($font_size);
        $img = imagecreatetruecolor($width, $height);
        // Background color 
        $bg = imagecolorallocate($img, 255, 255, 255);
        imagefilledrectangle($img, 0, 0, $width, $height, $bg);

        // Font color settings 
        $color = imagecolorallocate($img, 255, 0, 0);
        foreach ($ts as $k => $string) {
            $len = strlen($string);
            $ypos = 0;
            for ($i = 0; $i < $len; $i++) {
                $xpos = $i * $em;
                $ypos = $k * $el;
                imagechar($img, $font_size, $xpos, $ypos, $string, $color);
                $string = substr($string, 1);
            }
        }
        imagecolortransparent($img, $bg);
        $blank = imagecreatetruecolor($width, $height);
        $tbg = imagecolorallocate($blank, 255, 255, 255);
        imagefilledrectangle($blank, 0, 0, $width, $height, $tbg);
        imagecolortransparent($blank, $tbg);
        $op = !empty($opacity) ? $opacity : 100;
        if (($op < 0) or ($op > 100)) {
            $op = 100;
        }

        // Create watermark image 
        imagecopymerge($blank, $img, 0, 0, 0, 0, $width, $height, $op);
        imagepng($blank, $name . ".png");

        $name2 = uniqid();
        $font_size2 = 2;
        $opacity2 = 80;
        $ts2 = explode("\n", $text2);
        $width2 = 0;
        foreach ($ts2 as $k2 => $string2) {
            $width2 = max($width2, strlen($string2));
        }
        $width2  = imagefontwidth($font_size2) * $width2;
        $height2 = imagefontheight($font_size2) * count($ts2);
        $el2 = imagefontheight($font_size2);
        $em2 = imagefontwidth($font_size2);
        $img2 = imagecreatetruecolor($width2, $height2);
        // Background color 
        $bg2 = imagecolorallocate($img2, 255, 255, 255);
        imagefilledrectangle($img2, 0, 0, $width2, $height2, $bg2);

        // Font color settings 
        $color2 = imagecolorallocate($img2, 255, 0, 0);
        foreach ($ts2 as $k2 => $string2) {
            $len2 = strlen($string2);
            $ypos2 = 0;
            for ($i = 0; $i < $len2; $i++) {
                $xpos2 = $i * $em2;
                $ypos2 = $k2 * $el2;
                imagechar($img2, $font_size2, $xpos2, $ypos2, $string2, $color2);
                $string2 = substr($string2, 1);
            }
        }
        imagecolortransparent($img2, $bg2);
        $blank2 = imagecreatetruecolor($width2, $height2);
        $tbg2 = imagecolorallocate($blank2, 255, 255, 255);
        imagefilledrectangle($blank2, 0, 0, $width2, $height2, $tbg2);
        imagecolortransparent($blank2, $tbg2);
        $op2 = !empty($opacity2) ? $opacity2 : 100;
        if (($op2 < 0) or ($op2 > 100)) {
            $op2 = 100;
        }

        // Create watermark image 
        imagecopymerge($blank2, $img2, 0, 0, 0, 0, $width2, $height2, $op2);
        imagepng($blank2, $name2 . ".png");

        // Set source PDF file 
        $pdf = new Fpdi();
        if (file_exists("./" . $file)) {
            $pagecount = $pdf->setSourceFile($file);
        } else {
            die('Source PDF not found!');
        }

        // Add watermark to PDF pages 
        for ($i = 1; $i <= $pagecount; $i++) {
            $tpl = $pdf->importPage($i);
            $size = $pdf->getTemplateSize($tpl);
            $pdf->addPage();
            $pdf->useTemplate($tpl, 1, 1, $size['width'], $size['height'], TRUE);

            //Put the watermark 
            $xxx_final = ($size['width'] - 50);
            $yyy_final = ($size['height'] - 25);
            $pdf->Image($name . '.png', 155, 20, 0, 0, 'png');
            $pdf->Image($name2 . '.png', 10, 20, 0, 0, 'png');
        }
        @unlink($name . '.png');
        @unlink($name2 . '.png');

        // Output PDF with watermark 
        // $pdf->Output('D', 'DJP N14 - ' . $data->file_jd);
        $pdf->Output('F', 'upload/jobdesk/watermark/DJP N14 - ' . $data->file_jd);
        return $this->response->download('upload/jobdesk/watermark/DJP N14 - ' . $data->file_jd, null);
    }
}
