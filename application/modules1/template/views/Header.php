<!DOCTYPE html>

<html lang="en">



<head>

  <meta charset="utf-8">

  <title>Impression Bridal</title>

  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon2.ico'); ?>" type="image/x-icon">
  <link rel="icon" href="<?php echo base_url('assets/images/favicon2.ico'); ?>" type="image/x-icon">

  <meta name="apple-mobile-web-app-capable" content="yes">

  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0" />

  <meta property="og:url" content="www.impressionbridalstore.com" />

  <meta property="og:type" content="website" />

  <meta property="og:title" content="Impression Bridal Store" />

  <meta property="og:description" content="Impression Bridal Store presents a wide variety of designs, from bridal wear, bridesmaid dresses, prom dresses, quinceneara gowns, to special occassion dresses. Each are made with its own unique style to show the glamour and elegance that you will need on your special day." />

  <meta property="og:image" content="http://demo.cbil360.com/impressionbridal/images/img2.jpg" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i|Playfair+Display:400,700" rel="stylesheet">

  <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">

  <!-- Custom styles  -->

  <link href="<?php echo base_url('assets/css/global.css'); ?>" rel="stylesheet">

  <link href="<?php echo base_url('assets/css/mcustom.css'); ?>" rel="stylesheet">

  <!-- Custom font & icons  -->

  <link href="<?php echo base_url('assets/css/fonts.css'); ?>" rel="stylesheet">

  

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugin/bsweetalert/sweetalert.min.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/toastr/toastr.css');?>">

  <link href="<?php echo base_url('assets/css/font-icons.css'); ?>" rel="stylesheet">

  <script src="<?php echo base_url('assets/js/modernizr.custom.js'); ?>"></script>

  <script type="text/javascript" src="<?php echo base_url('assets/plugin/bsweetalert/sweetalert.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/admin/plugins/toastr/toastr.js');?>"></script>

  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <script>

    //#ImpressionBridal

    //#ImpressionBridalStore





  var token = '1362124742.3ad74ca.6df307b8ac184c2d830f6bd7c2ac5644',

      hashtag='mountains',

      num_photos = 9;

      //760c81784ca34c2fbd25cea45f6c80a8

      // var token = '1362124742.3ad74ca.6df307b8ac184c2d830f6bd7c2ac5644',

      //var token = '6364228231.c8e4bd6.b50615caa1da49f8876b6cd8c1a8a401',



/*  $.ajax({

  	url: 'https://api.instagram.com/v1/tags/' + hashtag + '/media/recent',

  	dataType: 'jsonp',

  	type: 'GET',

  	data: {access_token: token, count: num_photos},

  	success: function(data){

      console.log(data);



  		for(x in data.data){

  		    $('#grid').append('<li class="shown"><a href="'+ data.data[x].link +'"><img src="'+data.data[x].images.standard_resolution.url+'"></span></a></li>');

      }

  	},

  	error: function(data){

  		console.log(data);

  	}

  });*/

  </script>

  <!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-3033022-7"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());



  gtag('config', 'UA-3033022-7');

</script>

  <style type="text/css">

    .cts{

      color: #d4bc89;

      cursor: pointer;

      height: 17px !important;

      width: 20px !important;

    }

    .error{

      border: 1px solid red;

    }

    .errorText{

      color: red;

    font-weight: 500;

    }

  </style>

</head>

