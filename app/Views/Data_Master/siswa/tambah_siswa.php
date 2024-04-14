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
    <div class="basic-form">
      <form id="userForm" class="form-horizontal form-label-left" novalidate  action="<?= base_url('Data_Master/aksi_tambah_siswa')?>" method="post">

        <div class="row">
          <div class="mb-3 col-md-6">
            <label class="form-label">NIS<span style="color: white;"> :</span></label>
            <input type="Number" id="nis" name="nis" 
            class="form-control text-capitalize" placeholder="NIS" oninput="maxLengthChecknip(this)">
            <script>
              function maxLengthChecknip(object) {
                if (object.value.length > 10)
                  object.value = object.value.slice(0, 10);
              }
            </script>
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Nama Siswa<span style="color: white;"> :</span></label>
            <input type="text" id="nama_siswa" name="nama_siswa" 
            class="form-control text-capitalize" placeholder="Nama Siswa">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Jenis Kelamin<span style="color: white;"> :</span></label>
            <div class="col-12">
              <select id="jk" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="jk" required="required">
                <option>~ Pilih Jenis Kelamin ~</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Username<span style="color: white;"> :</span></label>
            <input type="text" id="username" name="username" 
            class="form-control text-capitalize" placeholder="Username" maxlength="250">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Password<span style="color: white;"> :</span>
            </label>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="input-group">
                <input type="password" placeholder="Password" name="password" class="form-control col-md-12 col-xs-12" id="passwordField">
                <span class="input-group-text" id="togglePassword" onclick="togglePasswordVisibility()"><i class="fa fa-eye" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>
          <script>
            function togglePasswordVisibility() {
              var passwordField = document.getElementById("passwordField");
              var togglePasswordButton = document.getElementById("togglePassword");
              
              if (passwordField.type === "password") {
                passwordField.type = "text";
                togglePasswordButton.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
              } else {
                passwordField.type = "password";
                togglePasswordButton.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
              }
            }
          </script>
          <div class="mb-3 col-md-6">
            <label class="form-label">Level<span style="color: white;"> :</span></label>
            <select id="level" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="level" required="required">
              <option>Pilih Level</option>
              <option value="5">Ketua Kelas</option>
              <option value="6">Siswa</option>
            </select>
          </div>
        </div>
        <a href="<?= base_url('Data_Master/siswa')?>" type="submit" class="btn btn-primary">Cancel</a></button>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
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