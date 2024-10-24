<?php 
session_start();
    
if(!isset($_SESSION['level'])){
  header("Location : ../../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistem Data Base PBI</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/DataTables-1.12.1/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../vendors/DataTables-1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">  
   <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/PBI.png" />
  <!-- Swal -->
  <link rel="stylesheet" href="../sweetalert2.min.css">
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="dashboard_users.php"><img src="../images/logopbi.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="dashboard_users.php"><img src="../images/PBI.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>        
        <ul class="navbar-nav navbar-nav-right">          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <i class="ti-user text-primary"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">              
              <a href="../../logout.php" class="dropdown-item">
                
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>          
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>            
          </div>
          <!-- To do section tab ends -->          
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard_users.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic" >
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">Master-Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="dashboard_users.php?halaman=dataPelamarUser">Data Pelamar</a></li>                                            
                <li class="nav-item"> <a class="nav-link" href="dashboard_users.php?halaman=dataReferensiUser">Data Karyawan</a></li>               
              </ul>
            </div>
          </li>     
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic" >
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">Data Magang</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="dashboard_users.php?halaman=dataMagang">Semua Peserta</a></li>                                                          
              </ul>
            </div>
          </li>      
          <li class="nav-item">
            <a class="nav-link" href="dashboard_users.php?halaman=mundur">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Mundur</span>
            </a>
          </li>    
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">                    
          <?php
                if(isset($_GET['halaman']))
                {
                    if ($_GET['halaman']=='dataPelamarUser')
                        {
                            include 'dataPelamarUser.php';
                        }
                    elseif ($_GET['halaman']=='dataReferensiUser')
                        {
                            include 'dataReferensiUser.php';
                        }       
                    elseif ($_GET['halaman']=='tampilPelamarUsers')
                        {
                            include 'tampil_pelamarUsers.php';
                        }
                    elseif ($_GET['halaman']=='tampilReferensiUsers')
                        {
                            include 'tampil_ReferensiUsers.php';
                        }
                        elseif ($_GET['halaman'] == 'p_prosesPwk')
                        {
                          include 'p_prosesPwk.php';
                        }
                    elseif ($_GET['halaman'] == 'p_okTestPwk')
                        {
                          include 'p_okTespwk.php';
                        }
                    elseif ($_GET['halaman'] == 'p_Mcupwk')  
                        {
                          include 'p_Mcupwk.php';
                        }
                    elseif($_GET['halaman'] == 'p_okMcupwk')
                        {
                          include 'p_okMcupwk.php';
                        }
                    elseif ($_GET['halaman'] == 'p_ngMcupwk')
                        {
                          include 'p_ngMcupwk.php';
                        }
                    elseif ($_GET['halaman'] == 'p_trainingPwk')
                        {
                          include 'p_trainingpwk.php';
                        }
                    elseif ($_GET['halaman'] == 'p_selesaiPwk')
                        {
                          include 'p_selesaipwk.php';
                        }
                    // Cikarang
                    elseif ($_GET['halaman'] == 'dataPelamarCkr')
                        {
                          include 'dataPelamarckr.php';
                        }
                    elseif ($_GET['halaman'] == 'p_prosesCkr')
                        {
                          include 'p_prosesCkr.php';
                        }
                    elseif ($_GET['halaman'] == 'p_okTestCkr')
                        {
                          include 'p_okTesckr.php';
                        }
                    elseif ($_GET['halaman'] == 'p_Mcuckr')  
                        {
                          include 'p_Mcuckr.php';
                        }
                    elseif($_GET['halaman'] == 'p_okMcuckr')
                        {
                          include 'p_okMcuckr.php';
                        }
                    elseif ($_GET['halaman'] == 'p_ngMcuckr')
                        {
                          include 'p_ngMcuckr.php';
                        }
                    elseif ($_GET['halaman'] == 'p_trainingCkr')
                        {
                          include 'p_trainingckr.php';
                        }
                    elseif ($_GET['halaman'] == 'p_selesaiCkr')
                        {
                          include 'p_selesaickr.php';
                        }
                    elseif ($_GET['halaman'] == 'datatabel')
                        {
                          include 'datatabel.php';
                        }
                    elseif ($_GET['halaman'] == 'mundur')
                        {
                          include 'peserta_mundur_user.php';
                        }
                    elseif ($_GET['halaman'] == 'dataMagang')
                        {
                          include 'data_magang_user.php';
                        }
                }
                else
                {
                    include 'homeDashboard_users.php';
                }
            ?>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-center">
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">LPK Prima Buana Indonesia</span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-center">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?= date('Y') ?>.  Dashboard from<a href="https://github.com/BootstrapDash/skydash-free-bootstrap-admin-template" target="_blank"> BootstrapDash</a> All rights reserved.</span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-center">
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>          
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- <script src="../vendors/chart.js/Chart.min.js"></script>
  <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
  <script src="../js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> -->

  <!-- Export -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/dashboard.js"></script>
  <script src="../js/Chart.roundedBarCharts.js"></script>
  <!-- Swal -->
  <script src="../sweetalert2.all.min.js"></script>
  <!-- End custom js for this page-->  
</body>

</html>

