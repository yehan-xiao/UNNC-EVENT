<?php
error_reporting(0);
require_once '../include.php';
checkIsLogin();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Add Event</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css"/>
<link rel="stylesheet" type="text/css" href="../styles/main.css"/>

<!--Requirement jQuery, using datepicker to show the calendar in the form-->
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.2.min.js"></script>
    <!--Load Script and Stylesheet -->
    <script type="text/javascript" src="scripts/jquery/jquery.simple-dtpicker.js"></script>
    <link type="text/css" href="scripts/jquery/jquery.simple-dtpicker.css" rel="stylesheet" />
<!---->
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
<h2>Add New Event</h2>
<form action="doAdminAction.php?act=addEvent" method="post" enctype="multipart/form-data"> 
    <br/>
    Title:<br/><input class="formInfo" type="text" name="eTitle" required="required" /><br/><br/>
    <label for='startdt'> Start Date: </label><input type="text" class="dtpicker" class="formInfo" name="startdt" id="startdt" value=""><br/><br/>

        <label for='enddt'> End Date: </label><input type="text" class="dtpicker" class="formInfo" name="enddt" id="enddt" value="">
        <script type="text/javascript">
            $(function(){
                // -- append by class just for lower strings count --
                $('.dtpicker').appendDtpicker({"minuteInterval": 15, "calendarMouseScroll": false, "futureOnly": true, "autodateOnStart": true});

                $('#startdt').change(function() {

                     $('#enddt').handleDtpicker('setMinDate', $('#startdt').val()); //set end datetime not lower then start datetime
                });
            });
        </script>
        <br/><br/>Capacity<br/><input class="formInfo" type="number" name="eCapacity" min="0" step="1"/><br/>
        <br/>Location<br/><textarea class="formInfo" name="eLocation" required="required" style="height:40px;"></textarea><br/><br/>
     Description<br/><textarea class="formInfo" name="eDesc" style="height:100px;"></textarea><br/><br/>
            <input class="LoginButton" type="submit"  value="ADD EVENT"/>
</form>
</div>
<div class="footer">
Copyright &copy; 2016 University of Nottingham Ningbo China
</div>
</body>
</html>

