(function($){var defaults={easing:"ease",animationTime:500,pagination:true,auto:false,};$.fn.swipeEvents=function(){return this.each(function(){var startX,startY,$this=$(this);$this.bind('touchstart',touchstart);function touchstart(event){var touches=event.originalEvent.touches;if(touches&&touches.length){startX=touches[0].pageX;startY=touches[0].pageY;$this.bind('touchmove',touchmove);}}
function touchmove(event){var touches=event.originalEvent.touches;if(touches&&touches.length){var deltaX=startX-touches[0].pageX;var deltaY=startY-touches[0].pageY;if(deltaX>=50){$this.trigger("swipeLeft");}
if(deltaX<=-50){$this.trigger("swipeRight");}
if(deltaY>=50){$this.trigger("swipeUp");}
if(deltaY<=-50){$this.trigger("swipeDown");}
if(Math.abs(deltaX)>=50||Math.abs(deltaY)>=50){$this.unbind('touchmove',touchmove);}}
event.preventDefault();}});};$.fn.HSlider=function(options){var settings=$.extend({},defaults,options),$slider=$(this),sections=$("section"),total=sections.length,quiet=false,paginationList="";$.fn.transformPage=function(settings,pos){$(this).css({"-webkit-transform":"translate3d("+pos+"%, 0 ,0)","-webkit-transition":"all "+settings.animationTime+"ms "+settings.easing,"-moz-transform":"translate3d("+pos+"%, 0 ,0)","-moz-transition":"all "+settings.animationTime+"ms "+settings.easing,"-ms-transform":"translate3d("+pos+"%, 0 ,0)","-ms-transition":"all "+settings.animationTime+"ms "+settings.easing,"transform":"translate3d("+pos+"%, 0 ,0)","transition":"all "+settings.animationTime+"ms "+settings.easing});return $(this);}
$.fn.slideLeft=function(){var _index=$("section.active").data("index");if(_index<total)location.hash='#'+(_index+1);return $(this);}
$.fn.slideRight=function(){var _index=$("section.active").data("index");if(_index<=total&&_index>1)location.hash='#'+(_index-1);return $(this);}
$.fn._render=function(){var _hash=Math.floor(Number(location.hash.split('#')[1]));_hash=_hash?_hash:1;if(_hash<1)_hash=1;if(_hash>total)_hash=total;var _activeIndex=_hash;$("section.active").removeClass("active");$(".pagination-menu li a"+".active").removeClass("active");$("section[data-index="+_activeIndex+"]").addClass("active");$("section[data-index="+2+"]").addClass("white-check");$(".pagination-menu li a"+"[data-index="+_activeIndex+"]").addClass("active");if($('.white-check').hasClass('active')){$('body').addClass('white-color');}else{$('body').removeClass('white-color');}
console.log('rendering now');var myInterval;function playAuto(){}
var pos=((_activeIndex-1)*100)*-1;$slider.transformPage(settings,pos);return $(this);}
$.fn._renderPagination=function(){if(!settings.pagination)return;posTop=($slider.find(".HSlider").height()/ 2)*-1;$slider.find(".HSlider").css("margin-top",posTop);$(".pagination-menu li a").click(function(){var page_index=$(this).data("index");location.hash='#'+page_index;});$(".pagination-menu li a").mouseover(function(){var page_index=$(this).data("index");location.hash='#'+page_index;});}
$.fn._bindEvent=function(){$(window).on('hashchange',$slider._render);$(document).bind('mousewheel DOMMouseScroll',function(event){event.preventDefault();var delta=event.originalEvent.wheelDelta||-event.originalEvent.detail;$slider._handleMouseScroll(event,delta);});$slider.swipeEvents().bind("swipeLeft",function(){$slider.slideLeft();}).bind("swipeRight",function(){$slider.slideRight();});return $(this);}
$.fn._handleMouseScroll=function(event,delta){if(quiet==false){if(delta==0)return;if(delta<0){$slider.slideLeft()}else{$slider.slideRight()};quiet=true;setTimeout(function(){quiet=false;},Number(settings.animationTime)+100);}}
$.fn._initStyle=function(){$slider.addClass("HSlider").css({"position":"relative",width:"100%",height:"100%",});$.each(sections,function(i){$(this).css({position:"absolute",width:"100%",height:"100%",left:i*100+"%"}).addClass("section").attr("data-index",i+1);$(this).find("img").css({minWidth:"100%",minHeight:"100%",position:"absolute",zIndex:1})
$(this).find("article").css({position:"absolute",boxSizing:"border-box",width:"100%",bottom:0,zIndex:4})
if(settings.pagination==true){paginationList+="<li><a data-index='"+(i+1)+"' href='#"+(i+1)+"'></a></li>"}});return $(this);}
$.fn._autoScroll=function(){autoPlay();return $(this);}
function autoPlay(i,motion,time){var normalTime=6000,videoTimer=41000;if(!i){i=1;}
if(!motion){motion='left'}
if(!time){time=normalTime}
setTimeout(function(){$('video').trigger('play');if(i==4){motion='right';}else if(i==1){time=videoTimer;motion='left';}else{time=normalTime}
if(i==2){$('video').trigger('pause');console.log("play video");}
if(i==3&&motion=='right'){time=videoTimer}
if(motion=='right'){$slider.slideRight();i--;}else{$slider.slideLeft();i++;}
console.log('i',i);},time);setTimeout(function(){autoPlay(i,motion,time)},time);}
$slider._initStyle()._bindEvent()._render()._autoScroll()._renderPagination()}})(window.jQuery);