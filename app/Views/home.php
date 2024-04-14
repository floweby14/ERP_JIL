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
                <a href="<?= base_url('Home/home')?>" class="nav-item nav-link active">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Data Master</a>
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

    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s"> 
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/sph.jpg" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-8">
                                <h1 class="display-1 text-light mb-4 animated slideInDown">Welcome to ERP - SPH</h1>
                                <p class="text-light fs-5 mb-4 pb-3">Sekolah Permata Harapan Batam adalah lembaga pendidikan di Batam yang menekankan pendidikan holistik dengan fokus pada pengembangan karakter dan keterampilan siswa. Dengan fasilitas modern dan kurikulum komprehensif, sekolah ini bertujuan membentuk individu yang siap menghadapi tantangan global di masa depan.</p>
                                <a href="https://wa.me/6282288254113" target="_blank" class="btn btn-primary rounded-pill py-3 px-5">Contact Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-users fa-4x text-primary mb-4"></i>
                        <p class="mb-2">Jumlah Siswa</p>
                        <h1 class="display-5 mb-0">250+</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-users fa-4x text-primary mb-4"></i>
                        <p class="mb-2">Jumlah Alumni</p>
                        <h1 class="display-5 mb-0">1k+</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-school fa-4x text-primary mb-4"></i>
                        <p class="mb-2">Cabang Sekolah</p>
                        <h1 class="display-5 mb-0">2</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.7s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-school fa-4x text-primary mb-4"></i>
                        <p class="mb-2">Akreditasi Sekolah</p>
                        <h1 class="display-5 mb-0">A</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row img-twice position-relative h-100">
                        <div class="col-6">
                            <img class="img-fluid rounded" src="img/about-1.jpeg" alt="">
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid rounded" src="img/about-2.jpeg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <p class="text-primary text-uppercase mb-2">// About Us</p>
                        <p>Sekolah Permata Harapan adalah institusi pendidikan yang berkomitmen untuk memberikan pengalaman belajar yang inspiratif dan berdaya saing bagi setiap siswa. Dengan kurikulum yang berbasis nilai, kami tidak hanya mengejar keunggulan akademis, tetapi juga fokus pada pembangunan karakter dan keterampilan siswa untuk menjadi pemimpin masa depan yang berintegritas dan peduli. Melalui pendekatan pendidikan holistik yang didukung oleh fasilitas modern dan staf pengajar yang berkualitas, kami bertekad untuk membantu setiap siswa meraih potensi terbaik mereka dan menjadi kontributor positif bagi masyarakat global.</p>

                        <p>Kami menawarkan jenjang pendidikan mulai dari tingkat sekolah dasar hingga sekolah menengah atas, menyediakan landasan pendidikan yang komprehensif bagi perkembangan akademik dan pribadi setiap siswa.</p>
                        <div class="row g-2 mb-4">
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>(SMP) Sekolah Menegah Pertama
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>(SMK) Bisnis Daring & Pemasaran
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>(SMK) Rekayasa Perangkat Lunak
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>(SMK) Akuntansi Keuangan Lembaga
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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