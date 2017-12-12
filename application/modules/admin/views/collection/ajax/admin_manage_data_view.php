<style type="text/css">
    .makecenters{
        display: block;
        margin: auto;
    }
    .borderr{
        border: 2px solid red;
    }
    .borderb{
        border: 2px solid blue;
    }
</style>
<div class="row">
    <div class="col-sm-4 col-md-4" style="float: left;">
    	<?php $arr=array('class'=>"form-horizontal ");
        echo form_open_multipart('admin/upload_season',$arr); ?>
        <div class="form-group row">
            <label for="Store Address" class ="form-control-label col-sm-6 col-md-6 col-xl-4">Upload Data File</label>
            <div class="col-sm-6 col-md-6 col-xl-6">
                <span class="btn btn-sm btn-success fileinput-button">
                <i class="fa fa-plus"></i>
                <span>Add data file...</span>
                <input id="uploadCsv" type="file" onchange="javascript:updateList()" name="userfile" accept="text/csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
            </span>
            <div id="fileList"></div>
            </div>
        </div>
        <div class="col-sm-12 col-md-10 col-xl-12 "><!-- col-md-9 offset-md-3 -->
            <button type="submit" class="btn-primary btn makecenters">Submit</button>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="col-sm-4 col-md-4 ">
        <?php $arr=array('class'=>"form-horizontal");
        echo form_open_multipart('admin/extract_zip_upload',$arr); ?>
        <div class="form-group row">
            <label for="Store Address" class ="form-control-label col-sm-6 col-xl-6 col-xs-12">Images zip file name</label>
            <div class="col-sm-6 col-xl-6 col-xs-12 text-right">
                <input type="text" class="form-control" name="filename" placeholder="Enter file name" value=""/>
            </div>
            <div class="col-sm-12 col-md-12 col-xl-12">
                <button type="submit" class="btn-primary btn makecenters mt-20">Submit </button>
            </div>
        </div>
    <?php echo form_close(); ?>
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
    updateList = function() {
        var input = document.getElementById('uploadCsv');
        var output = document.getElementById('fileList');
        output.innerHTML = '<ul>';
        for (var i = 0; i < input.files.length; ++i) {
            output.innerHTML += '<li>' + input.files.item(i).name + '</li>';
        }
        output.innerHTML += '</ul>';
    }
</script>
