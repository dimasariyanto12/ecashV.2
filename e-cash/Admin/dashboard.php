  <?php 

  session_start();

     $id_user     = $_SESSION['id_user'];
    $nip            = $_SESSION['nip'];
    $nama_user   = $_SESSION['nama_user'];
    $alamat_user = $_SESSION['alamat_user'];
    $telp_user   = $_SESSION['telp_user'];
  
    $email_user  = $_SESSION['email_user'];
    $password_user     = $_SESSION['password_user'];
    $level_user  = $_SESSION['level_user'];
    $aktif_user  = $_SESSION['aktif_user'];
    $idkelas  = $_SESSION['idkelas'];

 
          error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

          include "Databases.php";
          $mysqli = new Databases();
          include "hak_akses.php";
        foreach ($hak_akses as $akses):

          if(empty($_SESSION['kodeakses'])) { 
              header("location: login.php");  
            }
  ?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-CASH | ESKASABA CASH </title>
  <link rel="icon" type="image/png" href="image/unnamed.png"  />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">



    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
     <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-green.min.css">

  <!-- DataTables -->
 <link rel="stylesheet" href="plugins/iCheck/all.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
 
  <link rel="stylesheet" type="text/css" id="theme" href="assets/css/alert/sweetalert.css"/>
<script type="text/javascript" src="assets/js/alert/jquery-1.9.1.min.js"></script>        
<script type="text/javascript" src="assets/js/alert/sweetalert-dev.js"></script>



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-black fixed sidebar-mini">


<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>KAS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>E-</b>CASH</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
           <!--  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a> -->
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/ecash.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
          <!--   <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a> -->
            <ul class="dropdown-menu">
              <!-- <li class="header">You have 10 notifications</li> -->
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a> -->
            <ul class="dropdown-menu">
              <!-- <li class="header">You have 9 tasks</li>
              <li> -->
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="logout.php">
              <!-- The user image in the navbar-->
              <img src="dist/img/ecash.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Log out</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/ecash.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/ecash.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>E-CASH</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
        
        

      <ul class="sidebar-menu" data-widget="tree">
