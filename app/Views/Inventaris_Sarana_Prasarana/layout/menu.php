        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Inventaris</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= base_url('/Inventaris_Sarana_Prasarana/barang')?>" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Barang</span>
              </a>
            </li>
  <?php  if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3) { ?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= base_url('/Inventaris_Sarana_Prasarana/pendataan_barang')?>" aria-expanded="false">
                <span>
                  <i class="fa-solid fa-book"></i>
                </span>
                <span class="hide-menu">Pendataan</span>
              </a>
            </li>
  <?php }else{} ?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= base_url('/Inventaris_Sarana_Prasarana/peminjaman_barang')?>" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Peminjaman</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= base_url('/Inventaris_Sarana_Prasarana/pengembalian_barang')?>" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Pengembalian</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= base_url('/Inventaris_Sarana_Prasarana/laporan_pengembalian_barang')?>" aria-expanded="false">
                <span>
                  <i class="fa-regular fa-file"></i>
                </span>
                <span class="hide-menu">Laporan</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= base_url('/My_ERP')?>" aria-expanded="false">
                <span>
                  <i class="fa-solid fa-person-walking-arrow-loop-left"></i>
                </span>
                <span class="hide-menu">Kembali</span>
              </a>
            </li>
                   
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">

        
      