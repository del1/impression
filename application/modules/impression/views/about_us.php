  <section id="aboutus" class="aboutus">
    <?php foreach ($about_us_content as $section) { 
        $section_array[$section->section_name]=$section->section_desc;
      } ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0">
          <h2 class="about-title"><?php echo $section_array['About_us_Title']; ?></h2>
        </div>
        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 section-content">
          <p class="padding-left"><span class="first-letter"><?php echo $section_array['Section-1'][0]; ?></span><?php echo substr($section_array['Section-1'], 1) ?>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 section-content col-md-offset-1 col-sm-offset-0">
          <?php echo $section_array['Section-2']; ?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <span class="quote-sign"></span>
          <h6 class="quote-text"><?php echo $section_array['Quote']; ?></h6>
        </div>
      </div>
    </div>
  </section>