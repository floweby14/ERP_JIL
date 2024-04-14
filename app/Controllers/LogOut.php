<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LogOut extends BaseController
{
    public function index()
    {
        $model = new M_model(); 
        session()->destroy();
        return redirect()->to('/');
    }
}