<li class="header">MAIN NAVIGATION</li>
        <li> <a href="?page=home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <?php
          if(($akses['data_master']=='1') OR ($akses['data_master']=='1') ) {
        ?>
        <li class="header">DATA MASTER</li>
         
        <?php
          }if(($akses['data_master']=='1')) {
        ?>  
      <?php } ?>

        <?php 
          if(($akses['data_master']=='1')) {
        ?>  

        <li class="treeview">
          <a href="#">
          <i class="fa fa-users"></i> <span>Master Data</span>
       
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            <?php } ?>
          </a>

          <ul class="treeview-menu">
        <?php
          if(($akses['data_master']=='1')) {
        ?>  
      
            <li ><a href="<?= $base_url . "?page=siswa" ?>"><i class="fa fa-user"></i>Data Siswa</a></li>
            
            <li><a href="<?= $base_url . "?page=kelas" ?>"><i class="fa fa-building-o"></i>Data Kelas</a></li>
             <li><a href="<?= $base_url . "?page=jurusan" ?>"><i class="fa fa-star"></i>Data Kompetensi Keahlian</a></li>
           <?php } ?>
          </ul>
        </li>

        <?php
          if(($akses['transaksi']=='1')  ) {
        ?>
       
        <li class="header">TRANSAKSI</li>
      
         <li class="treeview">
          <a href="#">
              <?php
            }
          if(($akses['transaksi']=='1')) {
        ?> 
            <i class="fa fa-money"></i> <span>Transaksi</span>
            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>
            </span>
            <?php } ?>
          </a>

          <ul class="treeview-menu">
           <?php
          if(($akses['transaksi']=='1')) {
        ?> 
              <li><a href="?page=masuk" ><i class=" fa fa-plus-square"></i>Kas Masuk</a></li>
              <li><a href="?page=keluar"><i class="fa fa-minus-square"></i>Kas Keluar</a></li>
             
          <?php } ?>
          </ul>
        </li>

        <?php
          if(($akses['rekap']=='1') OR ($akses['keluar']=='1') OR ($akses['laporan_pembayaran']=='1') ) {
        ?>
            <?php
            }
        ?> 
        <?php
            
            if(($akses['laporan_pembayaran']=='1')) {
          ?> 
         <li class="treeview">
          <a href="#">
            

         
            <i class="fa fa-book"></i> <span>Laporan</span>

            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
           
            </span>
          <?php } ?>
          </a>
          <ul class="treeview-menu">
             <?php
                if(($akses['rekap']=='1')) {
            ?>
              <li><a href="?page=saldo"><i class="fa  fa-bar-chart"></i>Rekapitulasi Kas </a></li>
              <?php
                  }
                  if(($akses['laporan_pembayaran']=='1')) {
                ?>
              <li><a href="?page=lprn_pembayaran"><i class="fa  fa-usd"></i>Laporan Pembayaran Siswa </a></li>
              <?php
                  }
                  if(($akses['laporan_siswa']=='1')) {
                ?>
               <li><a href="?page=laporan"><i class="fa  fa-bookmark"></i>Laporan  Data Siswa </a></li>
             <?php } ?>
          </ul>
        </li>

       

        <?php 
      
          if(($akses['akun']=='1')) {
        ?>  
<li class="header">PENGATURAN</li>

          <li><a href="<?= $base_url . "?page=akun" ?>"><i class="fa fa-gears"></i> <span>Akun</span></a></li>

           <?php
         }
          if(($akses['pengaturan']=='1') ) {
        ?>
        
        <li><a href="<?= $base_url . "?page=pengaturan" ?>"><i class="fa fa-cog"></i> <span>Pembayaran</span></a></li>
        <?php
      }
          if(($akses['pengguna']=='1') ) {
        ?>
        <li><a href="?page=users"><i class="fa fa-user-plus"></i> <span>User</span></a></li>

          <?php } ?>
      </ul>

      
    </section>

  </aside>

  <div class="content-wrapper">

    <section class="content container-fluid">

     <?php 


                        $page = $_GET['page'];
                        $aksi = $_GET['aksi'];

                           if ($page == "kelas") {
                           if ($aksi == ""){
                            include "page/kelas/kelas.php";
                           }
                           if ($aksi == "tambah"){
                            include "page/kelas/tambah.php";
                           
                            
                           }
                             if ($aksi == "proses"){
                            include "page/kelas/proses.php";
                           
                            
                           }

                           if ($aksi == "ubah"){
                            include "page/kelas/ubah.php";
                           }
                           if ($aksi == "hapus"){
                            include "page/kelas/hapus.php";
                           }
                        }

                        if ($page == "jurusan") {
                           if ($aksi == ""){
                            include "page/jurusan/jurusan.php";
                           }
                           if ($aksi == "proses"){
                            include "page/jurusan/proses.php";
                           }
                           if ($aksi == "tambah"){
                            include "page/jurusan/tambah.php";
                           }

                           if ($aksi == "ubah"){
                            include "page/jurusan/ubah.php";
                           }
                          
                        }


                        if ($page == "siswa") {
                           if ($aksi == ""){
                            include "page/siswa/siswa.php";
                           }
                           if ($aksi == "proses"){
                            include "page/siswa/proses.php";
                           }
                            if ($aksi == "tambah_siswa"){
                            include "page/siswa/tambah_siswa.php";
                           }

                           if ($aksi == "ubah"){
                            include "page/siswa/ubah.php";
                           }
                           if ($aksi == "hapus"){
                            include "page/siswa/hapus.php";
                           }
                        }

                           if ($page == "masuk") {
                           if ($aksi == ""){
                            include "page/masuk/masuk.php";
                           }
                            
                           if ($aksi == "add"){
                            include "page/masuk/add.php";
                           }
                            if ($aksi == "proses"){
                            include "page/masuk/proses.php";
                           }

                           if ($aksi == "ubah"){
                            include "page/siswa/ubah.php";
                           }
                           if ($aksi == "hapus"){
                            include "page/siswa/hapus.php";
                           }
                        }

                          if ($page == "users") {
                           if ($aksi == ""){
                            include "page/users/user.php";
                           }
                            if ($aksi == "tambah_user"){
                            include "page/users/tambah_user.php";
                           }

                           if ($aksi == "ubah"){
                            include "page/users/ubah.php";
                           }
                           if ($aksi == "hapus"){
                            include "page/users/hapus.php";
                           }
                           if ($aksi == "proses"){
                            include "page/users/proses.php";
                           }
                        }
                        if ($page == "keluar") {
                           if ($aksi == ""){
                            include "page/keluar/keluar.php";
                           }
                           
                           }

                          if ($page == "pengaturan") {
                           if ($aksi == ""){
                            include "page/pengaturan/pengaturan.php";
                           }
                           if ($aksi == "ubah"){
                            include "page/pengaturan/ubah.php";
                           
                            }
                            if ($aksi == "hapus"){
                            include "page/pengaturan/hapus.php";
                           
                            }


                            if ($aksi == "tambah"){
                            include "page/pengaturan/tambah.php";
                           
                            }
                           if ($aksi == "proses"){
                            include "page/pengaturan/proses.php";
                           }
                          } 
                          if ($page == "home") {
                           if ($aksi == ""){
                            include "home.php";

                         }
                       }
                        if ($page == "saldo") {
                           if ($aksi == ""){
                            include "page/saldo/saldo.php";
                           }

                         }
                         if ($page == "laporan") {
                           if ($aksi == ""){
                            include "page/laporan/laporan.php";
                           }
                            if ($aksi == "lihat"){
                            include "page/laporan/lihat.php";
                           }

                         }


                          if ($page == "lprn_pembayaran") {
                           if ($aksi == ""){
                            include "page/laporan_pembayaran/laporan_pembayaran.php";
                           }
                            if ($aksi == "lihat"){
                            include "page/laporan_pembayaran/lihat.php";
                           }

                         }


                          if ($page == "akun") {
                           if ($aksi == ""){
                            include "page/akun/akun.php";
                           }
                            if ($aksi == "proses"){
                            include "page/akun/proses.php";
                           }

                         }
                         

                        ?>

<!-- /WhatsHelp.io widget -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="http://dimasjepara.blogspot.com">E-CASH</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- DataTables -->

<!-- jQuery 3 -->
<script  src="assets/js/alert/jquery-1.9.1.min.js"></script>        
<script src="assets/js/alert/sweetalert-dev.js"></script>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
 <script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src=bower_components/fastclick/lib/fastclick.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>



<script src="plugins/iCheck/icheck.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>\
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
 
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>

<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->

<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     <!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })

  // To make Pace works on Ajax calls
  $(document).ajaxStart(function () {
    Pace.restart()
  })
  $('.ajax').click(function () {
    $.ajax({
      url: '#', success: function (result) {
        $('.ajax-content').html('<hr>Ajax Request Completed !')
      }
    })
  })
  
</script>
</body>
</body>
</html>
<?php endforeach ?>