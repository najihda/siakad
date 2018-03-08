<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>| SIAKAD-UMUS BREBES</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->

    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url().'assets/images/siakad.png' ?>" class="img-responsive"></a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url(); ?>assets/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nama; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url().'staf/profil_staf' ?>"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a type="button" data-toggle="modal" data-target="#largeModal2"><i class="material-icons">build</i>Setting</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo base_url().'auth/logout' ?>"><i class="material-icons">settings_power</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="<?php echo base_url(); ?>">
                            <i class="material-icons">home</i> <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">developer_board</i> <span>Master Data</span>
                        </a>
                        <ul class="ml-menu">
                            <li> <a href="<?php echo base_url().'staf/mk' ?>">Matakuliah</a> </li>
                            <li> <a href="<?php echo base_url().'staf/dosen' ?>">Dosen</a> </li>
                            <li> <a href="<?php echo base_url().'staf/mahasiswa' ?>">Mahasiswa</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">apps</i> <span>Akademik</span>
                        </a>
                        <ul class="ml-menu">
                            <li> <a href="<?php echo base_url().'staf/nilai' ?>">KHS Mahasiswa</a> </li>
                            <li> <a href="<?php echo base_url().'staf/tampil_jadwal' ?>">Jadwal Perkuliahan</a> </li>
                            <li> <a href="<?php echo base_url().'staf/kalender' ?>">Kalender Akademik</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'staf/berita' ?>">
                            <i class="material-icons">speaker_notes</i> <span>Berita</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'staf/tentang' ?>">
                            <i class="material-icons">info</i> <span>About</span>
                        </a>
                    </li>

                    <li class="header">LABELS</li>
                    <li>
                        <a href="<?php echo base_url().'staf/user_login' ?>">
                            <i class="material-icons col-red">donut_large</i> <span>Reset Password User</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 <a href="https://github.com/gurayyarar/AdminBSBMaterialDesign">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Final Project: </b> Najih Dziauddin Abdillah
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <?php echo $this->session->flashdata('save_berita'); ?>
          <?php echo $this->session->flashdata('save_thn'); ?>
          <?php echo $this->session->flashdata('save_fakultas'); ?>
          <?php echo $this->session->flashdata('hapus_fakultas'); ?>
          <?php echo $this->session->flashdata('save_prodi'); ?>
          <?php echo $this->session->flashdata('hapus_prodi'); ?>
          <?php echo $this->session->flashdata('save_dosen'); ?>
          <?php echo $this->session->flashdata('hapus_dosen'); ?>
          <?php echo $this->session->flashdata('save_staf'); ?>
          <?php echo $this->session->flashdata('hapus_staf'); ?>
          <?php echo $this->session->flashdata('save_mk'); ?>
          <?php echo $this->session->flashdata('hapus_mk'); ?>
          <?php echo $this->session->flashdata('save_user'); ?>
          <?php echo $this->session->flashdata('save_akun'); ?>
          <?php echo $this->session->flashdata('save_jadwal'); ?>
          <?php echo $this->session->flashdata('hapus_jadwal'); ?>
          <?php echo $this->session->flashdata('save_nilai'); ?>
          <?php echo $this->session->flashdata('save_wali'); ?>
          <?php echo $this->session->flashdata('hapus_wali'); ?>
            <?php echo $contents; ?>
        </div>
    </section>
    <!-- Modal Large Size -->
<div class="modal fade" id="largeModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">FORM GANTI PASSWORD</h4>
            </div>
              <form action="<?php echo base_url();?>staf/simpan_akun" method="post">
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                 <input type="text" name="pass_lama" class="form-control">
                                 <label class="form-label">Password Lama</label>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                         <div class="form-group form-float">
                             <div class="form-line">
                                <input type="password" name="pass_baru" class="form-control">
                                <label class="form-label">Password Baru</label>
                             </div>
                        </div>
                    </div>
                     <div class="col-lg- col-md-3 col-sm-3 col-xs-6">
                         <div class="form-group form-float">
                             <div class="form-line">
                                <input type="password" name="ulangi_pass" class="form-control">
                                <label class="form-label">Ulangi Password Baru</label>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-link waves-effect">SAVE</button>
              <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                <input type="hidden" name="stts" value="tambah">
            </div>
          </form>
        </div>
    </div>
</div>
<!-- #END# Modal Large Size -->

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/tables/jquery-datatable.js"></script>
    <!-- TinyMCE -->
    <script src="<?php echo base_url(); ?>assets/plugins/tinymce/tinymce.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

    <script src="<?php echo base_url(); ?>assets/js/pages/index.js"></script>


    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
</body>

</html>
