<style type="text/css">
  .req_text{
    width: 100%;
    color: #666666;
    font-weight: 600;
    text-transform: uppercase;
  }
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $(function() {
    url="<?php echo base_url('assets/images/calendar.gif')?>";
    $(".datepicker").datepicker({
      showOn: "button",
      buttonImage: url,
      buttonImageOnly: true,
      buttonText: "Select date"
    });
  });
</script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/appointment.css'); ?>">
  <section id="make-appointment" class="make-appointment">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-0 col-xs-offset-0">
          <div class="row">
            <div class="col-lg-12 section-content text-center">
              <p>For more information about or wedding dresses, bridesmaid gowns, prom dresses and quinceneara gowns, fill out the form below and we will contact you shortly.</p>
            </div>
          </div>
          <?php if($this->session->flashdata('error')) { ?>
          <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
          <?php } ?>
          <?php if($this->session->flashdata('success')) { ?>
              <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
          <?php } ?>
          <?php $arr=array('id'=>"appointment_form","class"=>"form");
                            echo form_open('impression/appointment_submit',$arr); ?>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <h5>Make an appointment today!</h5>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <input type="text" required name="name" class="form-control" placeholder="Name">
                <span class="require">*</span>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <input type="email" required name="email" class="form-control" placeholder="Email">
                <span class="require">*</span>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <input type="tel" required name="phone" class="form-control" placeholder="Phone">
              </div>
              <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <select class="form-control" required name="store_email">
                  <option disabled hidden>Store Location</option>
                  <?php foreach ($store_list1 as $store) { ?>
                      <option <?php if(isset($store_id) && $store_id==$store->store_id){ echo "selected"; } ?> value="<?php echo $store->email_id; ?>"><?php echo $store->store_name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 radio-box intrested">
                <h4>What are you interested in?</h4>
                <label class="radio-inline">
                  <input type="radio" checked value="Bridal" name="optradio">Bridal
                </label>
                <label class="radio-inline">
                  <input type="radio" value="Bridesmaid" name="optradio">Bridesmaid
                </label>
                <label class="radio-inline">
                  <input type="radio" value="Prom" name="optradio">Prom
                </label>
                <label class="radio-inline">
                  <input type="radio" value="Quinceneara" name="optradio">Quinceneara
                </label>
                <label class="radio-inline">
                  <input type="radio" value="Special Ocassion" name="optradio">Special Ocassion
                </label>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 radio-box ">
                <label class="radio-inline">
                  <input type="checkbox" checked value="Bridal" name="req_fav_see"><span class="req_text"> See you favorited gowns in your appointment?</span>
                </label>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 date-box">
                <h4>Wear date</h4>
                <div class="inline calendar">
                  <input type="text" required name="wear_date" class="form-control datepicker">
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 radio-box">
                <h4>How to contact you?</h4>
                <label class="radio-inline">
                  <input type="radio" value="Phone" name="optchoice">Phone
                </label>
                <label class="radio-inline">
                  <input type="radio" checked value="Email" name="optchoice">Email
                </label>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <textarea class="form-control" required name="message" placeholder="Message"></textarea>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <button type="submit" class="btn btn-primary" >Submit</button>
              </div>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </section>