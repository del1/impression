<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/css/jquery.fileupload.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/css/jquery.fileupload-ui.css" />
<!-- Page -->
<style type="text/css">
    @media (min-width: 768px) and (max-width: 991px){
        
    }
    .btnadd{
        margin-left: 28px;
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
<style type="text/css">
textarea {
    resize: none;
}

</style>

<div class="page">
    <div class="page-header">
        <h1 class="page-title">Season list</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/collection_list'); ?>">Collection</a></li>
            <li class="breadcrumb-item active">Season list</li>
        </ol>
    </div>
    <div class="page-content container-fluid">
        <div class="panel-body">
            <?php if($this->session->flashdata('successProduct')) { ?>
            <label class="badge-md badge-outline badge-success">Product uploaded successfully  </label>:
                <?php foreach ($this->session->flashdata('successProduct') as $key => $value) { ?>
                    <span class="badge badge-success"><?php echo $value; ?></span>&nbsp;&nbsp;
                <?php } ?>
                <br><br>
            <?php } ?>
            <?php if($this->session->flashdata('failedProduct')) { ?>
            <label class="badge-md badge-outline badge-danger">Product Failed to process  </label>:
                <?php foreach ($this->session->flashdata('failedProduct') as $key => $value) { ?>
                    <span class="badge badge-danger"><?php echo $value; ?></span>&nbsp;&nbsp;
                <?php } ?>
                <br><br>
            <?php } ?>
            <a href="<?php echo base_url('admin/manage_season/');?>" id="add_season" class="btn btn-success btnadd" role="button">Add new season</a>
            <table id="collection_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Season Id</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($season_list as $season) { ?>
                    <tr>
                        <td><?php echo $season->season_id; ?></td>
                        <td><?php echo $season->season; ?></td>
                        <td><input type="checkbox" data-id="<?php echo $season->season_id; ?>" data-pk="season_id" data-type="ref_season" class="switch" <?php if($season->is_active=='true'){echo 'checked';} ?> /></td>
                        <td><a href="<?php echo base_url('admin/manage_season/'.$season->season_id);?>" class="btn btn-primary" role="button">Manage</a>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal modal-transparent modal-fullscreen fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container">
                <div class="modal-header">
                    <h3><span id="username"></span> Upload season file</h3>
                </div>
                <div class="modal-body">
                    <div class="row row-centered">
                        <div class="col-sm-12 col-md-12 mt-20">
                        <?php $arr=array('class'=>"form-horizontal");
                            echo form_open_multipart('admin/upload_season',$arr); ?>
                            <div class="form-group row">
                                <label for="Store Address" class ="form-control-label col-sm-5 col-xl-2">Choose season file</label>
                                <div class="col-sm-7 col-xl-10">
                                    <span class="btn btn-sm btn-success fileinput-button">
                                    <i class="fa fa-plus"></i>
                                    <span>Add files...</span>
                                    <input id="uploadImage" type="file" name="usercsv" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" multiple>
                                </span>
                                </div>
                            </div>
                            <div class=""><!-- col-md-9 offset-md-3 -->
                                <button type="submit" class="btn-primary btn pullRight">Submit</button>
                            </div>
                        <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Page -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var table=$("#collection_table").DataTable( {
            "order": [[ 0, "asc" ]],
            "bAutoWidth": true,
            stateSave: true,
            responsive: true,
            'info': false,
            "fnDrawCallback": function(e) {
                var elems = Array.prototype.slice.call(document.querySelectorAll('.switch'));
                elems.forEach(function(elem) {
                    if(!elem.hasAttribute("data-switchery")){
                        var switchery = new Switchery(elem,{color: '#3aa99e',secondaryColor: '#FF0000'});    
                    }
                });
            }
        })

        $("#collection_table_length").append($("#add_season"));
    });
</script>