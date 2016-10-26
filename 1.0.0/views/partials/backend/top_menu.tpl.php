
<ul class="list-unstyled left-elems">
    <!-- nav trigger/collapse -->
    <li>
        <a href="javascript:;" class="nav-trigger ion ion-drag"></a>
    </li>
    <!-- #end nav-trigger -->

    <!-- Search box -->
    <!-- <li>
         <div class="form-search hidden-xs">
             <form id="site-search" action="javascript:;">
                 <input type="search" class="form-control" placeholder="Type here for search...">
                 <button type="submit" class="ion ion-ios-search-strong"></button>
             </form>
         </div>
     </li>
    <!-- #end search-box -->

    <!-- site-logo for mobile nav -->
    <li>
        <div class="site-logo visible-xs">
            <a href="javascript:;" class="text-uppercase h3">
                <span class="text"><?php echo $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value; ?></span>
            </a>
        </div>
    </li>
    <!-- #end site-logo -->

    <!-- fullscreen -->
    <li class="fullscreen hidden-xs">
        <a href="javascript:;"><i class="ion ion-qr-scanner"></i></a>

    </li>
    <!-- #end fullscreen -->

    <!-- notification drop -->
    <li class="notify-drop hidden-xs dropdown">
        <a href="javascript:;" data-toggle="dropdown">
            <i class="ion ion-speakerphone"></i>
            <span class="badge badge-danger badge-xs circle count">0</span>
        </a>

        <div class="panel panel-default dropdown-menu">
            <div class="panel-heading">
                You have <span class="count">0</span> new notifications
                <a href="#" class="right btn btn-xs btn-pink mt-3">Show All</a>
            </div>
            <div class="panel-body">
                <ul class="list-unstyled" id="crm_notification">
                                                       
                </ul>
            </div>
        </div>

    </li>
    <!-- #end notification drop -->

</ul>

<ul class="list-unstyled right-elems">
    <!-- profile drop -->
    <li class="profile-drop hidden-xs dropdown">
        <a href="javascript:;" data-toggle="dropdown">
            <?php
            $id = $this->session->userdata('user_id');
            if (file_exists('uploads/user_image/user_' . $id . '.jpg')) {
                ?>
                <img class="" src="<?php echo base_url(); ?>uploads/user_image/user_<?php echo $id; ?>_thumb.jpg" alt="">               
            <?php } else { ?>
                <img class="" src="<?php echo base_url(); ?>uploads/user_image/default.png" alt="default image">
            <?php } ?>
            
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?= base_url() ?>admin/profile"><span class="ion ion-person">&nbsp;&nbsp;</span>Profile</a></li>
            <!--
            <li><a href="javascript:;"><span class="ion ion-settings">&nbsp;&nbsp;</span>Settings</a></li>
            <li class="divider"></li>
            <li><a href="javascript:;"><span class="ion ion-lock-combination">&nbsp;&nbsp;</span>Lock Screen</a></li>-->
            <li><a href="<?= base_url() ?>auth/logout"><span class="ion ion-power">&nbsp;&nbsp;</span>Logout</a></li>
        </ul>
    </li>
    <!-- #end profile-drop -->

    <!-- sidebar contact -->

</ul>