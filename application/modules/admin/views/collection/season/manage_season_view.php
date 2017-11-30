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

.pullRight{
    float: right;
}
</style>
<div class="page">
    <div class="page-content container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-header">
                    <h1 class="page-title"><?php if(isset($season_details->season)&& strlen(trim($season_details->season))) { echo "Manage Season"; }else{ "Add New Season"; } ?></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/collection_list'); ?>">Collection</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/season'); ?>">Season List</a></li>
                        <li class="breadcrumb-item active">Manage Season</li>
                    </ol>
                </div>
            </div>
            <!-- start from here -->
            <div class="panel-body">
                <div class="row mt-20">
                    <?php if(isset($season_details->season_id)){ ?>
                        <div class="col-sm-9 col-md-9 ">
                    <?php } else{ ?>
                        <div class="col-sm-12 col-md-12 mt-20">
                    <?php }  ?>   
                    <?php if($this->session->flashdata('error')) { ?>
                    <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
                    <?php } ?>
                    <?php if($this->session->flashdata('success')) { ?>
                        <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
                    <?php } ?>
                        <?php $arr=array('class'=>"form-horizontal");
                            echo form_open_multipart('admin/upload_season',$arr); ?>
                            <div class="form-group row">
                                <label for="Season name" class ="form-control-label col-sm-3 col-xl-2">Season Name</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="text" class="form-control" name="season" placeholder="Enter season name" value="<?php if(isset($season_details->season) && strlen(trim($season_details->season))) { echo html_escape($season_details->season); } ?>"/>
                                    <?php if(isset($season_details->season_id)){ ?>
                                    <input type="hidden" name="season_id" value="<?php echo $season_details->season_id; ?>">
                                    <?php }  ?>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Store Address" class ="form-control-label col-sm-3 col-xl-2">Upload season data</label>
                                <div class="col-sm-9 col-xl-10">
                                    <span class="btn btn-sm btn-success fileinput-button">
                                    <i class="fa fa-plus"></i>
                                    <span>Add data file...</span>
                                    <input id="uploadCsv" type="file" name="userfile" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                </span>
                                </div>
                            </div>
                            <div class=""><!-- col-md-9 offset-md-3 -->
                                <button type="submit" class="btn-primary btn pullRight">Update</button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                    <?php if(isset($season_details->season_id)){ ?>
                        <div class="col-sm-3 col-md-3 ">
                            <?php $arr=array('class'=>"form-horizontal");
                            echo form_open_multipart('admin/extract_zip_upload',$arr); ?>
                            <div class="form-group row mt-20">
                                <label for="Store Address" class ="form-control-label col-sm-4 col-xl-4 col-xs-12">Images zip file name</label>
                                <div class="col-sm-8 col-xl-8 col-xs-12 text-right">
                                    <input type="text" class="form-control" name="filename" placeholder="Enter file name" value=""/>
                                    <?php if(isset($season_details->season_id)){ ?>
                                        <input type="hidden" name="season_id" value="<?php echo $season_details->season_id; ?>">
                                    <?php }  ?>
                                </div>
                                <div class="col-sm-12 col-xl-12 col-xs-12 text-right">
                                    <button type="submit" class="btn-primary btn pullRight">Submit </button>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                        </div>    
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
            $(".checkBoxChange").change(function(event) {
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var changeCheckbox = $(this)[0];//target
            var data={is_active:changeCheckbox.checked,pk_id:$(changeCheckbox).data('id'),type:$(changeCheckbox).data('type'),[csrfName]:csrfHash};
            $.post("<?php echo base_url('admin/changeAllStatus') ?>", data, 
                function(data, textStatus, xhr) {
            });
        });
</script>


