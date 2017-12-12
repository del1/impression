<style type="text/css">
    .ib{
        display: inline-block !important;
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
                    <input class="form-control" placeholder="ex. 10477" name="srch-term" type="text">
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
                <ul>
                    <li><a href="<?php echo base_url('impression/collection/1'); ?>"><h6>Wedding</h6></a></li>
                    <?php foreach ($brands_list as $key => $value) { ?>
                     <li><div class="checkbox"><input type="checkbox" data-style="brand" data-id="<?php echo $value->brand_id; ?>"><a href="<?php echo base_url('impression/brand/'.$value->brand_id); ?>" class=""><?php echo $value->brand_name; ?></a></div></li>
                    <?php } ?>
                    <li><a href="<?php echo base_url('impression/collection/2'); ?>"><h6>bridesmaid</h6></a></li>
                    <li><a href="<?php echo base_url('impression/collection/3'); ?>"><h6>proM / special ocassions</h6></a></li>
                </ul>
            </div>
            <?php foreach ($cat_list as $key => $value) { if(isset($subcat[$key]) && !empty($subcat[$key])) { ?>
                <div class="nav-group">
                    <h5><?php echo $value; ?></h5>
                    <ul class="bold-text">
                        <?php foreach ($subcat[$key] as $key1 => $value1) { ?>
                            <li><a href="<?php echo base_url('impression/subcat/'.$key1); ?>"><?php echo $value1; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } } ?>
        </div>
    </div>
</div>