<body>

  <header class="header">

    <div class="container">

      <div class="row">

        <div class="col-lg-4">

          <div class="social-icon">

            <ul>

              <li>

                <a href="https://www.facebook.com/impressionbridal/" target="_blank">

                   <span class="icon-facebook-logo"></span>

                 </a>

              </li>

              <!-- <li>

                <a href="https://twitter.com/impressionstore?lang=en" target="_blank">

                   <span class="icon-twitter-logo"></span>

               </a>

              </li> -->

              <li>

                <a href="https://www.instagram.com/impressionbridalstore/" target="_blank">

                   <span class="icon-instagram-logo"></span>

               </a>

              </li>

              <li>

                <a href="<?php echo base_url('impression/contact_us'); ?>" >

                   <span class="icon-new-email-outline-symbol-in-black-circular-button"></span>

               </a>

              </li>

            </ul>

          </div>

        </div>

        <?php 

        $session_data=$this->session->get_userdata(); ?>

        <div class="col-lg-4">

          <a href="./" class="logo"><img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="Impression Bridal" class="img-responsive" align="center"></a>

        </div>

        <div class="col-lg-4">

          <div class="sign-in-up">

            <?php if(isset($session_data['Email_Address'])){ ?>

              <a href="javascript:void(0)"><?php echo $session_data['Email_Address']; ?></a>

              /<a href="<?php echo base_url('auth/logOut'); ?>"> Logout</a>

            <?php }else{ ?>

            <a href="#" data-toggle="modal" data-target="#login-modal">sign in / sign up</a>

            <?php } ?>

          </div>

          <div class="fev">

            <?php if(isset($session_data['User_Id'])){ ?>

              <a href="<?php echo base_url('impression/favorites'); ?>"  class="active"  >

              <span class="icon icon-favorite-heart-button"></span>

              <span class="text">favorites</span>

              </a>

            <?php }else{?>

              <a href="#" data-toggle="modal" data-target="#login-modal">

              <span class="icon icon-favorite-heart-button"></span>

              <span class="text">favorites</span>

              </a>

            <?php } ?>

           

          </div>

          <div class="appointment text-right">

            <a href="<?php echo base_url('impression/appointment'); ?>" class="text-anchor">Make an Appointment</a>

          </div>

        </div>

      </div>

      <div class="row">

        <div class="col-lg-12">

          <nav id="#primary_nav_wrap">

            <label for="drop" class="toggle">Menu</label>

            <input type="checkbox" id="drop" />

            <ul class="menu">

              <li><a href="<?php echo base_url('/');?>">Home</a></li>

              <li>

                <!-- First Drop Down -->

                <?php foreach ($collection_list as $key => $value) {

                $colletionp[$value->collection_id]  =$value->collection_name;

                } ?>

                <label for="drop-1" class="toggle">Collections</label>

                <a href="<?php echo base_url('impression/collection');?>">Collections</a>

                <input type="checkbox" id="drop-1" />

                <ul>

                    <li><a href="<?php echo base_url('impression/collection_brand/'); ?>"><?php echo $colletionp[1]; ?></a></li>

                    <li><a href="<?php echo base_url('impression/brand/2'); ?>"><?php echo $colletionp[2]; ?></a></li>

                    <li><a href="<?php echo base_url('impression/collection/3'); ?>"><?php echo $colletionp[3]; ?></a></li>

                </ul>

              </li>

              <li><a href="<?php echo base_url('impression/about_us');?>">About Us</a></li>

              <li>

                <!-- Second Drop Down -->

                <label for="drop-2" class="toggle">Stores</label>

                <a href="#">Stores</a>

                <input type="checkbox" id="drop-2" />

                <ul>

                  <?php foreach ($store_list as $key => $value) { ?>

                     <li><a href="<?php echo base_url('impression/stores/'.$value->store_id); ?>"><?php echo $value->store_name; ?></a></li>

                  <?php } ?>

                  

                </ul>

              </li>

              <li><a href="<?php echo base_url('impression/real_brides');?>">Real Brides</a></li>

              <li><a href="<?php echo base_url('impression/event_trunkshow');?>">Events & Trunkshows</a></li>

              <li><a href="<?php echo base_url('impression/careers');?>">Careers</a></li>

              <li><a href="<?php echo base_url('impression/contact_us');?>">Contact Us</a></li>

            </ul>

          </nav>

        </div>

      </div>

    </div>

    <!-- /container -->

  </header>



<!-- Subscription Modal -->

