//email format validation
function checkEmail(email) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
    return (true)
  }
  //alert("Please enter valide email!")
  return (false)
}

function makeFileList() {

	var input = document.getElementById("filesToUpload");
	var ul = document.getElementById("fileList");
	while (ul.hasChildNodes()) {
		ul.removeChild(ul.firstChild);
	}
	for (var i = 0; i < input.files.length; i++) {
		var li = document.createElement("li");
		li.innerHTML = input.files[i].name;
		ul.appendChild(li);
	}
	if(!ul.hasChildNodes()) {
		var li = document.createElement("li");
		li.innerHTML = 'No Files Selected';
		ul.appendChild(li);
	}
}


function validateFileExtensions() {
	var errorContainer = $("#validation-errors");
	for (var i = 0; i < $("#filesToUpload").get(0).files.length; ++i) {
			var file1=$("#filesToUpload").get(0).files[i].name;
		 if(file1){
				 var file_size=$("#filesToUpload").get(0).files[i].size;
					if(file_size<2097152){
							var ext = file1.split('.').pop().toLowerCase();
						 if($.inArray(ext,['jpg','jpeg','gif','png'])===-1){
									errorContainer.append('<label for="title" class="error">* Only image files (JPG, GIF, PNG) are allowed!</label>');
									return false;
							}
				 }
		 }
	}

}

function trimspace(str) {
  var len = str.length;
  if (len != 0) {
    for (var i = 0; i < len; i++) {
      if (str.indexOf(" ") == 0)
        str = str.substring(1, len);
    }
    var strtrim = str;
    return strtrim;
  } else {
    return str;
  }
}
//Function To validate contact form fields
function fnvalidationContact() {
  var bname = $("#b-first-name").val();
  var email = $("#txt-email").val();
	var uploadFile = $('#file-Upld').val();
  if ((bname == "") || bname == "Bride First Name") {
    $("#b-first-name").val("This field is requird").addClass("errorMsg");
    $("#b-first-name").focus(function() {
      $("#b-first-name").val("");
      $("#b-first-name").removeClass("errorMsg");
    });
    return false;
  } else if (email == "" || email == "Email") {
    $("#txt-email").val("This field is requird").addClass("errorMsg");
    $("#txt-email").focus(function() {
      $("#txt-email").val("");
      $("#txt-email").removeClass("errorMsg");
    });
    return false;
  } else if (!checkEmail($("#txt-email").val())) {
    $("#txt-email").val("Please enter valid email address").addClass("errorMsg");
    $("#txt-email").focus(function() {
      $("#txt-email").val(email);
      $("#txt-email").removeClass("errorMsg");
    });
    return false;
  } else if (uploadFile == "" || uploadFile == "Upload Pictures") {
  	$("#file-Upld").val("No Files Selected").addClass("errorMsg");
		$("#file-Upld").focus(function(){
			$("#file-Upld").val("");
			$("#file-Upld").removeClass("errorMsg");
		});
		return false;
  }else if (!validateFileExtensions($("#file-Upld").val())) {
    $("#file-Upld").val("Please enter valid format").addClass("errorMsg");
    $("#file-Upld").focus(function() {
      $("#file-Upld").val(Upload);
      $("#file-Upld").removeClass("errorMsg");
    });
    return false;
  }
	 {
    sendEmail();
  }
}

function sendEmail() {

	var bname = $("#b-first-name").val();
	var email = $("#txt-email").val();
	 $.post('contactForm.php',{bname:bname,email:email},function(data){
		 //alert(data);
		 if(data == 1){
			 $('#contactFormMain form').html('<h3>Thank you for contacting us. Our representative will get back to you within 24 hours.</h3>')
			 //alert('Mail Send Succesfully!');
		 }else{
			 alert('Mail Sending Error!');
	 }
 });
}
