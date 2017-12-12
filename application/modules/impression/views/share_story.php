
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

  <section id="share-story" class="share-story">
    <div class="container">
      <div class="row row-centered">
        <div class="col-lg-10 col-md-10 col-sm-12 col-centered">
          <h2 class="story-title">Share your story</h2>
        </div>
      </div>
      <div class="row row-centered">
        <div class="col-lg-10 col-md-10 col-sm-12 col-centered">
          <div class="row">
             <?php $arr=array('id'=>"share_story_form");
                            echo form_open_multipart('impression/share_story_save',$arr); ?>
                  <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="form-group">
                       <input type="text" id="b-first-name" required="" name="b_fname" class="form-control" placeholder="Bride First Name">
                       <span class="require">*</span>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="form-group">
                       <input type="text" id="g-first-name" required="" name="g_fname" class="form-control" placeholder="Groom First Name">
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                       <input type="email" id="txt-email" required="" name="email" class="form-control" placeholder="Email">
                       <span class="small">Your email will not be displayed on the site.</span>
                       <span class="require">*</span>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="form-group">
                       <input type="text" id="dress-style" required="" name="style" class="form-control" placeholder="Dress Style">
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="form-group">
                       <input type="text" id="wedding-day" required="" name="wedding_day" class="form-control" placeholder="Wedding Day">
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <select class="form-control" id="store-purchased" name="purchased_from_store">
                          <option selected disabled hidden>Store Purchased from</option>
                          <?php foreach ($store_list as $store) { ?>
                            <option value="<?php echo $store->store_id ?>"><?php echo $store->store_name ?></option>
                          <?php } ?>
                        </select>
                      </div>
                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Our Wedding Story</label>
                      <textarea class="form-control" name="weddingstory_desc" id="stiry-test" rows="5" placeholder="You can share stories like how you met, how he proposed, any details about your special day, or your experience finding your dream gown at
  Impression Bridal."></textarea>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                        <label>Acknowledgements</label>
                        <select name="service_id" class="form-control" id="exampleSelect1">
                          <option selected disabled>Select Service</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="form-group">
                        <label>&nbsp;</label>
                      <input type="text" name="service_name" required="" id="service-name" class="form-control" placeholder="Service Name">
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="form-group">
                        <label>&nbsp;</label>
                      <input type="text" name="service_website" required=""  id ="Service Website" class="form-control" placeholder="Service Website">
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group ">
                    <div class="input-group">
                        <input type="text" id="file-Upld" class="form-control" placeholder="Upload Pictures">
                        <label class="input-group-btn">
                            <span class="btn btn-primary upload-btn">
                                Choose Files<input type="file" name="userfile[]" required="" id="filesToUpload" type="file" multiple="" accept="image/x-png,image/gif,image/jpeg" onchange="makeFileList();" style="display: none;"/>
                            </span>
                        </label>
                    </div>
                    <ul id="fileList"><li>No Files Selected</li></ul>
                    <span id="validation-errors"></span>
                    <span class="help-block"><span class="icon-info"></span>You can select multiple files!</span>
                    <span class="require">*</span>
                  </div>
                </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      <button class="btn btn-primary" type="submit"onclick="fnvalidationContact();" >Submit</button>
                  </div>
              <?php echo form_close(); ?>
          </div>
      </div>
    </div>
  </section>

<script type="text/javascript">
  jQuery(document).ready(function($) {
     $("#wedding-day").daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      locale: {
        format: 'YYYY-MM-DD'
      },
    }, function (startDate, endDate, period) {
      $(this).val(startDate.format('L') + ' – ' + endDate.format('L'))
    });
  });


 </script>