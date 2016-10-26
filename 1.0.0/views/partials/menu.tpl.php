<!-- header -->
<header id="header" class="clearfix">
    <!-- navbar -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="width: 190px" href="<?= site_url() ?>"><img class="img-responsive" src="<?php echo $this->Crud_model->logo('home_top_logo'); ?>" alt="Logo"></a>

            </div>
            <!-- /navbar-header -->

            <div class="navbar-left">
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">	
                         <li><a href="<?=base_url('');?>">Home</a></li>
                         
                          <?php   if ($this->ion_auth->logged_in()) {
                        ?>
                         <li><a href="<?=base_url('Myaccount');?>">My Account</a></li>
                        <li><a href="<?=base_url('Myaccount/allposts1');?>">All Posts</a></li>
                         <li><a href="<?=base_url('Myaccount/live');?>">Live Events</a></li> 
						  <?php } ?> 
                       
                       
                    </ul>
                </div>
            </div>

            <!-- nav-right -->
            <div class="nav-right">
                <!-- language-dropdown -->
                <div class="dropdown language-dropdown">
                    <i class="fa fa-globe"></i> 						
                    <a data-toggle="dropdown" href="#"><span class="change-text">Chennai</span> <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu language-change">
                        <li><a href="#">Coimbatore</a></li>
                        <li><a href="#">Trichy</a></li>
                        <li><a href="#">Thenni</a></li>
                        <li><a href="#">Salem</a></li>
                    </ul>								
                </div><!-- language-dropdown -->

                <!-- sign-in -->					
                <ul class="sign-in" id="loginsets">
                    <li>
					<?php   if ($this->ion_auth->logged_in()) {
						echo  $this->session->userdata('username');
					}?>
					
					<i class="fa fa-user"></i></li>
                    <?php
                    if (!$this->ion_auth->logged_in()) {
                        ?>
                    <li><a href="<?= site_url('signin') ?>"> Sign In </a></li>
                    <li><a href="<?= site_url('signup') ?>">Register</a></li>
                    <?php
                    }else{
                        ?>                    
                    <li><a href="<?= site_url('auth/logout') ?>">logout</a></li>
                    <?php
                    }
                    ?>
                    
                </ul><!-- sign-in -->					

                <a href="<?= site_url('Myaccount/new_post') ?>#" class="btn">Add Post</a>
            </div>
            <!-- nav-right -->
        </div><!-- container -->
    </nav><!-- navbar -->
</header><!-- header -->