<div class="container">

  <!-- Trigger the modal with a button -->

  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#subscribe-modal">Open Modal</button> -->

  <!-- Subscription Modal -->

  <div id="subscribe-modal" class="modal fade subscribe-modal" role="dialog">

    <div class="modal-dialog">

      <!-- Modal content-->

      <div class="modal-content">

        <div class="modal-body">

          <h4>Join our subscription list!</h4>

          <div class="image-wrap">

            <img src="<?php echo base_url('assets/images/subscribe.jpg'); ?>">

          </div>

          <?php $arr=array('id'=>"SubscriptionForm");

                            echo form_open('impression/subscribe',$arr); ?>

            <input type="email" id="subscribe_email" name="subscribe_email" placeholder="Email">
            <span class="errorText subscribe_error"></span>

            <button type="button" class="btn btn-primary subscribe_Submit">Subscribe</button>

          <?php echo form_close(); ?>

          <a data-dismiss="modal" class="close-modal"><span class="icon-cancel"></span></a>

        </div>

      </div>

    </div>

  </div>

</div>



<!-- Login Signup Modal -->

<div class="container">

  <div id="login-modal" class="modal fade subscribe-modal login-modal" role="dialog">

    <div class="modal-dialog modal-md">



      <!-- Modal content-->

      <div class="modal-content">

        <div class="modal-body">



          <div class="sign-in">

            <h4>SIGN IN</h4>

            <?php $arr=array('id'=>"LoginForm");

                            echo form_open('auth/login',$arr); ?>

              <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">

              <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">

              <div class="pull-left">

                <button type="submit" class="btn btn-primary">Login</button>

                <a class="sign-up-wnd signupA">Sign Up</a>

              </div>

              <div class="pull-right">

                <a class="forgot-pwd">Forgot password?</a>

              </div>

              <div class="clearfix"></div>

              <?php if($this->session->flashdata('errorLogin')) { ?>

              <p class="alert alert-danger" style="margin-top: 5px"><?php echo $this->session->flashdata('errorLogin'); ?></p>

              <?php } ?>

            <?php echo form_close(); ?>

          </div>



          <div class="sign-up">

            <h4>SIGN UP</h4>

            <?php $arr=array('id'=>"registerForm");

                            echo form_open('auth/register',$arr); ?>

              <input type="text" class="form-control" value="<?php echo set_value('fname'); ?>" id="inputFname" required="" name="fname" placeholder="Enter your first name">

              <input type="text" class="form-control" value="<?php echo set_value('lname'); ?>" id="inputLname" required="" name="lname" placeholder="Enter your last name">

              <input type="email" class="form-control signupemail" value="<?php echo set_value('email'); ?>" id="inputEmail" required="" name="email" placeholder="Email">

              <span class="errorTextMail errorText"></span>

              <input type="phone" class="form-control signupePhone" value="<?php echo set_value('phone_number'); ?>" id="inputPhone" onkeypress="return isNumber(event)" required="" name="phone_number" placeholder="Phone Number">

              <span class="errorTextPhone errorText"></span>

              <input type="password" class="form-control" value="<?php echo set_value('password'); ?>" id="inputPassword" required="" name="password" placeholder="Password">

              <input type="password" class="form-control" value="<?php echo set_value('confirm_password'); ?>" id="inputPasswordCheck" required="" name="confirm_password" placeholder="Confirm Password">

              <input type="text" class="form-control" value="<?php echo set_value('zipcode'); ?>" id="inputZip" required="" name="zipcode" placeholder="Enter zip code">

              <div class="checkbox">

                <label><input type="checkbox" class="checkbox cts" checked name="is_subscribed">Subscribe to our mailing list to receive updates on our events and promotions</label>

              </div>

              <div class="pull-left">

                <button type="submit" class="btn btn-primary">Sign Up</button>

                <a class="login-wnd">Login</a>

              </div>

              <div class="pull-right">

                <a class="forgot-pwd">Forgot password?</a>

              </div>

              <div class="clearfix"></div>

                <?php if($this->session->flashdata('errorRegister')) { ?>

                  <p class="alert alert-danger" style="margin-top: 5px"><?php echo $this->session->flashdata('errorRegister'); ?></p>

                <?php } ?>

                <?php if($this->session->flashdata('successRegister')) { ?>

                  <p class="alert alert-success" style="margin-top: 5px"><?php echo $this->session->flashdata('successRegister'); ?></p>

                <?php } ?>

              

            <?php echo form_close(); ?>

          </div>



          <div class="forgot-password">

            <h4>FORGOT PASSWORD</h4>

            <?php $arr=array('id'=>"forgetPasswordForm");

                            echo form_open('auth/forgot_password',$arr); ?>

              <input type="email" name="Email_forgott_pass" placeholder="Email">

              <div class="pull-left">

                <button class="btn btn-primary">Update login</button>

              </div>

              <div class="pull-right">

                <a id="" class="login-wnd">Back to Login</a>

              </div>

              <div class="clearfix"></div>

            <?php echo form_close(); ?>

          </div>

          <a data-dismiss="modal" class="close-modal"><span class="icon-cancel"></span></a>

        </div>



      </div>

    </div>

  </div>

