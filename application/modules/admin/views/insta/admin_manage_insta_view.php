<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/css/jquery.fileupload.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/css/jquery.fileupload-ui.css" />
<style type="text/css">
textarea {
    resize: none;
}
.img-responsive{
    display: block;
    max-width: 100%;
    height: auto;
}
.iconWrap{
    position: absolute;
    top: 2px;
    right: 17px;
    color: red;
    height: 25px;
    width: 25px;
    background: rgba(0,0,0, 0.5);
    border-radius: 100%;
    font-size: 17px;
    padding: 0px 8px;   
}
.lefticonWrap{
    position: absolute;
    top: 2px;
    left: 17px;
    color: red;
    height: 25px;
    width: 25px;
    background: rgba(0,0,0, 0.5);
    border-radius: 100%;
    font-size: 17px;
    padding: 0px 8px;   
}
.error{
      border: 1px solid red;
    }
.errorText{
  color: red;
  font-weight: 500;
}
.imgh{
    height: 165px;
    margin-left: 15px;
}

.pullRight{
    float: right;
}
</style>
<div class="page">
    <div class="page-content container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-header">
                    <h1 class="page-title"><?php if(isset($link_details->short_desc)&& strlen(trim($link_details->short_desc))) { echo "Manage Link"; }else{ "Add New Instagram Link"; } ?></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/instagram'); ?>">Instagram Image List</a></li>
                        <li class="breadcrumb-item active">Manage Link</li>
                    </ol>
                </div>
            </div>
            <!-- start from here -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 mt-20">
                    <?php if($this->session->flashdata('error')) { ?>
                    <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
                    <?php } ?>
                    <?php if($this->session->flashdata('success')) { ?>
                        <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
                    <?php } ?>
                        <?php $arr=array('class'=>"form-horizontal");
                            echo form_open_multipart('admin/add_update_insta',$arr); ?>
                            <div class="form-group row">
                                <label for="Image Short name" class ="form-control-label col-sm-3 col-xl-2">Image Short Name</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="text" class="form-control" name="short_desc" placeholder="Enter short name" value="<?php if(isset($link_details->short_desc) && strlen(trim($link_details->short_desc))) { echo html_escape($link_details->short_desc); } ?>"/>
                                    <?php if(isset($link_details->insta_link_id)){ ?>
                                    <input type="hidden" name="insta_link_id" value="<?php echo $link_details->insta_link_id; ?>">
                                    <?php }  ?>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Link name" class ="form-control-label col-sm-3 col-xl-2">Link</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="text" class="form-control link_desc" name="link_desc" placeholder="Enter Link" value="<?php if(isset($link_details->link_desc) && strlen(trim($link_details->link_desc))) { echo html_escape($link_details->link_desc); } ?>"/>
                                </div>
                            </div>
                            <?php
                            if(isset($link_details->image) && strlen(trim($link_details->image))) { 
                                $url=html_escape($link_details->image);
                            }else{
                                $url=base_url('assets/images/no_image.png');
                            } ?>
                            <div class="form-group row">
                                <label for="Image Link" class ="form-control-label col-sm-3 col-xl-2">Image Link</label>
                                <img src="<?php echo $url;  ?>" id="insta_img" class="img-responsive imgh" alt="Intagram Image">
                            </div>
                            <div class="form-group row">
                                <label for="Image Link" class ="form-control-label col-sm-3 col-xl-2">Image Link</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="text" readonly class="form-control" id="image" name="image" placeholder="Enter image link" value="<?php if(isset($link_details->image) && strlen(trim($link_details->image))) { echo html_escape($link_details->image); } ?>"/>
                                </div>
                            </div>
                            <div class=""><!-- col-md-9 offset-md-3 -->
                                <button type="submit" class="btn-primary btn pullRight">Update</button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    jQuery(document).ready(function($) {
        $(".link_desc").blur(function(event) {
            var url=$(this).val();
           // if(ValidURL(url))
            {
                $(".link_desc").removeClass('error'); 
                 var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
                csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
                var data={url:url,[csrfName]:csrfHash};
                $.post("<?php echo base_url('admin/get_instagramimage') ?>", data, 
                    function(data, textStatus, xhr) {
                        if(data!="fail")
                        {
                            $("#insta_img").attr("src",JSON.parse(data));
                            $("#image").val(JSON.parse(data));
                        }
                });
            }
            //else{
               //$(".link_desc").addClass('error'); 
            //}
        });
    });
function ValidURL(str) {
  var pattern = new RegExp('^(https?:\/\/)?'+ // protocol
    '((([a-z\d]([a-z\d-]*[a-z\d])*)\.)+[a-z]{2,}|'+ // domain name
    '((\d{1,3}\.){3}\d{1,3}))'+ // OR ip (v4) address
    '(\:\d+)?(\/[-a-z\d%_.~+]*)*'+ // port and path
    '(\?[;&a-z\d%_.~+=-]*)?'+ // query string
    '(\#[-a-z\d_]*)?$','i'); // fragment locater
  if(!pattern.test(str)) {
    alert("Please enter a valid URL.");
    return false;
  } else {
    return true;
  }
}
</script>


