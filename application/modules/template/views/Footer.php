  <footer>
    <div class="container">
      <div class="footer-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="social-icon">
              <ul>
                <li>
                  <a href="https://www.facebook.com/impressionbridal/" target="_blank">
                     <span class="icon-facebook-logo"></span>
                   </a>
                </li>
                <li>
                  <a href="https://twitter.com/impressionstore?lang=en" target="_blank">
                     <span class="icon-twitter-logo"></span>
                 </a>
                </li>
                <li>
                  <a href="https://www.instagram.com/impressionbridalstore/" target="_blank">
                     <span class="icon-instagram-logo"></span>
                 </a>
                </li>
                <li>
                  <a href="mailto:info@impressionbridal.com" target="_blank">
                     <span class="icon-new-email-outline-symbol-in-black-circular-button"></span>
                 </a>
                </li>
              </ul>
            </div>
            <div class="cp-right">
              <p>Impression Bridal Store &#169; 2017. All Rights Reserved.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/js/global.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bs-modal-fullscreen.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/grid.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/collections/main.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/masonry.pkgd.min.js'); ?>"></script>
  <!-- <script src="js/imagesloaded.js"></script> -->
  <script src="<?php echo base_url('assets/js/classie.js'); ?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){

      setTimeout(function(){
        $('#grid').masonry({
            itemSelector: '.shown',
        });
      }, 2000);

      $(".productShow").click(function () {
          $(".modelBox").fadeIn(200);
          $("body").addClass("bodyScroll");
      });
      $(".closeIcon a").click(function () {
          $(".modelBox").hide();
      });

      $('#myModal').fullscreen();
      $(function() {
        Grid.init();
      });
      $(".fil-click").click(function(){
          $(".drop-wrap").slideToggle();
      });
      $(".close-btn").click(function(){
        $(".drop-wrap").slideUp();
      });

      function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});
				}
			}
			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});
    });
  </script>
</body>
</html>
<?php 
$erFlag=0;
if($this->session->flashdata('errorRegister') || $this->session->flashdata('successRegister'))
{ 
  $erFlag="Sign_up";
}elseif($this->session->flashdata('errorLogin')){ 
 $erFlag="Login"; } ?>



  <script type="text/javascript">
   jQuery(document).ready(function($) {
      var erFlag="<?php echo $erFlag; ?>";
      if(erFlag!=="0"){
        if(erFlag=="Sign_up")
        {
          $(".sign-up-wnd").trigger('click');
          $("#login-modal").modal('show');
        }
        if(erFlag=="Login")
        {
          $("#login-modal").modal('show');
        }
      }
    });
  </script>
