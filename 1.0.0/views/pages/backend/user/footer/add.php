
<script src="<?php echo base_url(); ?>template/back/plugins/chosen/chosen.ajaxify.js"></script>

<script>

    $('.demo-chosen-select').chosen();


</script>

<script>

    var mismatch = 'Password Mismatch';
    var required = 'required';
    var must_number = 'must_be_a_number';
    var valid_email = 'must_be_a_valid_email_address';
    var incor = 'incorrect_password';
    var downloading = 'downloading...';


    $(document).ready(function () {

        $("form").submit(function (e) {
            return false;
        });
        $('.demo-chosen-select').chosen();
        $('.demo-cs-multiselect').chosen({width: '100%'});
        $('body .modal-dialog').find('.btn-purple').addClass('disabled');
    });

    $(".pass").on('blur  paste keyup', function () {
        //alert();
        var pass1 = $(".pass1").val();
        var pass2 = $(".pass2").val();
        var password = $("#password").val();
        var repassword = $("#repassword").val();
        if (pass1 !== pass2) {
            //alert();
            if (password != '') {
                if (repassword != '') {

                    console.log(pass1);
                    console.log(pass2);
                    $("#pass_note").html(''
                            + '  <div class="alert alert-danger">'
                            + '      ' + mismatch
                            + '  </div>');
                    $(".pass_chng").attr("disabled", "disabled");
                    $(".pass_chng").addClass("disabled");
                }
            }
        } else if (pass1 == pass2) {
            $("#pass_note").html('');
            $(".pass_chng").removeAttr("disabled");
            $(".pass_chng").removeClass("disabled");
        }
    });
    $(".emails").blur(function () {
        var email = $(".emails").val();
        $.post("<?php echo base_url(); ?>index.php/admin/exists",
                {
<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>',
                    email: email
                },
        function (data, status) {
            if (data == 'yes') {
                $("#email_note").show();
                $("#email_note").html('*<?php echo translate('email_already_registered'); ?>');
                $("body .modal-dialog .btn-purple").addClass("disabled");
            } else if (data == 'no') {
                $("#email_note").hide();
                $("#email_note").html('');
                $("body .modal-dialog .btn-purple").removeClass("disabled");
            }
        });
    });

</script>