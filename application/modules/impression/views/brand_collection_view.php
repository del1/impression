  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/collections.css'); ?>">
  <section id="collection" class="collection">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <ul class="breadcrumb">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li><a href="<?php echo base_url('impression/collection');?>">Collections</a></li>
            <li>Wedding Gowns</li>
          </ul>
        </div>
        <?php $this->load->view('left_side_filter'); 
        $brand_image_static_array[1]='http://res.cloudinary.com/dm0zshykp/image/upload/c_fill,g_faces:center,h_480,w_360/v1506408919/Carys-924X-Edit_uzlun5.jpg';
        $brand_image_static_array[2]='http://res.cloudinary.com/dm0zshykp/image/upload/c_fill,g_faces:center,h_490,w_370/v1506416586/MILLIE-A_ln8rpk.jpg';
        $brand_image_static_array[3]='http://res.cloudinary.com/dm0zshykp/image/upload/c_fill,g_faces:center,h_480,w_360/v1506408841/13140A_ksaaac.jpg';
        $brand_image_static_array[4]='http://res.cloudinary.com/dm0zshykp/image/upload/c_fill,g_faces:center,h_490,w_370/v1506408827/VHC-Cora-S_ar6z6k.jpg';
        $brand_image_static_array[5]='http://res.cloudinary.com/dm0zshykp/image/upload/c_fill,g_faces:center,h_490,w_370/v1506408830/10562B_yrnkhk.jpg';
        $brand_image_static_array[6]='http://res.cloudinary.com/dm0zshykp/image/upload/c_fill,g_faces:center,h_490,w_370/v1506408848/VHC-Eugenie_hv0jgh.jpg';
        $brand_image_static_array[7]='http://res.cloudinary.com/dm0zshykp/image/upload/c_fill,g_faces:center,h_490,w_370/v1506408848/VHC-Eugenie_hv0jgh.jpg'; ?>
        <?php if(isset($brand_images) && !empty($brand_images))
        {
          foreach ($brand_images as $key => $value) {
            $brand_image_array[$value->brand_id]=$value->doc_path;
          }
        } ?>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
          <?php foreach ($brands_list as $key => $value) { ?>
            <div class="gallery-product col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="pro-wrap">
                <?php if(isset($brand_image_array[$value->brand_id])) { 
                  $imgsrc="https://res.cloudinary.com/".CLOUDNARYNAME."/image/upload/c_fill,g_faces:center,h_480,w_360/".$brand_image_array[$value->brand_id];
                }else{
                  $imgsrc=$brand_image_static_array[$value->brand_id];
                } ?>
                <a href="<?php echo base_url('impression/brand/'.$value->brand_id);?>"><img src="<?php echo $imgsrc; ?>" class="img-responsive"></a>
                <div class="style-no text-uppercase"><?php echo $value->brand_name; ?></div>
              </div>
            </div>
          <?php } ?>
<!-- 

          
          <div class="gallery-product col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="pro-wrap">
              <a href="<?php // echo base_url('impression/brand/3');?>"><img src="http://res.cloudinary.com/dm0zshykp/image/upload/c_fill,g_faces:center,h_490,w_370/v1506408848/VHC-Eugenie_hv0jgh.jpg" class="img-responsive"></a>
              <div class="style-no text-uppercase">Impression Couture</div>
            </div>
          </div>
          <div class="gallery-product col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="pro-wrap">
              <a href="<?php //echo base_url('impression/brand/2');?>"><img src="http://res.cloudinary.com/dm0zshykp/image/upload/c_fill,g_faces:center,h_480,w_360/v1506408841/13140A_ksaaac.jpg" class="img-responsive"></a>
              <div class="style-no text-uppercase">Impression</div>
            </div>
          </div>
          <div class="gallery-product col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="pro-wrap">
              <a href="<?php //echo base_url('impression/brand/5');?>"><img src="http://res.cloudinary.com/dm0zshykp/image/upload/c_fill,g_faces:center,h_490,w_370/v1506408830/10562B_yrnkhk.jpg" class="img-responsive"></a>
              <div class="style-no text-uppercase">Victor Harper</div>
            </div>
          </div>
          <div class="gallery-product col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="pro-wrap">
              <a href="<?php //echo base_url('impression/brand/4');?>"><img src="http://res.cloudinary.com/dm0zshykp/image/upload/c_fill,g_faces:center,h_490,w_370/v1506408827/VHC-Cora-S_ar6z6k.jpg" class="img-responsive"></a>
              <div class="style-no text-uppercase">Da Vinci</div>
            </div>
          </div>
          <div class="gallery-product col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="pro-wrap">
              <a href="<?php //echo base_url('impression/brand/2');?>"><img src="http://res.cloudinary.com/dm0zshykp/image/upload/c_fill,g_faces:center,h_490,w_370/v1506416586/MILLIE-A_ln8rpk.jpg" class="img-responsive"></a>
              <div class="style-no text-uppercase">Christiano Lucci</div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </section>