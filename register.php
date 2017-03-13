<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Register</title>
<link type="text/css" rel="stylesheet" href="admin/styles/reset.css"/>
<link type="text/css" rel="stylesheet" href="styles/logreg.css"/>

<script src="vendor/jquery-1.10.0.js"></script>
<script src="vendor/jquery.validate-1.13.1.js"></script>
<!--use this widget to validate the username unique-->
<script>
    var validator1;
   $(".selector").validate({     
        submitHandler: function(form) 
        {      
            $(form).ajaxSubmit();     
        }  
    }),

    $(document).ready(function () {
        validator1 = $("#regForm").validate({
            rules: {
                uName: {
                    required: true,
                    rangelength: [2, 16],
                    remote: {
                        url: "checkUsername.php",
                        type: "post"
                    }
                },
                uPassword: {
                    required: true,
                    rangelength: [2, 20]
                },
                uPhoneNumber: {
                    required: true
                },

                uEmail: {
                    email: true,
                    required: true
                }
            },

            messages: {
                uName: {
                    remote: 'Username exits!'
                }
            }     
        });           
    });
</script>
</head>
<body>

    <div class="welcome_title"><h1>Welcome to UNNC EVENTS</h1></div>
    <div class="loginBox">
    
    <form class="loginForm" id=regForm action="doAction.php?act=register" method="post">    
        <input class="formInfo" type="text" name="uName" placeholder="   username" required="required" /><br/>
        <br/><input class="formInfo" type="password" name="uPassword" placeholder="  password" required="required" /><br/>
        <br/><input class="formInfo" type="text" name="uPhoneNumber" placeholder="  phone number" required="required" /><br/>
        <br/><input class="formInfo" type="email" name="uEmail" placeholder="  email address" required="required" /><br/>
        <br/>
      
        <input class="LoginButton" type="submit" value="Sign Up!"/><br/><br/><br/>
        <a href="login.php">Log In!</a>
    </form>
</div>

<div class="footer">
Copyright &copy; 2016 University of Nottingham Ningbo China<br>
</div>

</body>
</html>
