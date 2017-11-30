$(document).ready(function(){

	var queryParams=getUrlVars();
	console.log(queryParams);
	$(document).on('click','.btn-select',function(e){
		e.preventDefault();
		var ul=$(this).find("ul");
		if($(this).hasClass("active")){
			if(ul.find("li").is(e.target))
				{
					var target=$(e.target);
					target.addClass("selected").siblings().removeClass("selected");
					var value=target.html();
					var filterId=target.val();
					$(this).find(".btn-select-input").val(value);
					$(this).find(".btn-select-value").html(value);
					applyFilter(this,filterId);
					console.log('queryParams',queryParams);
				}
			ul.hide();
			$(this).removeClass("active");
		}else{
			$('.btn-select').not(this).each(function(){
				$(this).removeClass("active").find("ul").hide();
			});
			ul.slideDown(300);
			$(this).addClass("active");
		}
	});

	$(document).on('click',function(e){
		var target=$(e.target).closest(".btn-select");
		if(!target.length){
			$(".btn-select").removeClass("active").find("ul").hide();
		}
	});
	var rootUrl=window.location.href;function generateUrl(params){
		var url=window.location.href.split('?');
		return url[0]+'?'+$.param(params);
	}

function getUrlVars()
{
	var vars={},hash;
	var hashes=window.location.href.indexOf('?');
	if(window.location.href.indexOf('?')>-1){
		var hashes=window.location.href.slice(window.location.href.indexOf('?')+1).split('&');
		for(var i=0;i<hashes.length;i++){
			hash=hashes[i].split('=');
			vars[hash[0]]=hash[1];
		}
	}
	return vars;
}
function applyFilter(object,filterId){
	var input=$(object).find(".btn-select-input");
	var type=input.attr('data-param');
	queryParams[type]=filterId;
	console.log(generateUrl(queryParams));
	window.location.href=generateUrl(queryParams);
}
$("#reset").click(function(){
	window.location.href=rootUrl;
});
});