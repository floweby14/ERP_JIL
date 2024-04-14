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
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Data Master</a>
                    <div class="dropdown-menu m-0">
                        <a href="<?= base_url('Data_Master/siswa')?>" class="dropdown-item">Siswa</a>
                        <a href="<?= base_url('Data_Master/guru')?>" class="dropdown-item">Guru</a>
                    </div>
                </div>
                <a href="<?= base_url('My_ERP')?>" class="nav-item nav-link">My ERP</a>
                <a href="<?= base_url('My_Account')?>" class="nav-item nav-link active">My Account</a>
                <a href="<?= base_url('LogOut')?>" class="nav-item nav-link">Log Out</a>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid page-header-acc py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">My ERP</h1>
        </div>
    </div>

    <div class="row equal-height">         
      <style>
        .equal-height {
          display: flex;
          flex-wrap: wrap;
        }

        .equal-height > [class*='col-'] {
          display: flex;
          flex-direction: column;
        }

        .equal-height .card {
          flex: 1;
        }

        .card {
          border: 1px solid #e5e5e5;
          border-radius: 10px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          margin-bottom: 20px;
          overflow: hidden; 
        }

        .card-bg {
          background-size: 100% 100%;
          height: 150px;
          position: relative;
        }

        .card-body {
          padding: 20px;
        }

        table {
          width: 100%;
          margin-bottom: 0;
          border-collapse: collapse; 
        }

        th, td {
          border: none;
          padding: 4px; 
          text-align: left;
        }

        th {
          width: 40%;
          font-weight: normal;
        }

        .form-group {
          margin-bottom: 15px;
        }

        hr {
          margin-top: 15px;
          margin-bottom: 20px;
          border: 0;
          border-top: 1px solid #000000;
        }
      </style>

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('My_Account/ganti_pw')?>" method="post">
              <div class="item form-group">
                <label style="color: black;" class="control-label col-md-12 col-sm-12 col-xs-12">Password<span> :</span>
                </label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <input id="password" class="form-control col-md-12 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="password" placeholder="Password" required="required" type="text" value="<?= $use->password?>" disabled>
                </div>
              </div>
              <div class="item form-group">
                <label style="color: black;" class="control-label col-md-12 col-sm-12 col-xs-12">New Password<span> :</span>
                </label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="input-group">
                    <input type="password" placeholder="New Password" name="p1" class="form-control col-md-12 col-xs-12" data-validate-length-range="6" data-validate-words="2" id="newPassword" >
                    <span class="input-group-text" id="togglePassword"><i class="fa fa-eye" aria-hidden="true"></i></span>
                  </div>
                </div>
              </div>
              <div class="item form-group">
                <label style="color: black;" class="control-label col-md-12 col-sm-12 col-xs-12">Verify Your Password<span> :</span>
                </label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="input-group">
                    <input type="password" placeholder="Verify Your Password" name="pw" class="form-control col-md-12 col-xs-12" data-validate-length-range="6" data-validate-words="2" id="verifyPassword">
                    <span class="input-group-text" id="togglePasswordVerify"><i class="fa fa-eye" aria-hidden="true"></i></span>
                  </div>
                </div>
              </div>
              <small class="form-text text-danger" id="passwordMismatchAlert" style="display: none;">The password you enter must be the same.</small>
              <div class="ln_solid"></div>
              <div class="form-groupp">
                <div class="col-md-12 float-right">
                  <button id="submitButton" type="submit" class="btn btn-info" disabled><i class="fa-solid fa-key"></i> Change Password</button>
                </div>
              </div>
              <style>
                .form-groupp .col-md-12 {
                  text-align: right;
                }
              </style>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      const newPasswordInput = document.getElementById('newPassword');
      const verifyPasswordInput = document.getElementById('verifyPassword');
      const submitButton = document.getElementById('submitButton');
      const passwordMismatchAlert = document.getElementById('passwordMismatchAlert');

      verifyPasswordInput.addEventListener('input', function() {
        if (verifyPasswordInput.value === newPasswordInput.value) {
          submitButton.disabled = false;
          passwordMismatchAlert.style.display = 'none';
        } else {
          submitButton.disabled = true;
          passwordMismatchAlert.style.display = 'block';
        }
      });

      const togglePassword = document.getElementById('togglePassword');
      togglePassword.addEventListener('click', function () {
        const type = newPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        newPasswordInput.setAttribute('type', type);
      });

      const togglePasswordVerify = document.getElementById('togglePasswordVerify');
      togglePasswordVerify.addEventListener('click', function () {
        const type = verifyPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        verifyPasswordInput.setAttribute('type', type);
      });
    </script>

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