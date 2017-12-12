<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/contactus.css'); ?>">
<section id="contactus" class="contactus">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12 col-lg-offset-0 col-md-offset-0 col-sm-offset-2 col-xs-offset-0">
                    <?php $arr=array('id'=>"contact_us_form");
                            echo form_open('impression/contact_us_submit',$arr); ?>
                    <div class="row">
                        <?php if($this->session->flashdata('error')) { ?>
                        <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
                        <?php } ?>
                        <?php if($this->session->flashdata('success')) { ?>
                            <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
                        <?php } ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h5>Contact Impression Bridal Today!</h5>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="text" name="name" required class="form-control" placeholder="Name">
                            <span class="require">*</span>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="email" required name="user_email" class="form-control" placeholder="Email">
                            <span class="require">*</span>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <input type="tel" required name="phone" class="form-control" placeholder="Phone">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <select required class="form-control" name="store_email">
                                <option disabled hidden>Store Location</option>
                                <?php foreach ($store_list1 as $store) { ?>
                                    <option value="<?php echo $store->email_id; ?>"><?php echo $store->store_name; ?></option>
                                <?php } ?>
                                
                            </select>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 radio-box">
                            <h4>How to contact you?</h4>
                            <label class="radio-inline">
                                <input type="radio" value="Phone" name="optOption">Phone
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="Email" name="optOption">Email
                            </label>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="text" required name="reason" class="form-control" placeholder="add reason">
                            <!-- <select class="form-control">
                                <option disabled selected hidden>Reason for contacting us</option>
                                <option>Reason 01</option>
                                <option>Reason 02</option>
                                <option>Reason 03</option>
                            </select> -->
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <textarea name="message" required class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button button="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 section-content">
                <p class="padding-left"><span class="first-letter">B</span>ridal gown information to help you find the perfect wedding dress for your special day is available by contacting a bridal boutique near you to learn more</p>
                <p>about the varied dress designs from Impression Bridal, or by filling out the contact form below. As you view the many wedding dress, bridesmaid dress and prom dress images on our website, you will have the opportunity to view a number of the exquisite bridal gown designs of Impression Bridal.</p>
                <p>Demonstrate your exceptional taste by contacting your local bridal salon and requesting an Impression Bridal gown today! Unparalleled beauty meets comfortable appeal in wedding dresses, bridesmaid dresses and prom gowns created with fabrics that both feel and look outstanding when you choose an Impression design. Enjoy experiencing the sense of confidence that comes from knowing you look your best when it matters most by selecting an Impression Bridal design for the upcoming event in your life.</p>
                <p>At Impression Bridal, we are pleased to present you with a large variety of options to display your individual style and fulfill your vision of perfection in beauty through impressive bridal gown design, bridesmaid dresses, prom dresses and more.</p>
            </div>
        </div>
    </div>
</section>