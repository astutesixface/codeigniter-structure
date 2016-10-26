<!doctype html>
<html>
    <head>
        <title><?php
            if (isset($title))
                echo $this->config->item('site_title_delimiter') . " " . ucwords(str_replace('_', ' ', $title));
            echo " | " . $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
            ?></title>
        <?php
        $ext = $this->db->get_where('ui_settings', array('type' => 'fav_ext'))->row()->value;
        $this->benchmark->mark();
        ?>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/others/favicon.<?php echo $ext; ?>">
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


        <!-- <base href="/"> -->

        <!--STYLESHEET-->
        <!--=================================================-->

        <!--Roboto Font [ OPTIONAL ]-->
        <!--SCRIPT-->
        <!--=================================================-->

        <script src="//code.jquery.com/jquery-latest.min.js"></script>
        <!--jQuery [ REQUIRED ]-->

        <!--Activeit Stylesheet [ REQUIRED ]-->
        <link href="<?php echo base_url(); ?>template/back/css/activeit.min.css" rel="stylesheet">

        <!--Demo script [ DEMONSTRATION ]-->
        <link href="<?php echo base_url(); ?>template/back/css/demo/activeit-demo.min.css" rel="stylesheet"

              <link href="<?php echo base_url(); ?>template/back/css/font-icons/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!--Font Awesome [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>template/back/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">


        <!--Animate.css [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>template/back/plugins/animate-css/animate.min.css" rel="stylesheet">


        <!--Morris.js [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>template/back/plugins/morris-js/morris.min.css" rel="stylesheet">


        <!--Switchery [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>template/back/plugins/switchery/switchery.min.css" rel="stylesheet">

        <!--Bootstrap Table [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>template/back/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">


        <!--Bootstrap Select [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>template/back/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">

        <!--Summernote [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>template/back/plugins/summernote/summernote.min.css" rel="stylesheet">

        <!--Bootstrap Tags Input [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>template/back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">


        <!--Chosen [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>template/back/plugins/chosen/chosen.min.css" rel="stylesheet">



        <!--noUiSlider [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>template/back/plugins/noUiSlider/jquery.nouislider.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>template/back/plugins/noUiSlider/jquery.nouislider.pips.min.css" rel="stylesheet">



        <!--Bootstrap Timepicker [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>template/back/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">


        <!--Bootstrap Validator [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>template/back/plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">


        <!--Dropzone [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>template/back/plugins/dropzone/dropzone.css" rel="stylesheet">

        <!--Demo script [ DEMONSTRATION ]-->
        <link href="<?php echo base_url(); ?>template/back/css/demo/activeit-demo.min.css" rel="stylesheet">

        <!--Countdown [ REQUIRED ]-->
        <link href="<?php echo base_url(); ?>template/back/css/countdown.css" rel="stylesheet">






        <!--BootstrapJS [ RECOMMENDED ]-->


        <link href="<?php echo base_url(); ?>template/back/colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">


        <script src="<?php echo base_url(); ?>template/back/colorpicker/dist/js/bootstrap-colorpicker.js"></script>


        <script>
<?php
$volume = $this->crud_model->get_type_name_by_id('general_settings', '46', 'value');
if ($this->crud_model->get_type_name_by_id('general_settings', '45', 'value') == 'ok') {
    ?>
                function sound(type) {
                    document.getElementById(type).volume = <?php
    if ($volume == '10') {
        echo 1;
    } else {
        echo '0.' . round($volume);
    }
    ?>;
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
        </script>
        <!-- Dynamically add a css stylesheet    -->
        <?php
        $css = array(
            'admin/fonts/ionicons/css/ionicons.min.css',
            'admin/fonts/font-awesome/css/font-awesome.min.css',
            'admin/styles/plugins/c3.css',
            'admin/styles/plugins/waves.css',
            'admin/styles/plugins/perfect-scrollbar.css',
            'admin/styles/bootstrap.min.css',
            'admin/styles/main.min.css',
            'http://fonts.googleapis.com/css?family=Roboto:400,500,700,300');
        echo css($css);
        ?>        
        <!-- Match Media polyfill for IE9 -->
              <!--[if IE 9]> <script src="scripts/ie/matchMedia.js"></script>  <![endif]--> 




        <?php
        if (isset($head) && is_array($head)) {
            foreach ($head as $headObject) {
                echo $headObject;
            }
        }
        echo $headhtml;
        ?>
    </head>
    <body id="app" class="app off-canvas" <?php
    if (isset($onload)) {
        echo "onload=$onload";
    }
    ?>>
        <!-- I got these buttons from simplesharebuttons.com -->

        <header class="site-head" id="site-head">
            <?php
// This is an example to show that you can load stuff from inside the template file
            $this->load->view('partials/backend/top_menu.tpl.php');
            ?>
        </header>

        <!-- main-container -->
        <div class="main-container clearfix">
            <!-- main-navigation -->
            <?php
            $this->load->view('partials/backend/left_menu.tpl.php');
            ?>
            <!-- #end main-navigation -->

            <!-- content-here start-->
            <div class="content-container" id="content">	
                <div class="page page-dashboard">

                    <ol class="breadcrumb breadcrumb-small">  
                        <?php
                        // get the uri as array
                        $segs = $this->uri->segment_array();

                        $segment_link = '';
                        $segment_link2 = '';
                        $segment_count = count($segs);
                        foreach ($segs as $key_segment => $value_segment) {
                            $segment_link .=$value_segment . '/'; // pick a link for assets by uri count    
                            if (!is_numeric($value_segment)) {
                                if ($key_segment == 1) {
                                    ?>
                                    <li ><a href="<?= base_url($segment_link) ?>">Dashboard</a></li>                                    
                                    <?php
                                } elseif ($key_segment == $segment_count) {
                                    ?>
                                    <li class="active"><?= str_replace("_", " ", $value_segment) ?></li>
                                    <?php
                                } else {
                                    ?>
                                    <li ><a href="<?= base_url($segment_link) ?>"><?= str_replace("_", " ", $value_segment) ?></a></li>
                                    <?php
                                }
                            }
                        }
                        ?>                               
                    </ol>
                    <div class="boxed" id="fol">
                        <!--CONTENT CONTAINER-->
                        <div>
                            <div class="page-wrap">                              
                                <?php
// This is the main content partial
                                echo $content;
                                ?>                          
                            </div>
                        </div> <!-- #end col-left -->

                    </div>
                    <!-- content-here end -->
                </div>
                <!-- #end main-container -->


                <!-- theme settings -->
                <div class="site-settings clearfix ">
                    <div class="settings clearfix">
                        <div class="trigger ion ion-settings left"></div>
                        <div class="wrapper left">
                            <ul class="list-unstyled other-settings">
                                <li class="clearfix mb10">
                                    <div class="left small">Nav Horizontal</div>
                                    <div class="md-switch right">
                                        <label>
                                            <input type="checkbox" id="navHorizontal"> 
                                            <span>&nbsp;</span> 
                                        </label>
                                    </div>


                                </li>
                                <li class="clearfix mb10">
                                    <div class="left small">Fixed Header</div>
                                    <div class="md-switch right">
                                        <label>
                                            <input type="checkbox"  id="fixedHeader"> 
                                            <span>&nbsp;</span> 
                                        </label>
                                    </div>
                                </li>
                                <li class="clearfix mb10">
                                    <div class="left small">Nav Full</div>
                                    <div class="md-switch right">
                                        <label>
                                            <input type="checkbox"  id="navFull"> 
                                            <span>&nbsp;</span> 
                                        </label>
                                    </div>
                                </li>
                            </ul>
                            <hr/>
                            <ul class="themes list-unstyled" id="themeColor">
                                <li data-theme="theme-zero" class="active"></li>
                                <li data-theme="theme-one"></li>
                                <li data-theme="theme-two"></li>
                                <li data-theme="theme-three"></li>
                                <li data-theme="theme-four"></li>
                                <li data-theme="theme-five"></li>
                                <li data-theme="theme-six"></li>
                                <li data-theme="theme-seven"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #end theme settings -->

                <div id="container" class="effect mainnav-lg"><button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button></div>
                <script>
                    var base_url = "<?php echo base_url(); ?>";
                    var dss = "<?php echo translate("deleted_successfully"); ?>";
                    var cncle = "<?php echo translate("cancelled"); ?>";
                    var cnl = "<?php echo translate("cancel"); ?>";
                    var req = "<?php echo translate("required"); ?>";
                    var mbn = "<?php echo translate("must_be_a_number"); ?>";
                    var mbe = "<?php echo translate("must_be_a_valid_email_address"); ?>";
                    var sv = "<?php echo translate("save"); ?>";
                    var ppus = "<?php echo translate("product_published!"); ?>";
                    var pups = "<?php echo translate("product_unpublished!"); ?>";
                    var pfe = "<?php echo translate("product_featured!"); ?>";
                    var pufe = "<?php echo translate("product_unfeatured!"); ?>";
                    var ptd = "<?php echo translate("product_in_todays_deal!"); ?>";
                    var ptnd = "<?php echo translate("product_removed_from_todays_deal!"); ?>";
                    var spus = "<?php echo translate("slider_published!"); ?>";
                    var supus = "<?php echo translate("slider_unpublished!"); ?>";
                    var papus = "<?php echo translate("page_published!"); ?>";
                    var paupus = "<?php echo translate("page_unpublished!"); ?>";
                    var ntsen = "<?php echo translate("notification_sound_enabled!"); ?>";
                    var ntsds = "<?php echo translate("notification_sound_disabled!"); ?>";
                    var glen = "<?php echo translate("google_login_enabled!"); ?>";
                    var glds = "<?php echo translate("google_login_disabled!"); ?>";
                    var flen = "<?php echo translate("facebook_login_enabled!"); ?>";
                    var flds = "<?php echo translate("facebook_login_disabled!"); ?>";
                    var pplds = "<?php echo translate("paypal_payment_disabled!"); ?>";
                    var pplen = "<?php echo translate("paypal_payment_enabled!"); ?>";
                    var s_e = "<?php echo translate("slider_enabled!"); ?>";
                    var s_d = "<?php echo translate("slider_disabled!"); ?>";
                    var c_e = "<?php echo translate("cash_payment_enabled!"); ?>";
                    var c_d = "<?php echo translate("cash_payment_disabled!"); ?>";
                    var enb = "<?php echo translate("enabled!"); ?>";
                    var dsb = "<?php echo translate("disabled!"); ?>";
                    var enb_ven = "<?php echo translate("notification_email_sent_to_vendor!"); ?> ";
                    var ajax_load_status = "yes"; // set  "no" to stop default loding list 

                </script>

                <?php
                $js = array(
                    'admin/scripts/vendors.js',
                    'admin/scripts/plugins/perfect-scrollbar.min.js',
                    'admin/scripts/plugins/waves.min.js',
                    'admin/scripts/plugins/screenfull.js',
                    'admin/scripts/app.js',
                    'admin/scripts/ajax_login.js',
                );
                echo js($js);
                ?>

                <!--Activeit Admin [ RECOMMENDED ]-->
                <script src="<?php echo base_url(); ?>template/back/plugins/notify/bootstrap-notify.min.js"></script>
                <script src="<?php echo base_url(); ?>template/back/js/activeit.min.js"></script>


                <!--Morris.js [ OPTIONAL ]-->
                <script src="<?php echo base_url(); ?>template/back/plugins/morris-js/morris.min.js"></script>
                <script src="<?php echo base_url(); ?>template/back/plugins/morris-js/raphael-js/raphael.min.js"></script>


                <!--Sparkline [ OPTIONAL ]-->
                <script src="<?php echo base_url(); ?>template/back/plugins/sparkline/jquery.sparkline.min.js"></script>


                <!--Skycons [ OPTIONAL ]-->
                <script src="<?php echo base_url(); ?>template/back/plugins/skycons/skycons.min.js"></script>


                <!--Bootstrap Select [ OPTIONAL ]-->
                <script src="<?php echo base_url(); ?>template/back/plugins/bootstrap-select/bootstrap-select.min.js"></script>


                <!--Demo script [ DEMONSTRATION ]-->
                <script src="<?php echo base_url(); ?>template/back/js/demo/activeit-demo.min.js"></script>


                <!--Demo script [ DEMONSTRATION ]-->
                <script src="<?php echo base_url(); ?>template/back/js/ajax_method.js"></script>


                <!--Demo script [ DEMONSTRATION ]--
                <script src="<?php echo base_url(); ?>template/back/js/jquery.form.js"></script>
        
        
                <!--Demo script [ DEMONSTRATION ]--
                <script src="<?php echo base_url(); ?>template/back/js/jspdf.js"></script>
        
        
                <!--Specify page [ SAMPLE ]-->
                <script src="<?php echo base_url(); ?>template/back/js/demo/dashboard.js"></script>

                <script type="text/javascript" src="<?php echo base_url(); ?>template/back/export/tableExport.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>template/back/export/jquery.base64.js"></script>



                <script type="text/javascript" src="<?php echo base_url(); ?>template/back/export/html2canvas.js"></script>

                <script type="text/javascript" src="<?php echo base_url(); ?>template/back/export/jspdf/libs/sprintf.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>template/back/export/jspdf/jspdf.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>template/back/export/jspdf/libs/base64.js"></script>

                <!--Bootstrap Table [ OPTIONAL ]-->
                <script src="<?php echo base_url(); ?>template/back/plugins/bootstrap-table/bootstrap-table.js"></script>


                <!--Data Table [ SAMPLE ]-->
                <script src="<?php echo base_url(); ?>template/back/js/demo/tables.js"></script>


                <!--Bootbox Modals [ OPTIONAL ]-->
                <script src="<?php echo base_url(); ?>template/back/plugins/bootbox/bootbox.min.js"></script>


                <!--Switchery [ OPTIONAL ]-->
                <script src="<?php echo base_url(); ?>template/back/plugins/switchery/switchery.js"></script>


                <!--Chosen [ OPTIONAL ]-->
                <script src="<?php echo base_url(); ?>template/back/plugins/chosen/chosen.jquery.min.js"></script>



                <!--noUiSlider [ OPTIONAL ]-->
                <script src="<?php echo base_url(); ?>template/back/plugins/noUiSlider/jquery.nouislider.all.min.js"></script>


                <!--Bootstrap Timepicker [ OPTIONAL ]-->
                <script src="<?php echo base_url(); ?>template/back/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>


                <!--Dropzone [ OPTIONAL ]-->
                <script src="<?php echo base_url(); ?>template/back/plugins/dropzone/dropzone.min.js"></script>

                <!--Summernote [ OPTIONAL ]-->
                <script src="<?php echo base_url(); ?>template/back/plugins/summernote/summernote.js"></script>



                <!--Bootstrap Validator [ OPTIONAL ]-->
                <script src="<?php echo base_url(); ?>template/back/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>


                <!--Masked Input [ OPTIONAL ]-->
                <script src="<?php echo base_url(); ?>template/back/plugins/masked-input/jquery.maskedinput.min.js"></script>


                <!--Buttons [ SAMPLE ]-->
                <script src="<?php echo base_url(); ?>template/back/js/demo/ui-buttons.js"></script>

                <!--Countdown [ SAMPLE ]-->
                <script src="<?php echo base_url(); ?>template/back/js/jquery.countdown.min.js"></script>
                <script src="<?php echo base_url(); ?>template/back/js/lodash.min.js"></script>

                <script type="text/javascript" src="<?php echo base_url(); ?>template/back/js/jspdf.debug.js"></script>
                <?php
                //if ($this->session->userdata('title') == 'admin') {
                    ?>
                    <input type="hidden" value="<?php echo $this->db->get('users')->num_rows(); ?>" id="total_sale">
                    <?php
//                } else if ($this->session->userdata('title') == 'vendor') {
//                    $sales = $this->db->get('sale')->result_array();
//                    $i = 0;
//                    foreach ($sales as $row) {
//                        if ($this->crud_model->is_sale_of_vendor($row['sale_id'], $this->session->userdata('vendor_id'))) {
//                            $i++;
//                        }
//                    }
//                    ?>
                    <input type="hidden" value="<?php //echo $i; ?>" id="total_sale">
                    <?php
//                }
                ?>
                <?php
                $audios = scandir('uploads/audio/admin/');
                foreach ($audios as $row) {
                    if ($row !== '' && $row !== '.' && $row !== '..') {
                        $row = str_replace('.mp3', '', $row);
                        ?>
                        <audio style='display:none;' id='<?php echo $row; ?>' ><source type="audio/mpeg" src="<?php echo base_url(); ?>uploads/audio/admin/<?php echo $row; ?>.mp3"></audio>
                            <?php
                        }
                    }
                    ?>
                <script type="text/javascript">
                    setInterval(sale_check, 300000);
                    setInterval(session_check, 600000);
                    function sale_check() {
                        var toto = $('#total_sale').val();
                        $.ajax({
                            url: '<?php echo base_url(); ?>index.php/<?php echo $this->session->userdata('title'); ?>/sales/total/' + toto,
                            success: function (data) {
                                var new_sale = data - toto;
                                $('#total_sale').val(data);
                                if (new_sale > 0) {
                                    $.activeitNoty({
                                        type: 'success',
                                        icon: 'fa fa-check',
                                        message: new_sale + ' More Sale(s)!',
                                        container: 'floating',
                                        timer: 8000
                                    });
                                    sound('sale_audio');
                                }
                            },
                            error: function (e) {
                                console.log(e)
                            }
                        });
                    }

                    function session_check() {
                        $.ajax({
                            url: '<?php echo base_url(); ?>index.php/<?php echo $this->session->userdata('title'); ?>/welcome/is_logged/',
                            success: function (data) {
                                if (data == 'yah!good') {
                                }
                                else if (data == 'nope!bad') {
                                    location.replace('<?php echo base_url(); ?>index.php/<?php echo $this->session->userdata('title'); ?>');
                                                    }
                                                },
                                                error: function (e) {
                                                    console.log(e)
                                                }
                                            });
                                        }

                </script>
                <?php echo $footerhtml; ?>

                </body>
                </html>
