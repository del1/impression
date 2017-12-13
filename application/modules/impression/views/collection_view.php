<?php //$this->load->view('impression/Home_topbar');?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/collections.css'); ?>">
<section id="collection" class="collection">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>Collections</li>
                </ul>
                <!-- <ul class="fltr-drpdun">
                    <li><a href="#" class="fil-click">filter +</a></li>
                    <li><a href="#" class="fil-click">Sort by +</a></li>
                </ul> -->
            </div>
            <?php $this->load->view('left_side_filter'); ?>
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 targetdivajax">
                <div>
                    <div class="drop-wrap clearfix">
                        <div class="drop-down clearfix">
                            <div class="row">
                          <div class="col-lg-3">
                            <h2>collections</h2>
                            <ul>
                              <li><a href="#">Wedding</a></li>
                              <li><a href="#">bridesmaid</a></li>
                              <li><a href="#">proM / special ocassions</a></li>
                            </ul>
                          </div>
                          <div class="col-lg-3">
                            <h2>brands</h2>
                            <ul>
                              <li><a href="#">Ashley & justin bride</a></li>
                              <li><a href="#">impression</a></li>
                              <li><a href="#">impression couture</a></li>
                              <li><a href="#">destiny informal</a></li>
                              <li><a href="#">davinci</a></li>
                              <li><a href="#">simon carvalli</a></li>
                            </ul>
                            <ul>
                              <li><a href="#">yumi katsura</a></li>
                              <li><a href="#">victor harper</a></li>
                              <li><a href="#">christiano lucci</a></li>
                            </ul>
                          </div>
                          <div class="col-lg-3">
                            <h2>silhoutte</h2>
                            <ul>
                              <li><a href="#">ballgown</a></li>
                              <li><a href="#">modified a line</a></li>
                              <li><a href="#">a line</a></li>
                              <li><a href="#">fit and flare</a></li>
                              <li><a href="#">mermaid</a></li>
                              <li><a href="#">sheath</a></li>
                            </ul>
                          </div>
                          <div class="col-lg-3">
                            <h2>neckline</h2>
                            <ul>
                              <li><a href="#">strapless</a></li>
                              <li><a href="#">sweetheart</a></li>
                              <li><a href="#">v neck</a></li>
                              <li><a href="#">scoop</a></li>
                              <li><a href="#">shoulder straps</a></li>
                              <li><a href="#">jewel</a></li>
                            </ul>
                          </div>
                            </div>
                        </div>
                        <a href="#" class="close-btn">close <span class="icon-cancel"></span></a>
                    </div>
                </div>
                <?php $img[1]='https://res.cloudinary.com/cmsakoreorg/image/upload/v1509147304/weeding-gowns_jtsd9g.jpg';
                $img[2]='https://res.cloudinary.com/cmsakoreorg/image/upload/v1509147407/bridmaid-dresses_smadje.jpg';
                $img[3]='https://res.cloudinary.com/cmsakoreorg/image/upload/v1509147479/social-occasion_xxlh6j.jpg'; ?>
                <div class="row">
                    <?php foreach ($collection_list1 as $collection) {  ?>
                    <?php if($collection['collection_id']==1){ ?>
                    <div class="gallery-product col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php }else{ ?>
                        <div class="gallery-product col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <?php } ?>
                            <div class="pro-wrap">
                                <a href="<?php echo base_url('impression/collection/'.$collection['collection_id']);?>"><img src="<?php echo $img[$collection['collection_id']]; ?>" class="img-responsive"></a><?php //echo "https://res.cloudinary.com/".CLOUDNARYNAME."/image/upload/".$collection['doc_path']; ?>
                                <div class="style-no"><?php echo $collection['collection_name']; ?></div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
