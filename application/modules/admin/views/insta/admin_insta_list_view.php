<!-- Page -->
<style type="text/css">
    @media (min-width: 768px) and (max-width: 991px){
        
    }
    .btnleft{
        margin-left: 28px;
    }
    .btnright{
        margin-right: 28px;
    }
</style>
<div class="page">
    <div class="page-header">
        <h1 class="page-title"><?php echo $page; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $page; ?></li>
        </ol>
    </div>
    <div class="page-content container-fluid">
        <div class="panel-body">
            <a href="<?php echo base_url('admin/manage_insta'); ?>" id="add_store" class="btn btn-success btnleft">Add Instagram Link</a>
            <table id="story_list_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive">
            <thead>
              <tr>
                <th>Link Id</th>
                <th>Link Name</th>
                <th>status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($insta_list as $story) { ?>
                    <tr>
                        <td><?php echo $story->insta_link_id; ?></td>
                        <td><?php echo $story->short_desc; ?></td>
                        <td><input type="checkbox" data-id="<?php echo $story->insta_link_id; ?>" data-pk="insta_link_id" data-type="insta" class="switch" <?php if($story->is_active=='true'){echo 'checked';} ?> /></td>
                        <td><a href="<?php echo base_url('admin/manage_insta/'.$story->insta_link_id);?>" class="btn btn-primary" role="button">Manage</a>
                        <button data-id="<?php echo $story->insta_link_id; ?>" class="btn btn-danger delete_story">Delete</button></td>
                    </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>
    </div>
</div>
<!-- End Page -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var table=$("#story_list_table").DataTable( {
            "order": [[ 0, "asc" ]],
            "bAutoWidth": true,
            stateSave: true,
            responsive: true,
            "fnDrawCallback": function(e) {
                var elems = Array.prototype.slice.call(document.querySelectorAll('.switch'));
                elems.forEach(function(elem) {
                    if(!elem.hasAttribute("data-switchery")){
                        var switchery = new Switchery(elem,{color: '#3aa99e',secondaryColor: '#FF0000'});    
                    }
                });
                }
            })
        $("#story_list_table_length").append($("#add_store"));

        $(".switch").change(function(event) {
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var changeCheckbox = $(this)[0];//target
            var data={is_active:changeCheckbox.checked,pk_id:$(changeCheckbox).data('id'),type:$(changeCheckbox).data('type'),[csrfName]:csrfHash};
            $.post("<?php echo base_url('admin/changeAllStatus') ?>", data, 
                function(data, textStatus, xhr) {
                    if(changeCheckbox.checked)
                    {
                        toastr_type="success";
                        str="Instagram Link Approved successfully";
                    }else{
                        toastr_type="warning";
                        str="Instagram Link was disapproved";
                    }
                    toastr.options = {
                      "closeButton": true
                    }
                    toastr[toastr_type](str);
            });
        });

        $(".delete_story").click(function(event){
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var row = table.row($(this).parents('tr'));
            data={[csrfName]:csrfHash,story_id:$(this).data('id'),is_secure_request:'uKrt)6'};
             bootbox.confirm({
                message: "Are you Sure, You want to delete this Link?",
                callback: function (result) {
                    if(result==true)
                    {
                        $.post("<?php echo base_url('admin/delete_insta') ?>", data, 
                            function(data, textStatus, xhr) {
                                row.remove().draw();
                                toastr.success("Link was successfully deleted");
                        });
                    }
                }
            })
        });
    });
</script>