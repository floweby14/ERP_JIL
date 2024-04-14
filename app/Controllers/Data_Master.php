<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Data_Master extends BaseController
{
    public function siswa()
    {
        $model=new M_model();
        $on='siswa.maker_siswa=user.id_user';
        $data['data']=$model->fusionOderBy('siswa', 'user', $on,  'tanggal_siswa');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('Data_Master/siswa/siswa', $data);
    }

    public function tambah_siswa()
    {
        $model=new M_model();
        $on='siswa.maker_siswa=user.id_user';
        $data['data']=$model->fusionOderBy('siswa', 'user', $on,  'tanggal_siswa');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('Data_Master/siswa/tambah_siswa', $data);
    }

    public function aksi_tambah_siswa()
    {
        $nis=$this->request->getPost('nis');
        $nama_siswa=$this->request->getPost('nama_siswa');
        $jk=$this->request->getPost('jk');
        $username=$this->request->getPost('username');
        $password=$this->request->getPost('password');
        $level=$this->request->getPost('level');
        $maker_siswa=session()->get('id');

        $user=array(
            'username'=>$username,
            'password'=>md5($password),
            'level'=>$level,
        );

        $model=new M_model();
        $model->simpan('user', $user);
        $where=array('username'=>$username);
        $id=$model->getarray('user', $where);
        $iduser = $id['id_user'];

        $siswa = array(
            'nis' => $nis,
            'nama_siswa' => $nama_siswa,
            'jk' => $jk,
            'id_siswa_user' => $iduser,
            'maker_siswa' => $maker_siswa,
        );

        $model->simpan('siswa', $siswa);
        return redirect()->to('Data_Master/siswa');
    }  

    public function reset_siswa($id)
    {
        $model=new M_model();
        $where=array('id_user'=>$id);
        $data=array(
            'password'=>md5('@dmin123')
        );
        $model->edit('user',$data,$where);

        return redirect()->to('Data_Master/siswa');
    }

    public function edit_siswa($id)
    {
        $model=new M_model();
        $where2=array('siswa.id_siswa_user'=>$id);

        $on='siswa.id_siswa_user=user.id_user';
        $data['data']=$model->edit_user('siswa', 'user',$on, $where2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('Data_Master/siswa/edit_siswa', $data);
    }

    public function aksi_edit_siswa()
    {
        $id= $this->request->getPost('id');    
        $nis=$this->request->getPost('nis');
        $nama_siswa=$this->request->getPost('nama_siswa');
        $jk=$this->request->getPost('jk');
        $username=$this->request->getPost('username');
        $level=$this->request->getPost('level');
        $maker_siswa=session()->get('id');
        $tanggal_siswa = date('Y-m-d H:i:s'); 

        $where=array('id_user'=>$id);    
        $where2=array('id_siswa_user'=>$id);
        if ($password !='') {
            $user=array(
                'username'=>$username,
                'level'=>$level,
            );
        }else{
            $user=array(
                'username'=>$username,
                'level'=>$level,
            );
        }

        $model=new M_model();
        $model->edit('user', $user,$where);

        $siswa=array(
            'nis' => $nis,
            'nama_siswa' => $nama_siswa,
            'jk' => $jk,
            'maker_siswa' => $maker_siswa,
            'tanggal_siswa' => $tanggal_siswa
        );

        $model->edit('siswa', $siswa, $where2);
        return redirect()->to('Data_Master/siswa');
    }

    public function hapus_siswa($id)
    {
        $model=new M_model();
        $where2=array('id_user'=>$id);
        $where=array('id_siswa_user'=>$id);

        $model->hapus('siswa',$where);
        $model->hapus('user',$where2);
        return redirect()->to('Data_Master/siswa');
    }

    public function guru()
    {
        $model=new M_model();
        $on='guru.maker_guru=user.id_user';
        $data['data']=$model->fusionOderBy('guru', 'user', $on,  'tanggal_guru');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('Data_Master/guru/guru', $data);
    }

    public function tambah_guru()
    {
        $model=new M_model();
        $on='guru.maker_guru=user.id_user';
        $data['data']=$model->fusionOderBy('guru', 'user', $on,  'tanggal_guru');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('Data_Master/guru/tambah_guru', $data);
    }

    public function aksi_tambah_guru()
    {
        $nik=$this->request->getPost('nik');
        $nama_guru=$this->request->getPost('nama_guru');
        $jk=$this->request->getPost('jk');
        $username=$this->request->getPost('username');
        $level=$this->request->getPost('level');
        $maker_guru=session()->get('id');

        $user=array(
            'username'=>$username,
            'password'=>md5('@dmin123'),
            'level'=>$level,
        );

        $model=new M_model();
        $model->simpan('user', $user);
        $where=array('username'=>$username);
        $id=$model->getarray('user', $where);
        $iduser = $id['id_user'];

        $guru = array(
            'nik' => $nik,
            'nama_guru' => $nama_guru,
            'jk' => $jk,
            'id_guru_user' => $iduser,
            'maker_guru' => $maker_guru,
        );

        $model->simpan('guru', $guru);
        return redirect()->to('Data_Master/guru');
    }  

    public function reset_guru($id)
    {
        $model=new M_model();
        $where=array('id_user'=>$id);
        $data=array(
            'password'=>md5('@dmin123')
        );
        $model->edit('user',$data,$where);

        return redirect()->to('Data_Master/guru');
    }

    public function edit_guru($id)
    {
        $model=new M_model();
        $where2=array('guru.id_guru_user'=>$id);

        $on='guru.id_guru_user=user.id_user';
        $data['data']=$model->edit_user('guru', 'user',$on, $where2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('Data_Master/guru/edit_guru', $data);
    }

    public function aksi_edit_guru()
    {
        $id= $this->request->getPost('id');    
        $nik=$this->request->getPost('nik');
        $nama_guru=$this->request->getPost('nama_guru');
        $jk=$this->request->getPost('jk');
        $username=$this->request->getPost('username');
        $level=$this->request->getPost('level');
        $maker_guru=session()->get('id');
        $tanggal_guru = date('Y-m-d H:i:s'); 

        $where=array('id_user'=>$id);    
        $where2=array('id_guru_user'=>$id);
        if ($password !='') {
            $user=array(
                'username'=>$username,
                'level'=>$level,
            );
        }else{
            $user=array(
                'username'=>$username,
                'level'=>$level,
            );
        }

        $model=new M_model();
        $model->edit('user', $user,$where);

        $guru=array(
            'nik' => $nik,
            'nama_guru' => $nama_guru,
            'jk' => $jk,
            'maker_guru' => $maker_guru,
            'tanggal_guru' => $tanggal_guru
        );

        $model->edit('guru', $guru, $where2);
        return redirect()->to('Data_Master/guru');
    }

    public function hapus_guru($id)
    {
        $model=new M_model();
        $where2=array('id_user'=>$id);
        $where=array('id_guru_user'=>$id);

        $model->hapus('guru',$where);
        $model->hapus('user',$where2);
        return redirect()->to('Data_Master/guru');
    }
}
