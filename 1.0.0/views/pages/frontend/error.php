<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
	<?php $system_title	 =  $this->db->get_where('general_settings',array('type' => 'system_title'))->row()->value; ?>
    <title>404 Not Found | <?php echo $system_title; ?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php $ext =  $this->db->get_where('ui_settings',array('type' => 'fav_ext'))->row()->value;?>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/others/favicon.<?php echo $ext; ?>">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/assets/css/style.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/assets/plugins/font-awesome/css/font-awesome.min.css">

    <!-- CSS Page Style -->    
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/assets/css/pages/page_error4_404.css">

    <!-- CSS Theme -->    
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/assets/css/theme-colors/default.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/front/assets/css/custom.css">
</head> 

<body>

    <!--=== Error V4 ===-->    
    <div class="container content">
        <!--Error Block-->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="error-v4">
                    <a href="<?php echo site_url(); ?>"><img src="<?php echo $this->crud_model->logo('home_top_logo'); ?>" alt="" style="width:100%"></a>
                    <h1>404</h1>
                    <span class="sorry">Sorry, the page you were looking for could not be found!</span>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <a class="btn-u btn-brd btn-brd-hover rounded btn-u-vio btn-u-md" href="<?php echo site_url(); ?>"> Go Back to Main Page</a>
                        </div> 
                        <div class="col-md-6 col-md-offset-3">
                        <p class="list-unstyled link-list" style="margin-top:60px;">2015 &copy; All Rights Reserved @ <a target="_blank" style="color:#000;" href="<?php echo base_url(); ?>"><?=$system_title?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/container-->
    <!--End Error Block-->



</body>
</html> 