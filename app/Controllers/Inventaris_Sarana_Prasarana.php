<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Inventaris_Sarana_Prasarana extends BaseController
{
    public function index()
    {
        $model=new M_model();
        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $data['foto']=$model->getRow('user',$where);
        $data['Barang']=$model->tampil('barang');
        $data['Peminjaman']=$model->tampil('pendataan_barang');
        $data['Pengembalian']=$model->tampil('peminjaman_pengembalian');

        echo view('Inventaris_Sarana_Prasarana/layout/header', $data);
        echo view('Inventaris_Sarana_Prasarana/layout/menu');
        echo view('Inventaris_Sarana_Prasarana/layout/footer');
    }

    public function barang()
    {
        $model=new M_model();
        $on='barang.maker_barang=user.id_user';
        $data['data']=$model->fusionOderBy('barang', 'user', $on, 'tanggal_barang');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('Inventaris_Sarana_Prasarana/layout/header', $data);
        echo view('Inventaris_Sarana_Prasarana/layout/menu');
        echo view('Inventaris_Sarana_Prasarana/barang/barang');
        echo view('Inventaris_Sarana_Prasarana/layout/footer');
    }

    public function tambah_barang()
    {
        $model=new M_model();
        $nama_barang=$this->request->getPost('nama_barang');
        $maker_barang=session()->get('id');
        $data=array(

            'nama_barang '=>$nama_barang,
            'jumlah'=>'0',
            'maker_barang'=>$maker_barang
        );

        $model->simpan('barang',$data);
        return redirect()->to('/Inventaris_Sarana_Prasarana/barang');
    }

    public function edit_barang($id)
    {
        $model=new M_model();
        $where2=array('barang.id_barang '=>$id);

        $on='barang.maker_barang=user.id_user';
        $data['data']=$model->edit_user('barang', 'user',$on, $where2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        echo view('Inventaris_Sarana_Prasarana/layout/header', $data);
        echo view('Inventaris_Sarana_Prasarana/layout/menu');
        echo view('Inventaris_Sarana_Prasarana/barang/edit_barang');
        echo view('Inventaris_Sarana_Prasarana/layout/footer');
    }

    public function aksi_edit_barang()
    {
        $model=new M_model();
        $id=$this->request->getPost('id');
        $nama_barang=$this->request->getPost('nama_barang');
        $maker_barang=session()->get('id');
        $tanggal_barang = date('Y-m-d H:i:s'); 

        $data=array(
            'nama_barang'=>$nama_barang,
            'maker_barang'=>$maker_barang,
            'tanggal_barang' => $tanggal_barang
        );

        $where=array('id_barang'=>$id);
        $model->edit('barang',$data,$where);
        return redirect()->to('/Inventaris_Sarana_Prasarana/barang');
    }

    public function hapus_barang($id)
    {
        $model=new M_model();
        $where=array('id_barang'=>$id);

        $model->hapus('barang',$where);
        return redirect()->to('/Inventaris_Sarana_Prasarana/barang');
    }

    public function pendataan_barang()
    {
        $model=new M_model();
        $on='pendataan_barang.id_barang_pb=barang.id_barang';
        $on2='pendataan_barang.maker_pb=user.id_user';
        $data['data']=$model->superOderBy('pendataan_barang', 'barang', 'user', $on, $on2, 'tanggal_pb');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        $data['p']=$model->tampil('barang');

        echo view('Inventaris_Sarana_Prasarana/layout/header', $data);
        echo view('Inventaris_Sarana_Prasarana/layout/menu');
        echo view('Inventaris_Sarana_Prasarana/pendataan_barang/pendataan_barang');
        echo view('Inventaris_Sarana_Prasarana/layout/footer');
    }

    public function tambah_pendataan_barang()
    {
        $model=new M_model();
        $id_barang=$this->request->getPost('id_barang');
        $stok=$this->request->getPost('stok');
        $maker_pb=session()->get('id');
        $data=array(

            'id_barang_pb '=>$id_barang,
            'stok '=>$stok,
            'maker_pb'=>$maker_pb
        );

        $model->simpan('pendataan_barang',$data);
        return redirect()->to('/Inventaris_Sarana_Prasarana/pendataan_barang');
    }

    public function hapus_pendataan_barang($id)
    {
        $model=new M_model();
        $where=array('id_pb'=>$id);

        $model->hapus('pendataan_barang',$where);
        return redirect()->to('/Inventaris_Sarana_Prasarana/pendataan_barang');
    }

    public function peminjaman_barang()
    {
        $model=new M_model();
        $data = [];

        $on='peminjaman_pengembalian.id_barang_pp=barang.id_barang';
        $on2='peminjaman_pengembalian.maker_pp=user.id_user';

        if (session()->get('level') == 5 || session()->get('level') == 6) {
        $where = ['user.username' => session()->get('username')];
        $data['data']=$model->superOderByWhere('peminjaman_pengembalian', 'barang', 'user', $on, $on2, 'tanggal_pp', $where);

        } elseif (session()->get('level') >= 1 && session()->get('level') <= 4) {
        $data['data']=$model->superOderBy('peminjaman_pengembalian', 'barang', 'user', $on, $on2, 'tanggal_pp');
        }

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        $data['p']=$model->tampil('barang');

        echo view('Inventaris_Sarana_Prasarana/layout/header', $data);
        echo view('Inventaris_Sarana_Prasarana/layout/menu');
        echo view('Inventaris_Sarana_Prasarana/peminjaman_barang/peminjaman_barang');
        echo view('Inventaris_Sarana_Prasarana/layout/footer');
    }

    public function tambah_peminjaman()
    {
        $model=new M_model();
        $id_barang=$this->request->getPost('id_barang');
        $stok=$this->request->getPost('stok');
        $maker_pp=session()->get('id');
        $data=array(

            'id_barang_pp '=>$id_barang,
            'stok'=>$stok,
            'status'=>'Barang Belum Dikembalikan',
            'maker_pp'=>$maker_pp
        );

        $model->simpan('peminjaman_pengembalian',$data);
        return redirect()->to('/Inventaris_Sarana_Prasarana/peminjaman_barang');
    }

    public function pengembalian_barang()
    {
        $model=new M_model();
        $data = [];

        $on='peminjaman_pengembalian.id_barang_pp=barang.id_barang';
        $on2='peminjaman_pengembalian.maker_pp=user.id_user';

        if (session()->get('level') == 5 || session()->get('level') == 6) {
        $where = ['user.username' => session()->get('username')];
        $data['data']=$model->superWhere('peminjaman_pengembalian', 'barang', 'user', $on, $on2, $where);

        } elseif (session()->get('level') >= 1 && session()->get('level') <= 4) {
        $data['data']=$model->super('peminjaman_pengembalian', 'barang', 'user', $on, $on2);
        }

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        $data['foto']=$model->getRow('user',$where);

        $data['p']=$model->tampil('barang');

        echo view('Inventaris_Sarana_Prasarana/layout/header', $data);
        echo view('Inventaris_Sarana_Prasarana/layout/menu');
        echo view('Inventaris_Sarana_Prasarana/pengembalian_barang/pengambalian_barang');
        echo view('Inventaris_Sarana_Prasarana/layout/footer');
    }

    public function aksi_pengembalian_barang($id)
    {
        $model=new M_model();
        $where=array('id_pp'=>$id);
        $tanggal_pengembalian = date('Y-m-d H:i:s'); 

        $data=array(
            'status'=>'Barang Dikembalikan',
            'tanggal_pengembalian' => $tanggal_pengembalian
        );
        $model->edit('peminjaman_pengembalian',$data,$where);
        return redirect()->to('/Inventaris_Sarana_Prasarana/pengembalian_barang');
    }

    public function aksi_barang_diterima($id)
    {
        $model=new M_model();
        $where=array('id_pp'=>$id);
        $data=array(
            'status'=>'Barang Telah Diterima'
        );
        $model->edit('peminjaman_pengembalian',$data,$where);
        return redirect()->to('/Inventaris_Sarana_Prasarana/pengembalian_barang');
    }

    public function laporan_pengembalian_barang()
    {
        $model=new M_model();
        $data['kunci']='view_pengembalian';

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $data['foto']=$model->getRow('user',$where);

        echo view('Inventaris_Sarana_Prasarana/layout/header', $data);
        echo view('Inventaris_Sarana_Prasarana/layout/menu');
        echo view('Inventaris_Sarana_Prasarana/laporan/filter');
        echo view('Inventaris_Sarana_Prasarana/layout/footer');
    }

    public function print_pengembalian()
    {
        $model = new M_model();
        $data = [];
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');

        if (session()->get('level') == 5 || session()->get('level') == 6) {
            $where = "user.username = '".session()->get('username')."'";
            $data['data'] = $model->filterPeminjamanWhere('peminjaman_pengembalian', $awal, $akhir, $where);
        } elseif (session()->get('level') >= 1 && session()->get('level') <= 4) {
            $data['data'] = $model->filterPeminjaman('peminjaman_pengembalian', $awal, $akhir);
        }

        echo view('Inventaris_Sarana_Prasarana/laporan/laporan_pengembalian',$data);
    }

    public function pdf_pengembalian()
    {
        $model = new M_model();
        $data = [];
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');

        if (session()->get('level') == 5 || session()->get('level') == 6) {
            $where = "user.username = '".session()->get('username')."'";
            $data['data'] = $model->filterPeminjamanWhere('peminjaman_pengembalian', $awal, $akhir, $where);
        } elseif (session()->get('level') >= 1 && session()->get('level') <= 4) {
            $data['data'] = $model->filterPeminjaman('peminjaman_pengembalian', $awal, $akhir);
        }  

        $dompdf = new\Dompdf\Dompdf();
        $dompdf->loadHtml(view('Inventaris_Sarana_Prasarana/laporan/laporan_pengembalian',$data));
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream('my.pdf', array('Attachment'=>false));
        exit();
    }
}
