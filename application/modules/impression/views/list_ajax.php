    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

       <form class="navbar-form" role="search">

          <div class="input-group add-on">

             <input class="form-control" placeholder="Search by style number" name="srchterm" type="text">

             <div class="input-group-btna">

                <button class="" type="submit"><i class="icon-search"></i></button>

             </div>

          </div>

       </form>
    </div>
    <?php

    if(!empty($product_list)){

    foreach ($product_list as $product) {?>

        <div class="gallery-product col-lg-3 col-md-3 col-sm-3 col-xs-12">

            <div class="pro-wrap">

                <a href="<?php echo base_url('impression/style/'.$product->product_id); ?>">

                <?php if(isset($product_image_array[$product->product_id]) && strlen(trim($product_image_array[$product->product_id])) ){

               $img_src="https://res.cloudinary.com/".CLOUDNARYNAME."/image/upload/c_fill,g_faces:center,h_400,w_300/".$product_image_array[$product->product_id];
                }else{ 

               $img_src=base_url('assets/images/no_image.png');

                } ?>
                <img src="<?php echo $img_src;?>" class="img-responsive"></a>

                <div class="style-no ">style <?php echo $product->product_name; ?></div>

                    <span data-id="<?php echo $product->product_id; ?>" class="icon icon-favorite-heart-button like-count fav <?php if(isset($user_favs)  && in_array($product->product_id, $user_favs)){}else{ echo 'inverse';} ?>"></span>
            </div>
        </div>
    <?php } }else{
      echo "No Style found for give criteria";
      //echo "<p class='alert alert-danger'>No Style found for give criteria</p>";
    } ?>
<?php //echo $links; ?>