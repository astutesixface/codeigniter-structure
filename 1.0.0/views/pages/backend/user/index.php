 
<div id="content-container">
    <div id="page-title">
        <h1 class="page-header text-overflow">
            <?php echo translate('manage_staffs'); ?>
        </h1>
    </div>
    <div class="tab-base">
        <div class="panel">
            <div class="panel-body">
                <div class="tab-content">
                   <div class="col-md-12" 
                         style="border-bottom: 1px solid #ebebeb;padding: 25px 5px 5px 5px;">

                      
                        <button class="btn btn-primary btn-labeled fa fa-plus-circle pull-right mar-rgt user" 
                                onclick="ajax_modal('add/user', '<?php echo translate('add_user'); ?>', '<?php echo translate('successfully_added!'); ?>', 'admin_add', '')" >
                                    <?php echo translate('create_A_user'); ?>
                        </button>
                    </div>
                    <br>
                    <!-- tab style -->
                    <div class="clearfix tabs-fill">
                       
                        <div class="tab-content">
                            <div class="tab-pane active"  id="list" >
                            </div>                           
                        </div>
                    </div>
                    <!-- tab style -->

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var base_url = '<?php echo base_url(); ?>';
    var user_type = 'admin';
    var module = 'user';
    var list_cont_func = 'list';
    var dlt_cont_func = 'delete';

</script>
<script>
    function activaTab(tab, show) {
        $('.nav-tabs a[href="#' + tab + '"]').tab('show');
        proceed(show);
    }

    function proceed(type) {
        if (type == 2) {
            $(".manager").show();
            $(".supervisor").hide();
            $(".user").hide();
        } else if (type == '3') {
            $(".supervisor").show();
            $(".manager").hide();
            $(".user").hide();
        }
        else if (type == '5') {
            $(".manager").hide();
            $(".user").show();
            $(".supervisor").hide();

        }
    }
</script>
