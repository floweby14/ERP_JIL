<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <base href="<?php echo base_url('assets') ?>/">

    <title>ERP - Sekolah Permata Harapan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet"> 

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/c0c79d4e21.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
   
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a class="navbar-brand ms-4 ms-lg-0">
            <h1 class="text-primary m-0">ERP - SPH</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto p-4 p-lg-0">
                <a href="<?= base_url('Home/home')?>" class="nav-item nav-link">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Data Master</a>
                    <div class="dropdown-menu m-0">
                        <a href="<?= base_url('Data_Master/siswa')?>" class="dropdown-item">Siswa</a>
                        <a href="<?= base_url('Data_Master/guru')?>" class="dropdown-item">Guru</a>
                    </div>
                </div>
                <a href="<?= base_url('My_ERP')?>" class="nav-item nav-link">My ERP</a>
                <a href="<?= base_url('My_Account')?>" class="nav-item nav-link">My Account</a>
                <a href="<?= base_url('LogOut')?>" class="nav-item nav-link">Log Out</a>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Data Master Siswa</h1>
        </div>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1></h1>
                <a href="<?= base_url('Data_Master/tambah_siswa/')?>"><button class="btn btn-success custom-button"><i class="fa fa-plus"></i> Tambah</button></a>
            </div>
        </div>

        <table id="example" class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm" style="min-width: 100%">
          <thead>
            <tr>
              <th style="text-align: center;">NIS</th>
              <th style="text-align: center;">Nama Siswa</th>
              <th style="text-align: center;">Jenis Kelamin</th>
              <th style="text-align: center;">Input By</th>
              <th style="text-align: center;">Input Date</th>
              <th style="text-align: center;">Action</th>
            </tr>
          </thead>
          
          <tbody>
            <?php
            $no=1;
            foreach ($data as $dataa){
              ?>
            <tr>
              <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nis?></td>
              <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_siswa?></td>
              <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->jk?></td>
              <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->username?></td>
              <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->tanggal_siswa?></td>
              <td>
              <div class="text-center mb-1">
                <a href="<?= base_url('Data_Master/reset_siswa/'.$dataa->id_siswa_user)?>" class="mx-2">
                  <i class="fa-solid fa-key text-info"></i>
                </a>

                <a href="<?= base_url('Data_Master/edit_siswa/'.$dataa->id_siswa_user)?>" class="mx-2">
                  <i class="fa-regular fa-pen-to-square text-warning"></i>
                </a>

                <a href="<?= base_url('Data_Master/hapus_siswa/'.$dataa->id_siswa_user)?>" class="mx-2">
                  <i class="fa-solid fa-trash text-danger"></i>
                </a>
              </div>
              </td>
            </tr>
            <?php }?>  
          </tbody>
        </table>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>