
<div>
    <?php
    echo form_open(base_url() . 'index.php/admin/staff/do_add/', array(
        'class' => 'form-horizontal',
        'method' => 'post',
        'id' => 'admin_add'
    ));
    ?>
    <div class="panel-body">       
        <div class="form-group">
            <label class="col-sm-4 control-label" for="demo-hor-1">
                <?php echo translate('user_name'); ?>
            </label>
            <div class="col-sm-6">
                <input type="text" name="user_name" id="username" class="required form-control " placeholder="<?php echo translate('user_name'); ?>">                
                <div class="label" style="display:none;" id='username_note'></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="demo-hor-1">
                <?php echo translate('first_name'); ?>
            </label>
            <div class="col-sm-6">
                <input type="text" name="first_name" id="demo-hor-1" class="form-control required" placeholder="<?php echo translate('first_name'); ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="demo-hor-1">
                <?php echo translate('last_name'); ?>
            </label>
            <div class="col-sm-6">
                <input type="text" name="last_name" id="demo-hor-1" class="form-control required" placeholder="<?php echo translate('last_name'); ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="demo-hor-2">
                <?php echo translate('email'); ?>
            </label>
            <div class="col-sm-6">
                <input type="email" name="email" id="demo-hor-2" class="emails form-control required" placeholder="<?php echo translate('email'); ?>">
                <div class="label label-danger" style="display:none;" id='email_note'></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="demo-hor-4">
                <?php echo translate('phone'); ?>
            </label>
            <div class="col-sm-6">
                <input type="tel" name="phone" id="demo-hor-4" class="form-control " placeholder="<?php echo translate('phone'); ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="demo-hor-4">
                <?php echo translate('password'); ?>
            </label>
            <div class="col-sm-6">
                <input type="password"  id="password" class="form-control pass pass1" >
            </div>

        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="demo-hor-4">

            </label>
            <div class="col-sm-6">
                <div id="pass_note"></div> 


            </div>
        </div> 
        <div class="form-group">
            <label class="col-sm-4 control-label" for="demo-hor-4">
                <?php echo translate('Conform_password'); ?>
            </label>
            <div class="col-sm-6">
                <input type="password" name="password" id="repassword" class="form-control pass pass2" >
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-4 control-label" >
                <?php echo translate('role'); ?>
            </label>
            <div class="col-sm-6">

                <?php echo $this->crud_model->select_html('groups', 'role', 'name', 'add', 'demo-chosen-select required'); ?>
            </div>
        </div>

    </div>
</form>
</div>

<script>

</script>