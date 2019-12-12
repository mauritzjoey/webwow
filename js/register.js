$('document').ready(function()
{
    /* validation */
    $("#register-form").validate({
        rules:
        {
            user: {
                required: true,
                minlength: 3
            },
            pass: {
                required: true,
                minlength: 3,
                maxlength: 15
            },
            pass2: {
                required: true,
                equalTo: '#pass'
            },
            email: {
                required: true,
                email: true
            }
        },
        messages:
        {
            user: "Username Needs To Be Minimum of 3 Characters",
            pass:{
                required: "Provide a Password",
                minlength: "Password Needs To Be Minimum of 3 Characters"
            },
            email: "Enter a Valid Email",
            pass2:{
                required: "Retype Your Password",
                equalTo: "Password Mismatch! Retype"
            }
        },
        submitHandler: submitForm
    });
    /* validation */

    /* form submit */
    function submitForm()
    {
        var data = $("#register-form").serialize();

        $.ajax({

            type : 'POST',
            url  : 'functions/register.php',
            data : data,
            beforeSend: function()
            {
                $("#error").fadeOut();
                $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(data)
            {
                if(data==1){

                    $("#error").fadeIn(1000, function(){


                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry, Username already exist</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');

                    });

                }
				else if(data==50){

                    $("#error").fadeIn(1000, function(){


                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry, Email not valid</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');

                    });

                }
				else if(data==51){

                    $("#error").fadeIn(1000, function(){


                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry, Email already exist</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');

                    });

                }
                else if(data=="registered")
                {
                    $(".form-signin").fadeOut(500);
                    $("#success").html("<div class=\'alert alert-success alert-dismissable fade in\'>Successfully created account !<br>set realmlist 127.0.0.1</div>");
                    $("#btn-submit").html('Signing Up');
                    window.location.replace('/?p=info');
                }
                else{

                    $("#error").fadeIn(1000, function(){

                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');

                    });

                }
            }
        });
        return false;
    }
    /* form submit */

});
