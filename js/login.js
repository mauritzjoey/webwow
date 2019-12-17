$(document).ready(function(){
  $("#login-form").validate({
    rules:
    {
        loginuser: {
            required: true
        },
        loginpass: {
            required: true
        }
    },
    messages:
    {
        loginuser: "Please input username",
        loginpass: "Please input password"
    },
    submitHandler: submitForm
  });

  function submitForm()
  {
    var data = $("#login-form").serialize();

    $.ajax({
        type: "POST",
        url: "functions/login.php",
        data: data,
        beforeSend: function()
            {
                $("#error").fadeOut();
                $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Loggin in ...');
            },
        success: function(data){
            if(data == 'success'){
                $("#error").fadeIn(1000, function(){
                    $("#error").html("<div class=\'alert alert-success alert-dismissable fade in\'>Successfully logged in!</div>");
                    $("#btn-login").html('Login');
                    window.location.replace('/?p=info');
                });
            }else{
                $("#error").fadeIn(1000, function(){
                    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Username/Password Incorrect!</div>');
                    $("#btn-login").html('Login');
                });
            }
        }
    });
    return false; 
  }
});