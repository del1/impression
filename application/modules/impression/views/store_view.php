
  <link href="">
  <section id="locations" class="event-trunkshow locations">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/location.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/event-trunkshow.css');?>">
    <div class="container">

    <div class="row">
      <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
        <h3 class="page-title"><?php echo $store_details->store_name; ?> Area</h3>
        <div class="blocks">
          <h5>Address :</h5>
          <p><?php echo $store_details->address; ?>, <?php echo $store_details->city.", ". $store_details->state." ". $store_details->pincode; ?><br/>
          <?php echo $store_details->contact_number;?></p>
          <a href="mailto:<?php echo $store_details->email_id;?>"><?php echo $store_details->email_id;?></a>
        </div>
        <div class="blocks">
          <h5>Store Hours :</h5>
          <?php
              $store_desc = explode(PHP_EOL,$store_details->store_desc);
              foreach ($store_desc as $key => $value) {
                  echo "<p>".$value."</p>";
                }
              ?>
        </div>
        <div class="social-icon">
            <ul>
              <li>
                <a href="https://www.facebook.com/impressionbridalstore/?ref=br_rs" target="_blank">
                   <span class="icon-facebook"></span>
                 </a>
              </li>
              <li>
                <a href="https://twitter.com/intent/follow?original_referer=http%3A%2F%2Fwww.impressionbridalstore.com%2Fbridal-gowns-locations%2Fimpression-bridal-gown-locations-houston-baybrook-area.html&region=follow_link&screen_name=ImpressionStore&source=followbutton&variant=2.0" target="_blank">
                   <span class="icon-twitter"></span>
               </a>
              </li>
            </ul>
          </div>
      </div>
      <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
        <?php if(strlen(trim($store_details->virtual_tour))){ ?>
        <h6 class="tour-title">Virtual Tour</h6>
        <div class="google-virtual-tour">
          <iframe src="<?php echo $store_details->virtual_tour; ?>" frameborder="0" allowfullscreen></iframe>
        </div>
         <?php }else{ ?>
         <div class="google-map">
          <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $store_details->google_map; ?>"></iframe>
        </div>
        <?php  } ?>
      </div>
     
    </div>
    <?php if(strlen(trim($store_details->google_map)) && strlen(trim($store_details->virtual_tour))){ ?>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="google-map">
          <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $store_details->google_map; ?>"></iframe>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php
    if(!empty($event_list))
    {
      foreach ($event_list as $event) {
        $start_date=$event['start_date'];
        $end_date=$event['end_date'];
        $key1=date("d", strtotime($start_date))." - ".date("d", strtotime($end_date));
        if(date("m", strtotime($start_date))==date("m", strtotime($end_date)))
        {
            $key=date("M Y", strtotime($start_date));
            $sorted_events_array[$key][$key1]=$event['event_name'];
        }else{
          $key=date("M", strtotime($start_date))."-".date("M", strtotime($end_date))." ".date("Y", strtotime($start_date));
          $sorted_events_array[$key][$key1]=$event['event_name'];
        }
      } ?>
    <div class="location-list">
      <?php $flagPrint=0; foreach ($sorted_events_array as $key => $sort_event) { 
          ?>
       <div class="row">
          <?php if(!$flagPrint) { ?>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="event-title">
              <h6><?php echo $store_details->store_name; ?></h6>
            </div>
          </div>
          <?php $flagPrint=1; }?>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 col-lg-push-0">
             <div class="outDate">
                <h1><?php echo $key; ?><b class="hr vr"></b></h1>
             </div>
          </div>
          <?php foreach ($sort_event as $key1 => $event) { ?>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col-lg-push-0 col-md-push-0 col-sm-push-1 col-xs-push-0">
             <h2 class="line"><?php  echo $key1; ?></h2>
             <div class="name-location">
                <h3><?php echo $event;  ?></h3>
                <div class="clearfix"></div>
             </div>
          </div>
          <?php } ?>
       </div>
       <?php } ?>
    </div>
    <?php }?>
</div>

<div class="quote">
    <div class="container">
      <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-0 col-xs-offset-0">
        <span class="quote-sign"></span>
        <h6 class="quote-text">Our job is not to destroy the past but to understand the essence of it and rebuild the dream of today’s women. We understand that personal style is about the discovery process. And we know there’s world to discover with Impression Bridal.</h6>
        <div class="text-right">
          <h6 class="quote-text-2">Others promised, We deliver…<br>
          We make shopping a pure pursuit of pleasure…</h6>
        </div>
      </div>
    </div>
</div>
  </section>