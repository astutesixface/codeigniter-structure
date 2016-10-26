<!DOCTYPE html>
<html lang="en">

    <head>                
        <title><?php echo ucwords(str_replace("_", " ", $title)); ?> | <?php echo $system_title; ?></title>
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="description" content="<?php echo $description; ?>">
        <meta name="keywords" content="<?php echo $keywords; ?>">
        <meta name="author" content="<?php echo $author; ?>">
        <meta name="revisit-after" content="<?php echo $revisit_after; ?> days">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <?php
        $ext = $this->db->get_where('ui_settings', array('type' => 'fav_ext'))->row()->value;
        $this->benchmark->mark();
        ?>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/others/favicon.<?php echo $ext; ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url(); ?>uploads/others/favicon.<?php echo $ext; ?>" type="image/x-icon">       

        <?php
        $css = array(
            'css/bootstrap.min.css',
            'css/font-awesome.min.css',
            'css/icofont.css',
            'css/owl.carousel.css',
            'css/slidr.css',
            'css/main.css',
            'css/presets/preset1.css',
            'css/responsive.css',
            'https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300',
            'https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700'
        );
        echo css($css);
        ?>


        <!--Chosen [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>template/back/plugins/chosen/chosen.min.css" rel="stylesheet">
        <!-- JS -->

        <?php
        $js = array(
            'js/jquery.min.js',
            'js/modernizr.min.js',
            'js/bootstrap.min.js',
            //  'http://maps.google.com/maps/api/js?sensor=true',
            'js/gmaps.min.js',
            //'js/goMap.js',
            //'js/map.js',
            'js/owl.carousel.min.js',
            'js/smoothscroll.min.js',
            'js/scrollup.min.js',
            'js/price-range.js',
            'js/custom.js',
            'js/switcher.js'
        );
        echo js($js);
        ?>

        <!--Chosen [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>template/back/plugins/chosen/chosen.jquery.min.js"></script>
        <script>
            var base_url = '<?= base_url() ?>';
            var product_added = 'Product Added To Cart';
            var added_to_cart = 'Added To Cart';
            var quantity_exceeds = 'Product Quantity Exceed Availability!';
            var product_already = 'Product Already Added To Cart!';
            var wishlist_add = 'Post Added To favourite';
            var wishlist_add1 = 'favourited';
            var wishlist_adding = 'favourite..';
            var wishlist_remove = 'Post Removed From favourite';
            var compare_add = 'Product Added To Compared';
            var compare_add1 = 'Compared';
            var compare_adding = 'Working..';
            var compare_remove = 'Product Removed From Compare';
            var compare_cat_full = 'Compare Category Full';
            var compare_already = 'Product Already Added To Compare';
            var rated_success = 'Product Rated Successfully';
            var rated_fail = 'Product Rating Failed';
            var rated_already = 'You Already Rated This Product';
            var working = 'Working..';
            var subscribe_already = 'You Already Subscribed';
            var subscribe_success = 'You Subscribed Successfully';
            var subscribe_sess = 'You Already Subscribed Thrice From This Browser';
            var logging = 'Logging In..';
            var login_success = 'You Logged In Successfully';
            var login_fail = 'Login Failed! Try Again!';
            var logup_success = 'You Registered Successfully';
            var logup_fail = 'Registration Failed! Try Again!';
            var logging = 'Logging In..';
            var submitting = 'Submitting..';
            var email_sent = 'Email Sent Successfully';
            var email_noex = 'Email Does Not Exist!';
            var email_fail = 'Email Sending Failed! Try Again';
            var logging = 'Logging In';
            var cart_adding = 'Adding To Cart..';
            var cart_product_removed = 'Product Removed From Cart';
            var required = 'The Field Is Required';
            var mbn = 'Must Be A Number';
            var mbe = 'Must Be A Valid Email Address';
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>template/front/assets/js/plugins/bootstrap-notify.min.js"></script>
        <script>

<?php
$volume = $this->Crud_model->get_type_name_by_id('general_settings', '50', 'value');
if ($this->Crud_model->get_type_name_by_id('general_settings', '49', 'value') == 'ok') {
    ?>
                function sound(type) {
                    document.getElementById(type).volume = <?php if ($volume == '10') {
        echo 1;
    } else {
        echo '0.' . round($volume);
    } ?>;
                    document.getElementById(type).play();
                }
    <?php
} else {
    ?>
                function sound(type) {
                }
    <?php
}
?>
            function check_login_stat(thing) {
                return $.ajax({
                    url: '<?php echo base_url(); ?>index.php/home/check_login/' + thing
                });
            }
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah')
                                .attr('src', e.target.result)
                                .width(150)
                                .height(100);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
        <?php
        $audios = scandir('uploads/audio/home/');
        foreach ($audios as $row) {
            if ($row !== '' && $row !== '.' && $row !== '..') {
                $row = str_replace('.mp3', '', $row);
                ?>
            <audio style='display:none;' id='<?php echo $row; ?>' ><source type="audio/mpeg" src="<?php echo base_url(); ?>uploads/audio/home/<?php echo $row; ?>.mp3"></audio>
        <?php
    }
}
?>


    <?php
    if (isset($head) && is_array($head)) {
        foreach ($head as $headObject) {
            echo $headObject;
        }
    }

    echo $headhtml;
    ?>

    <script src="<?php echo base_url(); ?>template/front/assets/plugins/jquery/jquery.min.js"></script>
    <!-- JS Global Compulsory -->

    <script src="<?php echo base_url(); ?>template/front/assets/plugins/jquery/jquery-migrate.min.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- JS Implementing Plugins -->
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/back-to-top.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/scrollbar/src/jquery.mousewheel.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/scrollbar/src/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/noUiSlider/jquery.nouislider.full.min.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/jquery.parallax.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/jquery-steps/build/jquery.steps.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/sky-forms/version-2.0.1/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/sky-forms/version-2.0.1/js/jquery-ui.min.js"></script>


    <script src="<?php echo base_url(); ?>template/front/assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <!-- JS Customization -->
    <script src="<?php echo base_url(); ?>template/front/assets/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/js/plugins/stepWizard.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/js/forms/page_login.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/js/forms/product-quantity.js"></script>

    <!-- JS Page Level -->

    <script src="<?php echo base_url(); ?>template/front/assets/js/app.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/js/plugins/owl-carousel.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/js/plugins/revolution-slider.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/js/plugins/datepicker.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/counter/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/counter/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/js/pages/page_contacts.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/flexslider/jquery.flexslider-min.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/js/plugins/parallax-slider.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/parallax-slider/js/modernizr.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/parallax-slider/js/jquery.cslider.js"></script>

    <script src="<?php echo base_url(); ?>template/front/assets/plugins/ionrangeslider/js/ion.rangeSlider.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/js/plugins/bootstrap-notify.min.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/js/plugins/fancy-box.js"></script>

    <script src="<?php echo base_url(); ?>template/front/assets/js/ajax_method.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/image-hover/js/modernizr.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/image-hover/js/touch.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/dropdown/js/modernizr.custom.63321.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/dropdown/js/jquery.dropdown.js"></script>
    <script src="<?= base_url() ?>assets/jquery.validate.js"></script>
    <script src="<?= base_url() ?>assets/validationjs/additional-methods.js"></script>
    <!--<script src="<?php // echo base_url();  ?>template/front/assets/js/custom/added_list.js"></script>-->
    <!--Chosen [ OPTIONAL ]-->
    <script src="<?php echo base_url(); ?>template/back/plugins/chosen/chosen.jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>template/front/assets/plugins/scrollbar_main/scrollbar.css">
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/scrollbar_main/scrollbar.js"></script>

    <!-- icons -->
    <link rel="icon" href="images/ico/favicon.ico">	
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="images/ico/apple-touch-icon-57-precomposed.png">
    <!-- icons -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Template Developed By ThemeRegion -->
</head>
<body <?php if (isset($onload)) {
        echo "onload=$onload";
    } ?>>
    <!-- header -->
<?php $this->load->view('partials/menu.tpl.php'); ?>

<?php echo $content; ?>
    <!-- footer -->
    <?php $this->load->view('partials/bottom_menu.tpl.php'); ?>
    <!-- footer -->
    <p id="back-top">
        <a href="#top" title="Scroll To Top">Scroll To Top</a>
    </p>


<?php echo $footerhtml; ?>


</body>

</html>
