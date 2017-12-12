<section id="event-trunkshow" class="event-trunkshow">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/event-trunkshow.css'); ?>">
    <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <h3 class="page-title">Upcoming events and trunkshows</h3>
          </div>
        </div>
        <?php foreach ($event_list_by_store as $event) {
            $events_array[$event['store_id']][]=$event;
        }?>

        <?php foreach ($store_list as $store) {?>
        <div class="location-list">
            <?php
                if(!empty($events_array[$store->store_id]))
                {
                  foreach ($events_array[$store->store_id] as $event) {
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
                  }
                
            $store_flag[$store->store_id]=0; foreach ($sorted_events_array as $key => $sort_event) { ?>
            <div class="row <?php if(end($sorted_events_array)== $sort_event) { echo 'last-child'; } ?>" > 
                <?php if($store_flag[$store->store_id]==0) { ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="event-title">
                        <h6><?php echo $store->store_name; ?> Store</h6>
                    </div>
                </div>
                <?php $store_flag[$store->store_id]=1; } ?>
                <?php 
                if(!empty($events_array[$store->store_id])) { ?>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 col-lg-push-1">
                    <div class="outDate">
                        <h1><?php echo $key; ?><b class="hr vr"></b></h1>
                    </div>
                </div>
                <?php foreach ($sort_event as $key1 => $event) { ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col-lg-push-1 col-md-push-0 col-sm-push-1">
                    <h2 class="line"><?php  echo $key1; ?></h2>
                    <div class="name-location">
                      <h3><?php echo $event;  ?> </h3>
                      <div class="clearfix"></div>
                    </div>
                </div>
                <?php } } ?>
            </div>
            <?php } 
            unset($sorted_events_array);

             ?>
        </div>
        <?php } } ?>
    </div>
</section>