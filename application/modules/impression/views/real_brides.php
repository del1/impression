<style type="text/css">
.img-responsive{
    display: block;
    max-width: 100%;
    height: auto;
}
</style>
<section id="real-brides" class="real-brides">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="real-brides-title">Share your magical day with us</h2>
            </div>
        </div>
        <div class="row row-centered">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-centered">
                <p>We see our dresses go from the drawing board, through the construction process and into our stores, but nothing comes close to the happiness we experience when we see you — our beautiful bride — glowing in her Impression Bridal wedding gown. Share your favorite photos with us for a chance to get featured on our website and social media. And as a special bonus for sharing your day with us, you'll automatically be entered into a sweepstakes to win a framed sketch of your wedding dress!</p>
            </div>
        </div>
        <?php if($this->session->flashdata('error')) { ?>
        <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
        <?php } ?>
        <?php if($this->session->flashdata('success')) { ?>
            <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
        <?php } ?>
        <div class="row">
            <div class="col-xs-12 text-center">
                <a href="<?php echo base_url('impression/share_story');?>" class="btn btn-primary" type="button" name="button">share your story</a>
            </div>
        </div>
        <?php if(isset($real_brides) && !empty($real_brides)) { ?> 
        <div class="row row-centered padding-t-b">
            <div class="col-lg-10 col-centered">
                <div class="main">
                    <ul id="og-grid" class="og-grid">
                        <?php
                        foreach ($real_brides as $story) { ?>
                        <li>
                            <a href="#" data-largesrc="<?php echo"https://res.cloudinary.com/".CLOUDNARYNAME."/image/upload/h_460,q_100/".$story['doc_path'];?>" data-style="<?php echo $story['style']; ?>" data-title="<?php echo $story['b_fname'].'_'.$story['g_fname']; ?>" data-description="<?php echo $story['weddingstory_desc']; ?>">
                            <img src="<?php echo"https://res.cloudinary.com/".CLOUDNARYNAME."/image/upload/c_fill,g_faces:center,q_50,h_400,w_300/".$story['doc_path'];?>" class="img-responsive" alt="img01"/>
                            </a>
                        </li>
                        <?php  } ?>
                    </ul>
                    <!-- <a id="og-additems" href="#">add more</a> -->
                </div>
            </div>
        </div>
      <?php }?>

    </div>
</section>
