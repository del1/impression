<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/css/jquery.fileupload.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/css/jquery.fileupload-ui.css" />
<!-- Page -->
<style type="text/css">
    @media (min-width: 768px) and (max-width: 991px){
        
    }
    .btnadd{
        margin-left: 28px;
    }
</style>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Manage All Assets</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Manage All Assets</li>
        </ol>
    </div>
    <div class="page-content container-fluid">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h3>Collection List</h3>
                    <!-- <a href="#" data-toggle="modal" data-target="#modalUpload" class="btn btn-danger">Upload season data</a> -->
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                    <a href="<?php echo base_url('admin/season'); ?>" class="btn btn-danger">Manage Season's</a>
                    <a href="#" data-toggle="modal" data-target="#modal" class="btn btn-warning fav">View Popular styles</a>
                    <a href="<?php echo base_url('admin/all_products/');?>" class="btn btn-success" role="button">View All Style List</a>
                </div>
            </div>
            <table id="collection_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Collection Number</th>
                        <th>Name</th>
                        <th>Status</th>
                       <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($collection_list as $collection) { ?>
                    <tr>
                        <td><?php echo $collection->collection_id; ?></td>
                        <td><?php echo $collection->collection_name; ?></td>
                        <td><input type="checkbox" data-id="<?php echo $collection->collection_id; ?>" data-pk="collection_id" data-type="ref_coll" class="switch-collection" <?php if($collection->is_active=='true'){echo 'checked';} ?> /></td>
                        <!-- <td><a href="<?php //echo base_url('admin/manage_collection/'.$collection->collection_id);?>" class="btn btn-primary" role="button">Manage</a> -->
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>Brands List</h3>
                </div>
            </div>
            <a role="button" href="<?php echo base_url('admin/manage_brand'); ?>" id="add_brand" class="btn btn-primary btnadd">Add Brand</a>
            <table id="brand_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive" >
                <thead>
                    <tr>
                        <th>Brand Number</th>
                        <th>Brand Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($brands_list as $brand) { ?>
                    <tr>
                        <td><?php echo $brand->brand_id; ?></td>
                        <td><?php echo $brand->brand_name; ?></td>
                        <td><input type="checkbox" data-id="<?php echo $brand->brand_id; ?>" data-pk="brand_id" data-type="ref_brand" class="switch-brands" <?php if($brand->is_active=='true'){echo 'checked';} ?> /></td>
                        <td><a  href="<?php echo base_url('admin/manage_brand/'.$brand->brand_id);?>" class="btn btn-primary" role="button">Manage</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal modal-transparent modal-fullscreen fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container">
                <div class="modal-header">
                    <h3><span id="username"></span> Most Popular styles</h3>
                </div>
                <div class="modal-body">
                    <div class="row row-centered" id="targetBody">
                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
                </div>
            </div>
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
                var elems = Array.prototype.slice.call(document.querySelectorAll('.switch-collection'));
                elems.forEach(function(elem) {
                    if(!elem.hasAttribute("data-switchery")){
                        var switchery = new Switchery(elem,{color: '#3aa99e',secondaryColor: '#FF0000'});    
                    }
                });
            }
        })
        var table1=$("#brand_table").DataTable( {
            "order": [[ 0, "asc" ]],
            "bAutoWidth": true,
            stateSave: true,
            responsive: true,
            "fnDrawCallback": function(e) {
                var elems = Array.prototype.slice.call(document.querySelectorAll('.switch-brands'));
                elems.forEach(function(elem) {
                    if(!elem.hasAttribute("data-switchery")){
                        var switchery = new Switchery(elem,{color: '#3aa99e',secondaryColor: '#FF0000'});    
                    }
                });
            }
        })
        $("#brand_table_length").append($("#add_brand"));
    
    
    $(".switch-collection,.switch-brands").change(function(event) {
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var changeCheckbox = $(this)[0];//target
            var data={is_active:changeCheckbox.checked,pk_id:$(changeCheckbox).data('id'),type:$(changeCheckbox).data('type'),[csrfName]:csrfHash};
            $.post("<?php echo base_url('admin/changeAllStatus') ?>", data, 
                function(data, textStatus, xhr) {
                    console.log(data);
                    if(changeCheckbox.checked)
                    {
                        toastr_type="success";
                        str="Store Activated successfully";
                    }else{
                        toastr_type="warning";
                        str="Store Deactivated successfully";
                    }
                    toastr.options = {
                      "closeButton": true
                    }
                    toastr[toastr_type](str);
            });
        });
    });
    $(".fav").click(function(event) { 
        var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
        csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
        var data={[csrfName]:csrfHash};
        $.post("<?php echo base_url('admin/mostFavourites') ?>", data, 
            function(data, textStatus, xhr) {
                $("#targetBody").html(data);
        });
    });
</script>