$(document).ready(function(){

  $(".forgot-pwd").click(function(){
    $(".sign-in").hide();
    $(".sign-up").hide();
    $(".forgot-password").show();
  });
  $(".login-wnd").click(function(){
    $(".forgot-password").hide();
    $(".sign-up").hide();
    $(".sign-in").show();
  });
  $(".sign-up-wnd").click(function(){
    $(".forgot-password").hide();
    $(".sign-in").hide();
    $(".sign-up").show();
  });

  // .modal-backdrop classes
    $(".modal-fullscreen").on('show.bs.modal', function () {
      setTimeout( function() {
        $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
      }, 0);
    });
    $(".modal-fullscreen").on('hidden.bs.modal', function () {
      $(".modal-backdrop").addClass("modal-backdrop-fullscreen");
    });


    $('ul.menu li a').click(function(){
        $('ul.menu li a').removeClass("active");
        $(this).addClass("active");
    });

  resizeContent();
  $(window).resize(function() {
      resizeContent();
  });


});

function resizeContent(){

  var vheight =  $('.main-right-bar').height();
  $('.collection-wrap').css('height',vheight);

  var hafheight =  $('.main-right-bar').height()/2;
  $('.video-wrap').css('height',hafheight);
  $('.brid-wrap').css('height',hafheight);
  $('.bride-img').css('height',hafheight);
}



$(function(){
 var shrinkHeader = 50;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= shrinkHeader ) {
           $('.header').addClass('shrink');
        }
        else {
            $('.header').removeClass('shrink');
        }
  });
function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
    }
});
