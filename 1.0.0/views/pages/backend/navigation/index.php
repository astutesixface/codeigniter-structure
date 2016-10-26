
<div class="row">
    <div class="col-sm-12 std_print" data-spy="scroll" data-offset="0">                                   

        <div class="box box-primary ">
            <div class="box-header box-header-background with-border">
                <h3 class="box-title "> <?php echo translate('manage_navigation'); ?></h3>
                <button class="btn btn-primary btn-labeled fa fa-plus-circle pull-right" 
                        onclick="ajax_modal('add', '<?php echo translate('add_brand'); ?>', '<?php echo translate('successfully_added!'); ?>', 'navigation_form', '')">
                            <?php echo translate('create_menu'); ?>
                </button>
            </div>

            <div class="col-md-12" style="border-bottom: 1px solid #ebebeb;padding:10px;">
                
            </div>
            <div class="box-body" id="list">

            </div>
        </div>
    </div>
</div>


<script>
    var base_url = '<?php echo base_url(); ?>'
    var user_type = 'admin';
    var module = 'navigation';
    var list_cont_func = 'lists';
    var dlt_cont_func = 'delete';
</script>