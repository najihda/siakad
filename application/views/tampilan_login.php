<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Siakad UMUS</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <script type="text/javascript">
      function cekform()
      {
        if(!$("#username").val())
        {
          alert('maaf username tidak boleh kosong');
          $("#username").focus();
          return false;
        }
        if(!$("#password").val())
        {
          alert('maaf password tidak boleh kosong');
          $("#password").focus();
          return false;
        }
      }
    </script>
</head>

<body class="login-page">
    <?php
        $info = $this->session->flashdata('info');
        if(!empty($info))
        {
            echo $info;
        }
    ?>
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"> <b>SIAKAD UMUS 2017</b></a>
            <small>This Aplication Is The Final Project Of Najih Dziauddin Abdillah</small>
        </div>
        <div class="card">
            <div class="body">
                <form action="<?php echo base_url();?>index.php/auth/login" onSubmit="return cekform();" id="sign_in" method="POST">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">

                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>

                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-12 align-right">
                            <a href="" data-toggle="modal" data-target="#mdModal">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- For Material Design Colors -->
            <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Lupa Password??</h4>
                        </div>
                        <div class="modal-body">
                            Harap segera menghubungi admin atau staf prodi masing-masing.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>
    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/jquery.validate.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/examples/sign-in.js"></script>
    <script src="<?php echo base_url(); ?>js/pages/ui/modals.js"></script>
</body>

</html>
