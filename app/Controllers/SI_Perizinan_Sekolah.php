<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SI_Perizinan_Sekolah extends BaseController
{
    public function index()
    {
        $model=new M_model();
        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $data['foto']=$model->getRow('user',$where);
        $data['siswa']=$model->tampil('siswa');
        $data['guru']=$model->tampil('guru');
        $data['Perizinan']=$model->tampil('perizinan_sekolah');

        echo view('Perizinan_Sekolah/layout/header', $data);
        echo view('Perizinan_Sekolah/layout/menu');
        echo view('Perizinan_Sekolah/layout/footer');
    }

    public function perizinan_keluar()
    {
        $model=new M_model();
        $data = [];

        $on='perizinan_sekolah.maker_ps=user.id_user';

        if (session()->get('level') == 4 || session()->get('level') == 5 || session()->get('level') == 6) {
        $where = ['user.username' => session()->get('username')];
        $data['data']=$model->fusionOderByWhere('perizinan_sekolah', 'user', $on, 'tanggal_ps', $where);

        } elseif (session()->get('level') >= 1 && session()->get('level') <= 3) {
        $data['data']=$model->fusionOderBy('perizinan_sekolah', 'user', $on, 'tanggal_ps');
        }

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('Perizinan_Sekolah/layout/header', $data);
        echo view('Perizinan_Sekolah/layout/menu');
        echo view('Perizinan_Sekolah/perizinan_sekolah/perizinan_sekolah');
        echo view('Perizinan_Sekolah/layout/footer');
    }

    public function tambah_perizinan()
    {
        $model=new M_model();
        $keterangan=$this->request->getPost('keterangan');
        $maker_ps=session()->get('id');
        $data=array(

            'keterangan'=>$keterangan,
            'status'=>'Proses Izin',
            'maker_ps'=>$maker_ps
        );

        $model->simpan('perizinan_sekolah',$data);
        return redirect()->to('/SI_Perizinan_Sekolah/perizinan_keluar');
    }

    public function diizinkan($id)
    {
        $model=new M_model();
        $where=array('id_ps'=>$id);
        $jam_diizinkan = date('Y-m-d H:i:s'); 

        $data=array(
            'status'=>'Izin Diterima',
            'jam_diizinkan' => $jam_diizinkan
        );
        $model->edit('perizinan_sekolah',$data,$where);
        return redirect()->to('/SI_Perizinan_Sekolah/perizinan_keluar');
    }

    public function tidak_diizinkan($id)
    {
        $model=new M_model();
        $where=array('id_ps'=>$id);
        $data=array(
            'status'=>'Izin Ditolak'
        );
        $model->edit('perizinan_sekolah',$data,$where);
        return redirect()->to('/SI_Perizinan_Sekolah/perizinan_keluar');
    }

    public function laporan_perizinan()
    {
        $model=new M_model();
        $data['kunci']='view_perizinan';

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $data['foto']=$model->getRow('user',$where);

        echo view('Perizinan_Sekolah/layout/header', $data);
        echo view('Perizinan_Sekolah/layout/menu');
        echo view('Perizinan_Sekolah/laporan/filter');
        echo view('Perizinan_Sekolah/layout/footer');
    }

    public function print()
    {
        $model = new M_model();
        $data = [];
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');

        if (session()->get('level') == 5 || session()->get('level') == 6) {
            $where = "user.username = '".session()->get('username')."'";
            $data['data'] = $model->filterPerizinanWhere('perizinan_sekolah', $awal, $akhir, $where);
        } elseif (session()->get('level') >= 1 && session()->get('level') <= 4) {
            $data['data'] = $model->filterPerizinan('perizinan_sekolah', $awal, $akhir);
        }

        echo view('Perizinan_Sekolah/laporan/laporan_perizinan',$data);
    }

    public function pdf()
    {
        $model = new M_model();
        $data = [];
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');

        if (session()->get('level') == 5 || session()->get('level') == 6) {
            $where = "user.username = '".session()->get('username')."'";
            $data['data'] = $model->filterPerizinanWhere('perizinan_sekolah', $awal, $akhir, $where);
        } elseif (session()->get('level') >= 1 && session()->get('level') <= 4) {
            $data['data'] = $model->filterPerizinan('perizinan_sekolah', $awal, $akhir);
        }  

        $dompdf = new\Dompdf\Dompdf();
        $dompdf->loadHtml(view('Perizinan_Sekolah/laporan/laporan_perizinan',$data));
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream('my.pdf', array('Attachment'=>false));
        exit();
    }
}