
<?php
$left_url = $this->config->item('url');
?>
<aside class="nav-wrap" id="site-nav" data-perfect-scrollbar>
    <div class="nav-head">
        <!-- site logo -->
        <a href="<?= base_url() ?>" class="site-logo text-uppercase">            
            <span class="text"><?php echo $this->db->get_where('general_settings',array('type' => 'system_name'))->row()->value;?></span>
        </a>
    </div>

    <!-- Site nav (vertical) -->

    <nav class="site-nav clearfix" role="navigation">
        <div class="profile clearfix mb15">
           <?php
            $id = $this->session->userdata('user_id');
            if (file_exists('uploads/user_image/user_' . $id . '.jpg')) {
                ?>
                <img class="" src="<?php echo base_url(); ?>uploads/user_image/user_<?php echo $id; ?>_thumb.jpg" alt="">               
            <?php } else { ?>
                <img class="" src="<?php echo base_url(); ?>uploads/user_image/default.png" alt="default image">
            <?php } ?>

            <div class="group">
                <h5 class="name"><?= ucwords($this->ion_auth->user()->row()->first_name); ?></h5>
                <small class="desig text-uppercase"><?= $this->ion_auth->get_users_groups()->row()->description ?></small>
            </div>

        </div>
        <!-- navigation -->
        <?php
          echo $this->menu->dynamicMenu(); /*
        echo $this->multi_menu->render(array(
            'nav_tag_open' => '<ul class="list-unstyled clearfix nav-list mb15">',
            'parentl1_tag_open' => '<li class="open">',
            'parentl11_tag_open' => '<li class="">',
            
            'parentl1_anchor' => '<a tabindex="0" href="%s">%s<span class="arrow ion-chevron-left"></span></a>',
            'parent_tag_open' => '<li class=" active ">',
            'parent_anchor' => '<a href="%s" data-toggle="dropdown">%s</a>',
            'children_tag_open' => '<ul class="inner-drop list-unstyled ">',
            'item_active'         => $this->router->fetch_directory() . $this->router->fetch_class()
        ),'backend','left'); */
        ?>
        <!-- #end navigation -->
       

    </nav>

    <!-- nav-foot -->
    <footer class="nav-foot">
        <p class="small">Thanks for Choosing <a target="_blank" href="http://consonants.in/"><strong> Consonants </strong></a></p>
    </footer>

</aside>