</div>



<script type="text/javascript">

  jQuery(document).ready(function($) {

    if (sessionStorage.getItem("subscribe_modal") === null){

      setTimeout(function(){ $('#subscribe-modal').modal('show'); }, 5000);

    }



    $(".signupemail").blur(function(event){

        var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",

            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";

            var data={key:'email_id',table:'tbl_users',value: $(this).val(),[csrfName]:csrfHash};

            $.post("<?php echo base_url('auth/isExist') ?>", data, 

                function(data, textStatus, xhr) {

                  console.log(data);

                    if(data=="exist")

                    {

                        $(".signupemail").addClass('error');

                        $(".errorTextMail").html("This Email Already Exist");

                    }else{

                        $(".signupemail").removeClass('error');

                        $(".errorTextMail").empty();

                    }

        });

    })



    $(".signupePhone").blur(function(){

        var phonelenth=$(this).val().length;

        if(phonelenth > 9 && phonelenth < 14)

        {

          $(".signupePhone").removeClass('error');

          $(".errorTextPhone").empty();

        }else{

          $(".signupePhone").addClass('error');

          $(".errorTextPhone").html("Please Enter correct phone number");

        }

    })

  

    $(".inactive").click(function(){

      swal(

        'Login?',

        'Please Login to see your favorites Styles!',

        'error'

      )

    })





  $(document).on('hide.bs.modal','#subscribe-modal', function () {

      sessionStorage.setItem('subscribe_modal', 0);

      var obj = sessionStorage.user; // obj='[object Object]' Not an object



  });



  $(".subscribe_Submit").click(function(event) {
    val=$("#subscribe_email").val();
    if(IsEmail(val))
    {
      var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var data={email:val,[csrfName]:csrfHash};
            $.post("<?php echo base_url('auth/subscribe') ?>", data, 
            function(data, textStatus, xhr) {
              if(data=="success")
              {
                $("#subscribe-modal").modal("hide");
                  swal(
                  'Success',
                  'You are successfully subscribed to our newslater!',
                  'success'
                );
              }else{
                  $("#subscribe_email").css("border","1px solid red");
                  $(".subscribe_error").html('This email already exist');
              }
        });
    }else{
       $("#subscribe_email").css("border","1px solid red");
    }
  });



  function IsEmail(email) {

    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    return regex.test(email);

  }



  });



function isNumber(evt) 

{

      evt = (evt) ? evt : window.event;

      var charCode = (evt.which) ? evt.which : evt.keyCode;

      if (charCode!=43 && (charCode > 31 && (charCode < 48 || charCode > 57)) )  {

        return false;

      }

    return true;

}

</script>

