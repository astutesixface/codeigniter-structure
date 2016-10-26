<h5 class="text-normal h5 text-center">Sign In to Dashboard</h5>


<?php
echo form_open("auth/login", array(
    'method' => 'post',
    'id' => 'login'
));
?>
<div class="md-input-container md-float-label">	
    <?php
    $identity = array(
        'name' => 'identity',
        'id' => 'identity',
        'class' => 'md-input');
    ?>

    <?php echo form_input($identity); ?>
    <label for="identity">Email/Username:</label>      	

</div>
<div class="md-input-container md-float-label">							
    <?php
    $password = array(
        'type' => 'password',
        'name' => 'password',
        'id' => 'password',
        'class' => 'md-input');
    ?>
    <?php echo form_input($password); ?>
    <label for="password">Password:</label>
</div>     
<div class="clearfix">
    <a href="#" onclick="ajax_modal('forget_form', '<?php echo translate('forget_password'); ?>', '<?php echo translate('email_sent_with_new_password!'); ?>', 'forget', '')" class=" small">Forgot your password?</a>
    <div class="ui-checkbox ui-checkbox-primary right">
        <label>										
            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
            <span>Remember me</span>
        </label>
    </div>
</div>

<div class="clearfix mb15"></div>
<div class="btn-group btn-group-justified mb15">								
    <div class="btn-group">	

        <p><?php echo form_submit('submit', translate('sign_in'), 'class="btn btn-success" onclick="form_submit(\'login\')"'); ?></p>
    </div>
</div> 

<?php echo form_close(); ?>
