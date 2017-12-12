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
            <div class="col-xl-12">
              <!-- Example Tabs -->
                <div class="example-wrap">
                    <div class="nav-tabs-horizontal" data-plugin="tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#allstyle"
                              aria-controls="allstyle" role="tab">All styles</a></li>
                            <li class="nav-item viewPopular" role="presentation"><a class="nav-link" data-toggle="tab" href="#popularview"
                              aria-controls="popularview" role="tab">View Popular</a></li>
                            <li class="nav-item addnew" role="presentation"><a class="nav-link" data-toggle="tab" href="#addnew"
                              aria-controls="addnew" role="tab">Add New</a></li>
                            <li class="nav-item dataimport" role="presentation"><a class="nav-link" data-toggle="tab" href="#bulkimport" aria-controls="bulkimport" role="tab">Bulk Import</a></li>
                              <li class="nav-item" role="presentation"><a class="nav-link btnright" href="<?php echo base_url('admin/exportStyleList'); ?>" role="button">Download</a></li>
                        </ul>
                        <div class="tab-content pt-20">
                            <div class="tab-pane active" id="allstyle" role="tabpanel">
                                <?php $this->load->view('admin/collection/ajax/product/ajax_admin_all_product_list'); ?>
                            </div>
                            <div class="tab-pane" id="popularview" role="tabpanel">
                             
                            </div>
                            <div class="tab-pane" id="addnew" role="tabpanel">
                             
                            </div>
                            <div class="tab-pane" id="bulkimport" role="tabpanel">
                            </div>
                            <div class="tab-pane" id="Download" role="tabpanel">
                              
                            </div>
                        </div>
                    </div>
                </div>
              <!-- End Example Tabs -->
            </div>


            <div class="col-xl-12">
              <!-- Example Tabs -->
                <div class="example-wrap">
                    <div class="nav-tabs-horizontal" data-plugin="tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item list2" role="presentation" data-target="collectionlist"><a class="nav-link active" data-toggle="tab" href="#collectionlist" aria-controls="collectionlist" role="tab">Collections</a></li>
                            <li class="nav-item list2" role="presentation" data-target="brandlist"><a class="nav-link" data-toggle="tab" href="#brandlist" aria-controls="brandlist" role="tab">Brands</a></li>
                            <li class="nav-item list2" role="presentation" data-target="seasonlist"><a class="nav-link" data-toggle="tab" href="#seasonlist" aria-controls="seasonlist" role="tab">Season's</a></li>
                        </ul>
                        <div class="tab-content pt-20">
                            <div class="tab-pane active" id="collectionlist" role="tabpanel">
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
                            <div class="tab-pane" id="brandlist" role="tabpanel">
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
                            <div class="tab-pane" id="seasonlist" role="tabpanel">
                               <a href="<?php echo base_url('admin/manage_season/');?>" id="add_season" class="btn btn-success btnadd" role="button">Add new season</a>
                                <table id="season_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive">
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
                </div>
              <!-- End Example Tabs -->
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h3>Collection List</h3>
                    <!-- <a href="#" data-toggle="modal" data-target="#modalUpload" class="btn btn-danger">Upload season data</a> -->
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                    <a href="<?php echo base_url('admin/season'); ?>" class="btn btn-danger">Manage Season's</a>
                    <a href="#" data-toggle="modal" data-target="#modal" class="btn btn-warning viewPopular">View Popular styles</a>
                    <a href="<?php echo base_url('admin/all_products/');?>" class="btn btn-success" role="button">View All Style List</a>
                </div>
            </div>

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

        $(document).on('click', '.list2', function(event) {
            //event.preventDefault();
            $(".list2").removeClass('active');
            var id=$(this).data("target");
            console.log(id);
            $("#"+id).addClass('active');
        });




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


        var table=$("#season_table").DataTable( {
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
        $("#season_table_length").append($("#add_season"));
    
    
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
    $(".viewPopular").click(function(event) { 
        var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
        csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
        var data={[csrfName]:csrfHash};
        $.post("<?php echo base_url('admin/mostFavourites') ?>", data, 
            function(data, textStatus, xhr) {
                $(".tab-pane").removeClass('active');
                $("#popularview").addClass('active');
                $("#popularview").html(data);
        });
    });
    $(".addnew").click(function(event) { 
        var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
        csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
        var data={[csrfName]:csrfHash};
        $.post("<?php echo base_url('admin/manage_product') ?>", data, 
            function(data, textStatus, xhr) {
                $(".tab-pane").removeClass('active');
                $("#addnew").addClass('active');
                $("#addnew").html(data);
        });
    });
    $(".dataimport").click(function(event) { 
        var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
        csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
        var data={[csrfName]:csrfHash};
        $.post("<?php echo base_url('admin/manage_season') ?>", data, 
            function(data, textStatus, xhr) {
                $(".tab-pane").removeClass('active');
                $("#bulkimport").addClass('active');
                $("#bulkimport").html(data);
        });
    });
</script>