<style type="text/css">
    .fav:hover{
        -webkit-transform: scale(2.5);
        -moz-transform: scale(2.5);
        -ms-transform: scale(2.5);
        transform: scale(2.5);
    }
    .fav{
        cursor: pointer;
    }
</style>
<section id="favorites" class="favorites">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url('/'); ?>">Home</a></li>
                    <li>favorites </li>
                </ul>
            </div>

            <?php if(isset($image_list))
            {
                foreach ($image_list as $product) {
                    $product_image_array[$product['product_id']]=$product['doc_path'];
                }
            } ?>
            <?php if(isset($error)){ ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php echo $error; ?>
            </div>
            <?php }else{
                foreach ($product_ids as $product) { ?>
                <div class="gallery-product col-lg-4 col-md-4 col-sm-4 col-xs-6">
                  <div class="pro-wrap">
                    <?php if(isset($product_image_array[$product['product_id']])){
                    $img_src="https://res.cloudinary.com/".CLOUDNARYNAME."/image/upload/c_fill,g_faces:center,h_490,w_370/".$product_image_array[$product['product_id']];
                   }else{ 
                    $img_src="http://res.cloudinary.com/dm0zshykp/image/upload/c_fill,g_faces:center,h_490,w_370/v1506424026/10553C_fzbhdp.jpg";
                   } ?>
                    <a href="<?php echo base_url('impression/style/'.$product['product_id']); ?>"><img src="<?php echo $img_src; ?>" class="img-responsive"></a>
                    <div class="style-no">style <?php echo $product['product_name']; ?></div>
                    <span data-id="<?php echo $product['product_id']; ?>" class="icon icon-favorite-heart-button like-count fav"></span>
                  </div>
                </div>
                <?php } ?>
            <?php } ?>

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
                    $target.parents(".gallery-product").hide('slow', function(){ $target.remove(); });
            });
        });
    });
</script>