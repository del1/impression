<section id="career" class="career">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="career-title">career at impression bridal</h2>
                <h4 class="career-sub">WEDDING DRESS FASHION CAREERS</h4>
            </div>
        </div>
        <div class="row row-centered">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-centered">
                <p>To get a sense of the present, sometimes it's best to go back to the past. Flashback to 1986- when, in my 20's, I discovered a keen interest for bridal fashion and founded Impression. Recognizing an Wedding dress fashion career internships are available at Impression Bridal, the premiere choice in bridal gowns, bridesmaid gowns, and prom dresses.</p>
                <p>With many different locations, Impression Bridal offers many opportunities within our retail stores to develop your fashion industry skills. As a bridal fashion industry leader, we are always interested in new talent.</p>
                <p>To apply, please send your resume to: <a class="mail-to" href="mailto:careers@impressionbridal.com">careers@impressionbridal.com</a></p>
            </div>
        </div>
        <div class="row row-centered">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-centered">
                <hr class="hoz-line">
            </div>
        </div>
        <?php
        if(!empty($jobs_list)) {
            foreach ($jobs_list as $job) {
                $storewise_jobs[$job->store_id][]=$job;
            }
            $ct=count($storewise_jobs);
            $ct=12/$ct;

            ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4 class="career-sub">Current Open Positions</h4>
                <p>Please click on a job title below to view the detailed description. </p>
            </div>
            <?php foreach ($store_list as $store) { 
            if(isset($storewise_jobs[$store->store_id])){ ?>
            <div class="col-lg-<?php echo $ct; ?> text-center">
                <span class="position-title"><?php echo $store->store_name; ?></span>
                <ul class="posi">
                    <?php foreach ($storewise_jobs[$store->store_id] as $job) { ?>
                        <li><a href="#" data-toggle="modal" data-target="#modal<?php echo $job->job_id;?>">-<?php echo $job->job_title; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            
            <!-- Modal1 fullscreen -->
            <?php
             foreach ($storewise_jobs[$store->store_id] as $job) { ?>
            <div class="modal modal-transparent modal-fullscreen fade" id="modal<?php echo $job->job_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="container">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row row-centered">
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-centered">
                                        <h2 class="career-title-model"><?php echo $job->job_title; ?></h2>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <h4 class="career-sub-model">Job Description:</h4>
                                                <?php 
                                                $description = explode(PHP_EOL,$job->job_desc);
                                                  foreach ($description as $key => $value) {
                                                      if(strlen(trim($value))){
                                                            echo "<p>".$value."</p>";
                                                        }
                                                    }
                                                ?>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <h4 class="career-sub-model">Requirements:</h4>
                                                <?php 
                                                $requirement = explode(PHP_EOL,$job->job_requirements);
                                                  foreach ($requirement as $key => $value) {
                                                      if(strlen(trim($value))){
                                                            echo "<p>".$value."</p>";
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <h4 class="career-sub-model">Job Responsibilities:</h4>
                                                <?php 
                                                $responsibilities = explode(PHP_EOL,$job->job_responsibility);
                                                  foreach ($responsibilities as $key => $value) {
                                                     if(strlen(trim($value))){
                                                            echo "<p>".$value."</p>";
                                                        }
                                                    }
                                                ?>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <h4 class="career-sub-model">Benefits:</h4>
                                                <?php 
                                                $benifits = explode(PHP_EOL,$job->job_benifit);
                                                  foreach ($benifits as $key => $value) {
                                                        if(strlen(trim($value))){
                                                            echo "<p>".$value."</p>";
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } } } ?>
        </div>
        <?php } ?>
    </div>
</section>
