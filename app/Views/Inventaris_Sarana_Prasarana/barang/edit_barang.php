<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form id="userForm" class="form-horizontal form-label-left" novalidate  action="<?= base_url('Inventaris_Sarana_Prasarana/aksi_edit_barang')?>" method="post">
                 <input type="hidden" name="id" value="<?= $data->id_barang ?>">

                 <div class="row">
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Nama Barang<span style="color: black;"> :</span></label>
                        <input type="text" id="nama_barang" name="nama_barang" class="form-control text-capitalize" placeholder="Nama Barang" autocomplete="on" value="<?= $data->nama_barang?>">
                    </div>
                </div>
          <a href="<?= base_url('/Inventaris_Sarana_Prasarana/barang/')?>" type="submit" class="btn btn-primary">Kembali</a></button>
          <button type="submit" id="updateButton" class="btn btn-success">Edit Data</button>
      </form>
  </div>
</div>
</div>
</div>