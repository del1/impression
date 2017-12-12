<link href="<?php echo base_url('assets/css/collections1.css'); ?>" rel="stylesheet">
<?php foreach ($sub_catlist as $key => $value) {
    $cat_list[$value['cat_id']]=$value['cat_name'];
    $subcat[$value['cat_id']][$value['sub_cat_id']]=$value['sub_cat_name'];
} 
 foreach ($season_list as $key => $value) { 
        $season_array[$value->season_id]=$value->season;
    }
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/collection.js'); ?>"></script>
<section id="collections">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-4">
                <h1>FILTERS</h1>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <a class="btn btn-default btn-select">
                    <input type="hidden" class="btn-select-input" id="category-filter" data-param="cat" value="">

                    <?php if(isset($_GET['cat'])) { ?>
                        <span class="category-value btn-select-value"><?php echo $season_array[$_GET['cat']];?></span>
                    <?php }else{ ?>
                        <span class="category-value btn-select-value">Category</span>
                    <?php } ?>
                    <span class="btn-select-arrow glyphicon glyphicon-chevron-down"></span>
                    <ul class="category-dropdown" style="display: none;">
                        <?php foreach ($season_list as $key => $value) { ?>
                            <li value="<?php echo $value->season_id ?>"><?php echo $value->season ?></li>
                        <?php } ?>
                    </ul>
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                <a href="<?php echo base_url('impression/collection'); ?>" class="btn btn-default btn-reset" id="reset">Reset</a>
            </div>
            <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <form>
                  <input type="text" name="search" placeholder="Enter Style Number or Keywords">
                </form>
            </div> -->
        </div>
    </div>
    <div class="container container-padding">
        <div class="searchMenus">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <a class="btn btn-default btn-select">
                        <input type="hidden" class="btn-select-input" id="silhoutte-filter" data-param="sil" value="">
                        <?php if(isset($_GET['sil'])) { ?>
                        <span class="silhouette-value btn-select-value"><?php echo $subcat[2][$_GET['sil']];?></span>
                        <?php }else{ ?>
                            <span class="silhouette-value btn-select-value">Silhouette</span>
                        <?php } ?>
                        
                        <span class="btn-select-arrow glyphicon glyphicon-chevron-down"></span>
                        <ul class="silhouette-dropdown" style="display: none;">
                            <?php foreach ($subcat[2] as $key => $value) { ?>
                                <li value="<?php echo $key; ?>"><?php echo $value; ?></li>
                            <?php } ?>
                        </ul>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <a class="btn btn-default btn-select">
                        <input type="hidden" class="btn-select-input" id="neckline-filter" data-param="neck" value="">
                        <?php if(isset($_GET['neck'])) { ?>
                        <span class="neckline-value btn-select-value"><?php echo $subcat[3][$_GET['neck']];?></span>
                        <?php }else{ ?>
                            <span class="neckline-value btn-select-value">Neckline</span>
                        <?php } ?>
                        <span class="btn-select-arrow glyphicon glyphicon-chevron-down"></span>
                        <ul class="neckline-dropdown" style="display: none;">
                            <?php foreach ($subcat[3] as $key => $value) { ?>
                                <li value="<?php echo $key; ?>"><?php echo $value; ?></li>
                            <?php } ?>
                        </ul>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <a class="btn btn-default btn-select">
                        <input type="hidden" class="btn-select-input" id="waistline-filter" data-param="waist" value="">
                        <?php if(isset($_GET['waist'])) { ?>
                        <span class="waistline-value btn-select-value"><?php echo $subcat[4][$_GET['waist']];?></span>
                        <?php }else{ ?>
                            <span class="waistline-value btn-select-value">Waistline</span>
                        <?php } ?>
                        <span class="btn-select-arrow glyphicon glyphicon-chevron-down"></span>
                        <ul class="waistline-dropdown" style="display: none;">
                            <?php foreach ($subcat[4] as $key => $value) { ?>
                                <li value="<?php echo $key; ?>"><?php echo $value; ?></li>
                            <?php } ?>
                        </ul>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".btn-select").each(function (e) {
            var value = $(this).find("ul li.selected").html();
            if (value != undefined) {
                $(this).find(".btn-select-input").val(value);
                $(this).find(".btn-select-value").html(value);
            }
        });
    });
</script>