<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class My_Account extends BaseController
{
    public function index()
    {
        $id=session()->get('id');
        $where2=array('id_user'=>$id);
        $where3=array('id_guru_user'=>$id);
        $where4=array('id_siswa_user'=>$id);
        $model=new M_model();
        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);
        $data['use']=$model->getRow('user',$where2);
        $data['guru']=$model->getRow('guru',$where3);
        $data['siswa']=$model->getRow('siswa',$where4);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        echo view('My_Account/my_account', $data);
    }

    public function ganti_pw()   
    {
        $pass=$this->request->getPost('pw');
        $id=session()->get('id');
        $model= new M_model();

        $data=array( 
            'password'=>md5($pass)
        );

        $where=array('id_user'=>$id);
        $model->edit('user', $data, $where);
        return redirect()->to('/My_Account');
    }
}
