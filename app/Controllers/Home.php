<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get('level') > 0) {
            return redirect()->to('/Home/home'); 
        } else {
            $model = new M_model();
            return view('login');
        }
    }

    public function aksi_login()
    {
        $n=$this->request->getPost('username'); 
        $p=$this->request->getPost('password');

        $model= new M_model();

        $data=array(
            'username'=>$n, 
            'password'=>md5($p)
        );
        $cek=$model->getarray('user', $data);

        if ($cek>0) {
            $where=array('id_guru_user'=>$cek['id_user']);
            $guru=$model->getarray('guru', $where);

                if ($guru) { 
                session()->set('id', $cek['id_user']);
                session()->set('username', $cek['username']);
                session()->set('nama_guru', $guru['nama_guru']);
                session()->set('level', $cek['level']);

                return redirect()->to('Home/home');
            } else {
                $where = array('id_siswa_user' => $cek['id_user']);
                $siswa = $model->getarray('siswa', $where);

                if ($siswa) { 
                    session()->set('id', $cek['id_user']);
                    session()->set('username', $cek['username']);
                    session()->set('nama_siswa', $siswa['nama_siswa']);
                    session()->set('level', $cek['level']);

                    return redirect()->to('Home/home');
                }
            }
        }
        return redirect()->to('/');
    }

    public function home()
    {
        echo view('home');
    }
}
