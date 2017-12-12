<div class="site-menubar">
    <ul class="site-menu">
        <li class="site-menu-item has-sub <?php if($page=='Dashboard') { echo 'active';} ?>">
            <a href="javascript:void(0)">
                <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Dashboard</span>
                <span class="site-menu-arrow"></span>
            </a>
        </li>
        <li class="site-menu-item has-sub <?php if($page=='Manage About-us') { echo 'active';} ?>">
            <a href="<?php echo base_url('admin/manage_about_us'); ?>">
                <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                <span class="site-menu-title">About Us</span>
                <span class="site-menu-arrow"></span>
            </a>
        </li>
        <li class="site-menu-item has-sub <?php if($page=='Collection List') { echo 'active';} ?>">
            <a href="<?php echo base_url('admin/collection_list'); ?>">
                <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                <span class="site-menu-title">Collection</span>
                <span class="site-menu-arrow"></span>
            </a>
        </li>
        <li class="site-menu-item has-sub <?php if($page=='Store List') { echo 'active';} ?>">
            <a href="<?php echo base_url('admin/stores_list'); ?>">
                <i class="site-menu-icon wb-check-circle" aria-hidden="true"></i>
                <span class="site-menu-title">Stores</span>
                <span class="site-menu-arrow"></span>
            </a>
        </li>
        <li class="site-menu-item has-sub <?php if($page=='Event And Trunk Shows') { echo 'active';} ?>">
            <a href="<?php echo base_url('admin/show_stores_list/Events'); ?>">
                <i class="site-menu-icon icon wb-map" aria-hidden="true"></i>
                <span class="site-menu-title">Event and Trunk Shows</span>
                <span class="site-menu-arrow"></span>
            </a>
        </li>
        <li class="site-menu-item has-sub <?php if($page=='Career/Jobs') { echo 'active';} ?>">
            <a href="<?php echo base_url('admin/show_stores_list/Career'); ?>">
                <i class="site-menu-icon wb-plugin" aria-hidden="true"></i>
                <span class="site-menu-title">Career</span>
                <span class="site-menu-arrow"></span>
            </a>
        </li>
        <li class="site-menu-item has-sub <?php if($page=='Userlist') { echo 'active';} ?>">
            <a href="<?php echo base_url('admin/userlist'); ?>">
                <i class="site-menu-icon icon wb-users" aria-hidden="true"></i>
                <span class="site-menu-title">Userlist</span>
                <span class="site-menu-arrow"></span>
            </a>
        </li>
        <li class="site-menu-item has-sub <?php if($page=='Story List') { echo 'active';} ?>">
            <a href="<?php echo base_url('admin/story_list'); ?>">
                <i class="site-menu-icon wb-library" aria-hidden="true"></i>
                <span class="site-menu-title">Real brides</span>
                <span class="site-menu-arrow"></span>
            </a>
        </li>
        <li class="site-menu-item has-sub <?php if($page=='Instagram') { echo 'active';} ?>">
            <a href="<?php echo base_url('admin/instagram'); ?>">
                <i class="site-menu-icon wb-library" aria-hidden="true"></i>
                <span class="site-menu-title">Instagram</span>
                <span class="site-menu-arrow"></span>
            </a>
        </li>
<!--       <li class="site-menu-item has-sub">
            <a href="javascript:void(0)">
                <i class="site-menu-icon wb-table" aria-hidden="true"></i>
                <span class="site-menu-title">Tables</span>
                <span class="site-menu-arrow"></span>
            </a>
        </li>
        <li class="site-menu-item has-sub">
            <a href="javascript:void(0)">
                <i class="site-menu-icon wb-pie-chart" aria-hidden="true"></i>
                <span class="site-menu-title">Chart</span>
                <span class="site-menu-arrow"></span>
            </a>
        </li>
        <li class="site-menu-item has-sub">
            <a href="javascript:void(0)">
                <i class="site-menu-icon wb-grid-4" aria-hidden="true"></i>
                <span class="site-menu-title">Apps</span>
                <span class="site-menu-arrow"></span>
            </a>
        </li> -->
    </ul>
</div>