  <style type="text/css">
    .img-responsive{
      display: block;
      max-width: 100%;
      height: auto;
    }
  </style>

  <section id="banners" class="banners">
    <div class="container"><!-- container-fluid -->


        <div class="col-sm-12 col-lg-12 col-md-12 main-right-bar">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="collection-wrap">
                <img src="<?php echo base_url('assets/images/banner.jpg'); ?>" class="img-responsive">
                <div class="coll-link center">
                  <span><a href ="<?php echo base_url('impression/collection'); ?>">view the collections <object class="right-icon" data="<?php echo base_url('assets/svg/right-arrow.svg'); ?>" type="image/svg+xml">
                      <img src="<?php echo base_url('assets/svg/right-arrow.svg'); ?>" alt="">
                    </object></a></span>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="row">
                <div class="video-wrap">
                  <div id="video-wrapper">
                    <div class="video-container">
                      <!-- YouTube video - start -->
                      <div id="video-controls"></div>
                        <script async src="http://www.youtube.com/iframe_api"></script>
                        <script>
                            function onYouTubeIframeAPIReady() {
                                var player;
                                player = new YT.Player('video-controls', {
                                    videoId: 'Dru3EMZwAiw', // YouTube Video ID
                                    playerVars: {
                                        autoplay: 1, // Auto-play the video on load
                                        controls: 0, // Show pause/play buttons in player
                                        showinfo: 0, // Hide the video title
                                        modestbranding: 0, // Hide the Youtube Logo
                                        loop: 1, // Run the video in a loop
                                        fs: 0, // Hide the full screen button
                                        cc_load_policy: 0, // Hide closed captions
                                        iv_load_policy: 3, // Hide the Video Annotations
                                        autohide: 0, // Hide video controls when playing
                                        rel: 0
                                    },
                                    events: {
                                        onReady: function(e) {
                                            e.target.mute();
                                        }
                                    }
                                });
                            }
                        </script>
                      <!-- YouTube video - End -->
                    </div>
                  </div>
                </div>
                <?php if(!empty($story_Image_list)) { ?>
                  <?php foreach ($story_Image_list as $storykey => $storyvalue) { ?>
                    <div class="col-lg-4 col-md-4 col-sm-4 nopadding">
                      <div class="bride-img">
                        <img src="<?php echo"https://res.cloudinary.com/".CLOUDNARYNAME."/image/upload/c_fill,g_faces:center,q_10/".$storyvalue['doc_path'];?>" class="img-responsive" alt="img01"/>
                      </div>
                    </div>
                  <?php } ?>
                <?php }else{ ?>
                <div class="brid-wrap">
                  <div class="col-lg-4 col-md-4 col-sm-4 nopadding">
                    <div class="bride-img">
                      <img src="<?php echo base_url('assets/images/bride-img1.jpg'); ?>" class="img-responsive">
                      <!-- <div class="coll-link">
                        <span><a href ="#">@name <object class="right-icon" data="svg/right-arrow.svg" type="image/svg+xml">
                            <img src="svg/right-arrow.svg" alt="">
                          </object></a>
                              </span>
                      </div> -->
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 nopadding">
                    <div class="bride-img">
                      <img src="<?php echo base_url('assets/images/bride-img2.jpg'); ?>" class="img-responsive">
                      <!-- <div class="coll-link">
                        <span><a href ="#">@name <object class="right-icon" data="svg/right-arrow.svg" type="image/svg+xml">
                            <img src="svg/right-arrow.svg" alt="">
                          </object></a></span>
                      </div> -->
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 nopadding">
                    <div class="bride-img">
                      <img src="<?php echo base_url('assets/images/bride-img3.jpg'); ?>" class="img-responsive">
                      <!-- <div class="coll-link">
                        <span><a href ="#">@name <object class="right-icon" data="svg/right-arrow.svg" type="image/svg+xml">
                            <img src="svg/right-arrow.svg" alt="">
                          </object></a></span>
                      </div> -->
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>
  <section id="location" class="location">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <h3 class="section-title">locations</h3>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right">
          <a href="<?php echo base_url('impression/appointment');?>" class="btn btn-primary">Make an appointment</a>
        </div>
      </div>
      <div class="row">
        <?php $img_arry[1]='assets/images/img1.jpg';
        $img_arry[2]='assets/images/img2.jpg';
        $img_arry[3]='assets/images/img3.jpg';
        $img_arry[4]='assets/images/img4.jpg';  ?>
        <?php foreach ($store_list1 as $store) { ?>
          <div class="col-lg-3 col-md-3 col-sm-6">
          <a href="<?php echo base_url('impression/stores/'.$store->store_id);?>" class="location-box">
            <div class="l-img-box">
              <img src="<?php echo base_url($img_arry[$store->store_id]); ?>" class="img-responsive">
            </div>
            <div class="address">
              <span><object class="pin-icon" data="<?php echo base_url('assets/svg/shape-for-maps.svg'); ?>" type="image/svg+xml">
                  <img src="<?php echo base_url('assets/svg/shape-for-maps.svg'); ?>" alt="">
                </object><?php echo $store->store_name; ?></span>
              <p><?php echo $store->address; ?><br><?php echo $store->city.", ". $store->state." ".$store->pincode; ?><br><?php echo $store->contact_number; ?></p>
            </div>
          </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <section id="social" class="social">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
          <h5 class="section-title">Do it for the Gram</h5>
          <p class="section-sub-title">Upload your special day and tag us with #IBxME for a chance to be featured!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <div class="row" id="insta">
              <ul class="grid clearfix" id="grid">
                <?php foreach ($insta_list as $key => $value) { ?>
                  <li class="shown"><a target="_blank" href="<?php echo $value->link_desc ;?>"><img src="<?php echo $value->image ;?>" class="img-responsive"></a></li>
                <?php } ?>
                

              </ul>
           </div>
         </div>
        <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 position-relative">
          <div class="image large">
            <img src="images/instagram/image-07.jpg">
          </div>
          <div class="insta-text text-right">
            <span class="icon-insta"></span>Follow us on instagram<br>
            @impressionStore #IBxME
          </div>
        </div> -->
      </div>
    </div>
  </section>
