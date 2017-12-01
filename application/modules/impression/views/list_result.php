<style type="text/css">
    .img-responsive{
        display: block;
        max-width: 100%;
        height: auto;
    }

    .fav:hover{
        -webkit-transform: scale(2.5);
        -moz-transform: scale(2.5);
        -ms-transform: scale(2.5);
        transform: scale(2.5);
    }
    .fav{
        cursor: pointer;
    }

    .pagination li a{
        background-color: #fbf9f2;
        border: #c7bea4 solid 1px;
        color: #c7bea4;
    }
    .pagination li.active a:hover{
        background-color: #e6d6b4;
        border-color: #e6d6b4;
    }
    .pagination li.active a{
        background-color: #e6d6b4;
        border-color: #e6d6b4
    }
    .inverse {
        color: inherit !important;
    }
</style>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/collections.css');?>">

<?php //$this->load->view('impression/Home_topbar');?>

<section id="collection" class="collection">
    <div class="container">

        <div class="row">
         <?php 
           if(!empty($user_favorite_products))
           foreach ($user_favorite_products as $favorite) {
             $user_favs[]=$favorite['product_id'];
           }
        ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb">
                   <?php foreach ($breadCrumb as $key => $value) { if($key!="Last"){ ?>
                   <li><a href="<?php echo $value; ?>"><?php echo $key; ?></a></li>
                   <?php } else{ ?>
                   <li><?php echo $value; ?></li>
                   <?php } } ?>
                </ul>
            </div>
        <?php 

         if(!empty($image_list)){
            foreach ($image_list as $image) {
               $product_image_array[$image['product_id']]=$image['doc_path'];
            }
         } 
         $dt['do_not_insert']=1;
          $this->load->view('left_side_filter',$dt); ?>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 targetdivajax">

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
            <?php echo $links; ?>
            </div>
            
        </div>
    </div>

</section>

  <script type="text/javascript">

    jQuery(document).ready(function($) {

        $(".fav").click(function(event){

            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",

            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";

            data={[csrfName]:csrfHash,product_id:$(this).data('id'),is_secure_request:'uKrt)6'};

            $target=$(this);

            $.post("<?php echo base_url('impression/manage_fav') ?>", data, 

                function(data, textStatus, xhr) {

                  console.log(data);

                  if(parseInt(data))

                  {

                    toastr_type="success";

                    str="Style Added to favorites";

                    $target.removeClass('inverse');

                  }else{

                    toastr_type="warning";

                    str="Style removed from favorites";

                     $target.addClass('inverse');

                  } 

                  toastr.options = {

                    "closeButton": false

                    }

                  toastr[toastr_type](str);

            });

        });

    });

</script>

