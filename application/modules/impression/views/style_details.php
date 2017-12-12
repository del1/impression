  <style type="text/css">
    .fav{
        cursor: pointer;
    }
    .inverse {
    color: inherit !important;
    }
</style>

<section id="collectionsSlider" class="collectionsSlider">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><a href="<?php echo base_url('impression/collection'); ?>">Collection</a></li>
                        <li>style <?php echo $product_details->product_name; ?></li>
                    </ul>
                </div>
            </div>

            <?php 
            //processing all data
            foreach ($product_subcat_list as $subcat) {
                $product_subcats_array[]= $subcat->sub_cat_id;
            }

            foreach ($brands_list as $brand) {
                $brands_array[$brand->brand_id]=$brand->brand_name;
            }

            foreach ($sub_catlist as $subcat) {
                $cat_subcat_array[$subcat->cat_id][]=$subcat->sub_cat_id;
                $subcat_array[$subcat->sub_cat_id]=$subcat->sub_cat_name;
            }

            if(!empty($user_favorite_products))
            foreach ($user_favorite_products as $favorite) {
              $user_favs[]=$favorite['product_id'];
            }

            foreach ($season_list as $season) {
                $season_array[$season->season_id]=$season->season;
            }
            ?>
            <div class="row">
              <div class="rightContent">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                        <!-- <nav id="cd-vertical-nav">
                            <ul>
                                <li>
                                    <a href="#section1" data-number="1">
                                        <span class="cd-dot"></span>
                                        <span class="cd-label">Intro</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#section2" data-number="2">
                                        <span class="cd-dot"></span>
                                        <span class="cd-label">About</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#section3" data-number="3">
                                        <span class="cd-dot"></span>
                                        <span class="cd-label">Features</span>
                                    </a>
                                </li>
                            </ul>
                        </nav> -->
                    </div>
                    <div class="desktopView">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 spaceMin ">
                            <?php if(!empty($product_images_list)){
                            foreach ($product_images_list as $image) { ?>
                                <section id="segment130" class="cd-section productShow">
                                    <img src="<?php echo 'https://res.cloudinary.com/'.CLOUDNARYNAME.'/image/upload/h_590/'.$image['doc_path']; ?>" class="img-responsive">
                                </section>
                            <?php } }else{?>
                                <section id="segment130" class="cd-section productShow">
                                    <img src="<?php echo 'https://res.cloudinary.com/'.CLOUDNARYNAME.'/image/upload/h_590/v1509129991/bwkt7tvcmhwyynkvq0ec.jpg'; ?>" class="img-responsive">
                                </section>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="fixedRight">
                            <div class="sliderLink">
                                <h1>impression bridal</h1>
                                <h2>Style <?php echo $product_details->product_name; ?></h2>
                                <div class="socialIcons">
                                  <ul>
                                    <li><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li><a href="#"><span class="icon-insta"></span></a></li>
                                    <!-- <li><a href="#"><span class="icon-pin"></span></a></li> -->
                                  </ul>
                                </div>
                                <h3>Details</h3>
                                <div class="description">
                                    <div class="row no-gutter">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php foreach ($catagory_list as $caragory) { ?>
                                        <div class="data">
                                            <h4><?php echo $caragory->cat_name; ?></h4>
                                            <p><?php $str=''; foreach ($product_subcats_array as $key => $value) { 
                                            if(in_array($value, $cat_subcat_array[$caragory->cat_id]))
                                                $str.=$subcat_array[$value].", ";
                                            } 
                                            echo rtrim(trim($str), ',');
                                            ?>
                                        </div>
                                        <?php } ?>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="data">
                                                <h4>Brand</h4>
                                                <p><?php echo $brands_array[$product_details->brand_id]; ?></p>
                                            </div>

                                            <div class="data">
                                                <h4>Season</h4>
                                                <p><?php echo $season_array[$product_details->season_id]; ?></p>
                                            </div>
                                            <div class="data">
                                                <h4>Color</h4>
                                                <p>Ivory, White</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <p><?php echo $product_details->product_desc; ?></p>
                                    </div>
                                </div>
                                <div class="fev-add">
                                    <?php if(isset($_SESSION['User_Id'])) { ?>
                                    <a class="fav" href="javascript:void(0)"><v class="favtext"><?php if(isset($user_favs)  && in_array($product_details->product_id, $user_favs)){
                                        echo "Remove from favorites";
                                    }else{ echo 'Add to favorites';} ?></v>
                                    <span data-id="<?php echo $product_details->product_id;?>" class="icon-favorite-heart-button favTar <?php if(isset($user_favs)  && in_array($product_details->product_id, $user_favs)){}else{ echo 'inverse';} ?>"></span>
                                    <?php }else{?>
                                    <a href="#" data-toggle="modal" data-target="#login-modal">Add to favorites<span class="icon-favorite-heart-button inverse"></span></a>
                                    <?php } ?>
                                </div>
                                <h3>Make an appointment today!</h3>
                                <div class="wrapper-demo">
                					<div id="dd" class="wrapper-dropdown-2" tabindex="1"><span id="chosenStore">Select the store nearest you<span>
                						<ul class="dropdown" style="z-index: 999">
                                            <?php foreach ($store_list as $key => $value) { ?>
                                                <li class="dropdownLi" data-value="<?php echo $value->store_name; ?>"><a href="<?php echo base_url('impression/appointment/'.$value->store_id); ?>"></i><?php echo $value->store_name; ?></a></li>
                                            <?php } ?>
                						</ul>
                					</div>
                				</div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </section>
    <!-- Model Box Section Start -->
    <div class="modelBox">
        <div class="closeIcon">
            <a href=""><i class="icon-cancel"></i></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <?php if(!empty($product_images_list)){
                            foreach ($product_images_list as $image) { ?>
                                <section id="segment131" class="cd-section productShow">
                                     <img src="<?php echo 'https://res.cloudinary.com/'.CLOUDNARYNAME.'/image/upload/h_1130/'.$image['doc_path']; ?>" class="img-responsive" title="eve" alt="eve">
                                </section>
                            <?php } }else{?>
                                <section id="segment131" class="cd-section productShow">
                                     <img src="http://res.cloudinary.com/cmsakoreorg/image/upload/q_100/v1509332024/13099-C_xnku6y.jpg" title="eve" alt="eve">
                                </section>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div> 
  <script type="text/javascript">
    jQuery(document).ready(function($) {

        $(".dropdownLi").click(function(event) {
            $("#chosenStore").html($(this).data('value'));
        });
        $(".fav").click(function(event){ 
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            data={[csrfName]:csrfHash,product_id:$(".favTar").data('id'),is_secure_request:'uKrt)6'};
            $target=$(".favTar");
            $.post("<?php echo base_url('impression/manage_fav') ?>", data, 
                function(data, textStatus, xhr) {
                  if(parseInt(data))
                  {
                    toastr_type="success";
                    str="Style Added to favorites";
                    $(".favtext").html("Remove from favorites");
                    $target.removeClass('inverse');
                  }else{
                    toastr_type="warning";
                    str="Style removed from favorites";
                     $target.addClass('inverse');
                     $(".favtext").html("Add to favorites");
                  } 
                  toastr.options = {
                    "closeButton": false
                    }
                  toastr[toastr_type](str);
            });
        });
    });
</script>
