<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
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

        <!-- Icons -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/fonts/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/fonts/font-awesome/css/font-awesome.min.css">

        <!-- Plugins -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/styles/plugins/c3.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/styles/plugins/waves.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/styles/plugins/perfect-scrollbar.css">


        <!-- Css/Less Stylesheets -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/styles/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/styles/main.min.css">



        <!--Activeit Stylesheet [ REQUIRED ]-->
        <link href="<?php echo base_url(); ?>template/back/css/activeit.min.css" rel="stylesheet">	
        <!--Font Awesome [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>template/back/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="<?php echo base_url(); ?>template/back/css/demo/activeit-demo.min.css" rel="stylesheet">

        <!--SCRIPT-->
        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <link href="<?php echo base_url(); ?>template/back/plugins/pace/pace.min.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>template/back/plugins/pace/pace.min.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>

        <!-- Match Media polyfill for IE9 -->
        <!--[if IE 9]> <script src="scripts/ie/matchMedia.js"></script>  <![endif]--> 
        <!--jQuery [ REQUIRED ]-->
        <script src="<?php echo base_url(); ?>template/back/js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>template/front/assets/js/plugins/bootstrap-notify.min.js"></script>
        <!--Demo script [ DEMONSTRATION ]-->
        <?php
        if ($this->router->fetch_method() == 'register') {
            ?>
            <script src="<?php echo base_url(); ?>template/back/js/ajax_method.js"></script>
        <?php } ?>
        <style>
            body {
                letter-spacing: .5px;
                background: #efefef;
            }
        </style>
    </head>
    <body id="app" class="app off-canvas">

        <!-- content-here -->
        <div class="content-container" id="container">
            <div class="page page-auth col-md-6 col-md-offset-3">
                <div class="auth-container">

                    <div class="form-head mb20">
                        <h1 class="site-logo h2 mb5 mt5 text-center text-uppercase text-bold">
                            <a class="box-inline" href="">
                                <img src="<?php echo $this->crud_model->logo('admin_login_logo'); ?>" class="log_icon">
                            </a>
                        </h1>
                        <?php
                        if($message){ ?>
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div><?php echo translate($message); ?></div>
                        </div>
                        <?php } ?>
                    </div>



                    <div class="form-container">

                        <?php echo $content; ?>


                    </div>
                    <div class="clearfix text-center small">
                        <p>Thanks For Choosing
                            <?php
                            if ($this->uri->segment(1) == 'vendor') {
                                ?>
                                <a target="_blank" href="<?= site_url() ?>"><?php echo $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value; ?></a>
                            <?php } else { ?>
                                <a target="_blank" href="http://www.consonants.in/">Consonants</a>
                            <?php } ?></p>
                    </div>
                </div> <!-- #end signin-container -->
            </div>



        </div> 
        <!-- #end content-container -->



        <!--jQuery [ REQUIRED ]-->




        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="<?php echo base_url(); ?>template/back/js/bootstrap.min.js"></script>

        <!--Activeit Admin [ RECOMMENDED ]-->
        <script src="<?php echo base_url(); ?>template/back/js/activeit.min.js"></script>

        <!--Background Image [ DEMONSTRATION ]-->
        <script src="<?php echo base_url(); ?>template/back/js/demo/bg-images.js"></script>

        <!--Bootbox Modals [ OPTIONAL ]-->
        <script src="<?php echo base_url(); ?>template/back/plugins/bootbox/bootbox.min.js"></script>

        <!--Demo script [ DEMONSTRATION ]-->
        <script src="<?php echo base_url(); ?>template/back/js/ajax_login.js"></script>

        <script>
            var base_url = '<?php echo base_url(); ?>'
            var cancdd = '<?php echo translate('cancelled'); ?>'
            var req = '<?php echo translate('this_field_is_required'); ?>'
            var sing = '<?php echo translate('signing_in...'); ?>';
            var nps = '<?php echo translate('new_password_sent_to_your_email'); ?>';
            var lfil = '<?php echo translate('login_failed!'); ?>';
            var wrem = '<?php echo translate('wrong_e-mail_address!_try_again'); ?>';
            var lss = '<?php echo translate('login_successful!'); ?>';
            var sucss = '<?php echo translate('SUCCESS!'); ?>';
            var rpss = "<?php echo translate('reset_password'); ?>";
            var user_type = 'auth';
            var module = 'process';
            var unapproved = '<?php echo translate('account_not_approved._wait_for_approval.'); ?>';
            var logging = '<?php echo translate('logging_in..'); ?>';
            var login_success = '<?php echo translate('you_logged_in_successfully'); ?>';
            var login_fail = '<?php echo translate('login_failed!_try_again!'); ?>';
            var logup_fail = '<?php echo translate('registration_failed!_try_again!'); ?>';
            var logging = '<?php echo translate('logging_in..'); ?>';
            var submitting = '<?php echo translate('submitting..'); ?>';
            var email_sent = '<?php echo translate('email_sent_successfully'); ?>';
            var email_noex = '<?php echo translate('email_does_not_exist!'); ?>';
            var email_fail = '<?php echo translate('email_sending_failed!_try_again'); ?>';
            var logging = '<?php echo translate('logging_in'); ?>';

            function notify(message, type, from, align) {
                $.notify({
                    // options
                    message: message
                }, {
                    // settings
                    type: type,
                    placement: {
                        from: from,
                        align: align
                    }
                });

            }
<?php
$volume = $this->crud_model->get_type_name_by_id('general_settings', '50', 'value');
if ($this->crud_model->get_type_name_by_id('general_settings', '49', 'value') == 'ok') {
    ?>
                function sound(type) {
                    document.getElementById(type).volume = <?php
    if ($volume == '10') {
        echo "1";
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
        <script>
            $(document).ready(function () {
                $('#login').submit(function () {
                    return false;
                });
            });
        </script>
    </body>
</html>