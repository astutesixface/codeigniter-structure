<!--=== Breadcrumbs ===-->
<div class="breadcrumbs ">
    <div class="container">
        <h1 class="text-center page-heading bottom-indent"><?php echo translate('personal_information'); ?></h1>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->
<?php
foreach ($user_info as $row) {
    ?>
    <!--=== Profile ===-->
    <div class="profile container content">
        <div class="row">
            <!--Left Sidebar-->
            <div class="col-md-12"> 
                <div class="col-md-3 md-margin-bottom-40">
                    <?php if (file_exists('uploads/user_image/user_' . $row['id'] . '.jpg')) { ?>
                        <img class="img-responsive profile-img margin-bottom-20" src="<?php echo base_url(); ?>uploads/user_image/user_<?php echo $row['id']; ?>_thumb.jpg" alt="<?php echo $row['first_name']; ?>">               
                    <?php } else { ?>
                        <img class="img-responsive profile-img margin-bottom-20" src="<?php echo base_url(); ?>uploads/user_image/default.png" alt="default image">
                    <?php } ?>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                            <center>
                                <h4><?php echo $row['username']; ?></h4>                            
                                <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a>
                            </center>
                            </td>                          
                            </tr>                                               
                            <tr>
                                <th><?php echo translate('phone'); ?></th>
                                <td><?php echo $row['phone']; ?></td>                          
                            </tr>                             

                            </tbody>
                        </table>
                    </div>

                </div>
                <!--End Left Sidebar-->
                <div class="col-md-8">
                    <!--Profile Body-->
                    <div class="profile-body">                    

                        <div class="tab-v2">
                            <div class="panel with-nav-tabs panel-primary">
                                <div class="panel-heading">
                                    <ul class="nav nav-tabs">                                    
                                        <li class="active"><a href="#tab-2" data-toggle="tab"><?php echo translate('edit_info'); ?></a></li>
                                        <li class=""><a href="#tab-3" data-toggle="tab"><?php echo translate('change_password'); ?></a></li>
                                    </ul>  
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab-2">
                                            <div class="row margin-bottom-40">
                                                <div class="col-md-12">
                                                    <!-- Reg-Form -->
                                                    <?php
                                                    echo form_open(base_url() . 'index.php/admin/profile/process/update_info/', array(
                                                        'class' => 'sky-form log-reg-v3',
                                                        'method' => 'post',
                                                        'enctype' => 'multipart/form-data',
                                                        'id' => 'sky-form4'
                                                    ));
                                                    ?>    
                                                    <?php
                                                    foreach ($user_info as $row) {
                                                        ?>
                                                        <fieldset>                  
                                                            <section class="col-md-8">
                                                                <label class="input">
                                                                    <i class="icon-append fa fa-user"></i>
                                                                    <input type="text" name="first_name" class="required" value="<?php echo $row['first_name']; ?>">
                                                                    <b class="tooltip tooltip-right"><?php echo translate('re-write your_first_name'); ?></b>
                                                                </label>
                                                            </section> 

                                                            <section class="col-md-8">
                                                                <label class="input">
                                                                    <i class="icon-append fa fa-user"></i>
                                                                    <input type="text" name="last_name" class="required" value="<?php echo $row['last_name']; ?>">
                                                                    <b class="tooltip tooltip-right"><?php echo translate('re-write your_last_name'); ?></b>
                                                                </label>
                                                            </section>

                                                            <section class="col-md-8">
                                                                <label class="input">
                                                                    <i class="icon-append fa fa-phone"></i>
                                                                    <input type="text" name="phone" value="<?php echo $row['phone']; ?>" >
                                                                    <b class="tooltip tooltip-right">
                                                                        <?php echo translate('re-write_your_phone_number'); ?>
                                                                    </b>
                                                                </label>
                                                            </section>

                                                           
                                                                                                                      
                                                            
                                                            <section class="col-md-8">
                                                                <label for="file" class="input input-file">
                                                                    <div class="button btn-u btn-u-cust">
                                                                        <input type="file" name="image" 
                                                                               onchange="document.getElementById('nam').value = this.value;">
                                                                               <?php echo translate('browse'); ?>
                                                                    </div>
                                                                    <input type="text" id="nam" placeholder="Change Profile Picture" readonly>
                                                                </label>
                                                            </section>

                                                        </fieldset>
                                                        <?php
                                                    }
                                                    ?>
                                                    <footer>
                                                        <section class="col-md-8">
                                                            <div class="pull-right">
                                                                <span type="submit" class="btn btn-success btn-md btn-labeled fa fa-upload pull-left btn-u btn-u-update btn-block margin-bottom-20 btn-labeled fa fa-check-circle submitter" data-msg='Info Updated!' data-ing='Updating..'>
                                                                    <?php echo translate('update_info') ?>
                                                                </span>
                                                            </div>
                                                        </section>
                                                    </footer>
                                                    </form>         
                                                    <!-- End Reg-Form -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-3">
                                            <div class="row margin-bottom-40">
                                                <div class="col-md-12">
                                                    <?php
                                                    echo form_open(base_url() . 'index.php/admin/profile/process/update_password/', array(
                                                        'class' => 'sky-form form-horizontal',
                                                        'method' => 'post',
                                                        'enctype' => 'multipart/form-data',
                                                        'id' => 'sky-form1',
                                                        'novalidate' => 'novalidate'
                                                    ));
                                                    ?> 
                                                    <fieldset>                  
                                                        <section class="col-md-8">
                                                            <label class="input">
                                                                <i class="icon-append fa fa-lock"></i>
                                                                <input type="password" name="password" placeholder="<?php echo translate('current_password'); ?>">
                                                                <b class="tooltip tooltip-bottom-right">
                                                                    <?php echo translate('enter_your_current_password'); ?>
                                                                </b>
                                                            </label>
                                                        </section>
                                                        <section class="col-md-8">
                                                            <label class="input">
                                                                <i class="icon-append fa fa-key"></i>
                                                                <input type="password" name="password1" class="pass pass1" placeholder="<?php echo translate('new_password'); ?>">
                                                                <b class="tooltip tooltip-bottom-right">
                                                                    <?php echo translate('enter_your_new_password'); ?>
                                                                </b>
                                                            </label>
                                                        </section>

                                                        <section class="col-md-8">
                                                            <label class="input">
                                                                <i class="icon-append fa fa-thumbs-up"></i>
                                                                <input type="password" name="password2" class="pass pass2" placeholder="<?php echo translate('confirm_new_password'); ?>">
                                                                <b class="tooltip tooltip-bottom-right">
                                                                    <?php echo translate('re-enter_your_new_password'); ?></b>
                                                                <div id="pass_note"></div>
                                                            </label>
                                                        </section>
                                                    </fieldset>
                                                    <footer>
                                                        <section class="col-md-8">
                                                            <div class="pull-right">
                                                                <span class="btn btn-success btn-md btn-labeled fa fa-upload pull-left btn btn-u btn-u-update btn-block margin-bottom-20 btn-labeled fa fa-key submitter pass_chng disabled" disabled='disabled' data-msg='Password Saved!' data-ing='Saving'><?php echo translate('save_password'); ?></span>
                                                            </div>
                                                        </section>
                                                    </footer>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Profile Body-->
                    </div>
                </div><!--/end row-->

            </div><!--/end row-->
        </div><!--/container-->   
    </div>
    <!--=== End Profile ===-->
    <?php
}
?>
<script>
    var base_url = '<?php echo base_url(); ?>'
    var user_type = 'admin';
    var module = 'report';
    var list_cont_func = 'appointment_data_list';
    var dlt_cont_func = 'delete';
    var mismatch = '<?php echo translate('password_mismatched'); ?>';
    var required = '<?php echo translate('required'); ?>';
    var must_number = '<?php echo translate('must_be_a_number'); ?>';
    var valid_email = '<?php echo translate('must_be_a_valid_email_address'); ?>';
    var incor = '<?php echo translate('incorrect_password'); ?>';
    var downloading = '<?php echo translate('downloading...'); ?>';
    var base_url = '<?php echo base_url(); ?>';

    $('.download_it').on('click', function () {

        var here = $(this);
        var id = here.data('pid');
        var txt = here.html();
        $.ajax({
            url: base_url + 'index.php/home/can_download/' + id,
            beforeSend: function () {
                $(this).html(downloading);
            },
            success: function (data) {
                if (data == 'not') {
                    notify("<?php echo translate('download_permission_denied'); ?>", 'warning', 'bottom', 'right');
                } else {
                    window.location = "" + base_url + 'index.php/admin/profile/download/' + id + "";
                }
                here.html(txt);
            },
            error: function (e) {
                console.log(e)
            }
        });
    });
</script>
<script src="<?php echo base_url(); ?>template/front/assets/js/custom/profile.js"></script>

