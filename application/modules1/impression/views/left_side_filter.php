<style type="text/css">
    .ib{
        display: inline-block !important;
    }
    .cradio{
        cursor: pointer !important;
        margin-left: 0px !important;
    }
</style>
<?php foreach ($sub_catlist as $key => $value) {
    $cat_list[$value['cat_id']]=$value['cat_name'];
    $subcat[$value['cat_id']][$value['sub_cat_id']]=$value['sub_cat_name'];
} ?>
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
    <div class="row">
        <?php if(!isset($do_not_insert)){ ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form class="navbar-form" role="search">
                <div class="input-group add-on">
                    <input class="form-control" placeholder="ex. 10477" name="srchterm" type="text">
                    <div class="input-group-btna">
                        <button class="" type="submit"><i class="icon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <?php } ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="nav-group">
            <h5>Collections</h5>
                <ul> <?php $id=1; ?>
                    <li><a href="<?php echo base_url('impression/collection/1'); ?>"><h6>Wedding</h6></a></li>
                    <?php foreach ($brands_list as $key => $value) { ?>
                    <li><div class="checkbox"><input id="<?php echo $id; ?>" class="cradio ml-0" type="checkbox" name="brand_id[]" data-style="brand" data-id="<?php echo $value->brand_id; ?>"><label for="<?php echo $id; ?>"><?php echo $value->brand_name; ?></label></div></li>
                    <?php $id++; } ?>
                    <li><a href="<?php echo base_url('impression/collection/2'); ?>"><h6>bridesmaid</h6></a></li>
                    <li><a href="<?php echo base_url('impression/collection/3'); ?>"><h6>proM / special ocassions</h6></a></li>
                </ul>
            </div>
            <?php foreach ($cat_list as $key => $value) { if(isset($subcat[$key]) && !empty($subcat[$key])) { ?>
                <div class="nav-group">
                    <h5><?php echo $value; ?></h5>
                    <ul class="bold-text">
                        <?php foreach ($subcat[$key] as $key1 => $value1) { ?>
                        <li><div class="checkbox"><input id="<?php echo $id; ?>" class="cradio ml-0" type="checkbox" name="sub_cat_id[]" data-style="sub_cat_id" data-id="<?php echo $key1; ?>"><label for="<?php echo $id; ?>"><?php echo $value1; ?></label></div></li>
                        <?php $id++; } ?>
                    </ul>
                </div>
            <?php } } ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(document).on('change','.cradio',function(e){
            brand=[];sub_cat=[];
            $('.cradio:checkbox:checked').each(function(index, el) {
                if($(this).data('style')=='brand'){
                    brand.push($(this).data('id'));

                }else if($(this).data('style')=='sub_cat_id'){
                     sub_cat.push($(this).data('id'));
                }
            });
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var data={brand:brand,sub_cat:sub_cat,[csrfName]:csrfHash};
            $.post("<?php echo base_url('impression/impression_search') ?>", data, 
                function(data, textStatus, xhr) {
                    $(".targetdivajax").html(data);
                });
        })
    });
</script>