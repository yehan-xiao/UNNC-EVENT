<?php
error_reporting(0);
require_once '../include.php';
checkIsLogin();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Add Admin</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css"/>
<link rel="stylesheet" type="text/css" href="../styles/main.css"/>
<script src="../vendor/jquery-1.10.0.js"></script>
<script src="../vendor/jquery.validate-1.13.1.js"></script>
<!--use this widget to validate the information-->
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
                aName: {
                    required: true,
                    rangelength: [2, 16],
                },
                aPassword: {
                    required: true,
                    rangelength: [2, 20]
                },
                aPhoneNumber: {
                    required: true
                },

                aEmail: {
                    email: true,
                    required: true
                }
            },

        });           
    });
</script>
</head>
<body>

<div class="headerBar">
  <div class="title"><h1>UNNC EVENTS</h1>
        
    <!-- user info -->
    <div class="navbar">
      <ul>
        <li class="nav_hi fl">Hi, <?php echo $_SESSION['adminName'];?></li>
      </ul>

      <ul>
        <li class="nav_li fr"><a class="nav_right" href="doAdminAction.php?act=logout">LogOut</a></li>
        <li class="nav_li fr"><a class="nav_right" href="index.php">Home</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="leftsidebar">
    <ul>
      <li class=""><a class="nav_a" href="addEvent.php">Add Event</a></li>
      <li class=""><a class="nav_a" href="listEvent.php">List Event</a></li>
      <li class=""><a class="nav_a" href="addAdmin.php">Add Admin</a></li>
      <li class=""><a class="nav_a" href="listAdmin.php">List Admin</a></li>
    </ul>

</div>

<div class="loginBox">
<h2>Add New Admin</h2>
<form id="regForm" action="doAdminAction.php?act=addAdmin" method="post"> 
    <br/>
    Name:<br/><input class="formInfo" type="text" name="aName" required="required" /><br/><br/>
    Password:<br/><input class="formInfo" type="password" name="aPassword" required="required" /><br/><br/>
    
    Phone Number:<br/><input class="formInfo" type="text" name="aPhoneNumber" required="required" /><br/><br/>

    Email Address:<br/><input class="formInfo" type="email" name="aEmail" required="required" /><br/><br/>

    <input class="LoginButton" type="submit"  value="ADD ADMIN"/>
</form>
</div>

<div class="footer">
Copyright &copy; 2016 University of Nottingham Ningbo China
</div>
</body>
</html>

