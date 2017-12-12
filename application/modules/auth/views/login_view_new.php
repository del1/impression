<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Impression Bridal System">
    <meta name="author" content="">
    <title>Login | Impression Bridal</title>
    <link rel="apple-touch-icon" href="<?php echo base_url('assets/admin/images/apple-touch-icon.png'); ?>">
    <link rel="shortcut icon" href="<?php echo base_url('assets/admin/images/favicon.ico'); ?>">
      <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/bootstrap-extend.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/site.min.css'); ?>">
      <!-- Plugins -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/animsition/animsition.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/asscrollable/asScrollable.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/slidepanel/slidePanel.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/jquery-mmenu/jquery-mmenu.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/flag-icon-css/flag-icon.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/jquery-mmenu/jquery-mmenu.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/login-v3.css'); ?>">
      <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/fonts/web-icons/web-icons.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/fonts/brand-icons/brand-icons.min.css');?>">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <!--[if lt IE 9]>
    <script src="../../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="../../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="<?php echo base_url('assets/admin/plugins/breakpoints/breakpoints.js');?>"></script>
    <script type="text/javascript">
        Breakpoints();
    </script>
</head>
<body class="animsition page-login-v3 layout-full">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Page -->
    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
        <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
            <div class="panel">
                <div class="panel-body">
                    <div class="brand">
                        <img class="brand-img" src="<?php echo base_url('assets/admin/images/logo-blue.png');?>" alt="...">
                        <h2 class="brand-text font-size-18">Impression Bridal</h2>
                    </div>
                    <?php $arr=array('id'=>"LoginForm");
                            echo form_open('auth/login',$arr); ?>
                    <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
                        <label class="floating-label">Email</label>
                    </div>
                    <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                        <label class="floating-label">Password</label>
                    </div>
                    <div class="form-group clearfix">
                        <a class="float-right" href="forgot-password.html">Forgot password?</a>
                    </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg mt-20">Sign in</button>
                    <?php echo form_close(); ?>
                    <?php if($this->session->flashdata('error')) { ?>
                    <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
                    <?php } ?>
                    <?php if($this->session->flashdata('success')) { ?>
                        <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
                    <?php } ?>
                </div>
            </div>

            <footer class="page-copyright page-copyright-inverse">
                <p>Impression Bridal</p>
                <p>© 2017. All RIGHT RESERVED.</p>
                <div class="social">
                    <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                        <i class="icon bd-twitter" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                        <i class="icon bd-facebook" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-icon btn-pure" href="javascript:void(0)">
                        <i class="icon bd-google-plus" aria-hidden="true"></i>
                    </a>
                </div>
            </footer>
        </div>
    </div>
    <!-- End Page -->
    <!-- Core  -->
    <script src="<?php echo base_url('assets/admin/plugins/babel-external-helpers/babel-external-helpers.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/jquery/jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/tether/tether.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/bootstrap/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/animsition/animsition.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/mousewheel/jquery.mousewheel.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/asscrollbar/jquery-asScrollbar.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/asscrollable/jquery-asScrollable.js');?>"></script>
    <!-- Plugins -->
    <script src="<?php echo base_url('assets/admin/plugins/jquery-mmenu/jquery.mmenu.min.all.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/screenfull/screenfull.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/slidepanel/jquery-slidePanel.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/jquery-placeholder/jquery.placeholder.js');?>"></script>
    <!-- Scripts -->
    <script src="<?php echo base_url('assets/admin/js/State.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/js/Component.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/js/Plugin.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/js/Base.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/js/Config.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/Section/Menubar.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/Section/Sidebar.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/Section/PageAside.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/Section/GridMenu.js');?>"></script>
     <!-- Config -->

    <!-- Page -->
    <script src="<?php echo base_url('assets/admin/js/Site.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/js/Plugin/asscrollable.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/js/Plugin/slidepanel.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/js/Plugin/jquery-placeholder.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/js/Plugin/material.js');?>"></script>
    <script type="text/javascript">
        (function(document, window, $) {
            'use strict';
        var Site = window.Site;
        $(document).ready(function() {
          Site.run();
        });
        })(document, window, jQuery);
    </script>
</body>
</html>