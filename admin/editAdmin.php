<?php
error_reporting(0);
require_once '../include.php';
checkIsLogin();
$id=$_REQUEST['id'];
$sql="select aID, aName, aPassword, aPhoneNumber, aEmail from Web_Admin where aID='{$id}'";
$row=fetchOne($sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Edit Admin</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css"/>
<link rel="stylesheet" type="text/css" href="../styles/main.css"/>
    
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
<h2>Edit Admin</h2>
<form action="doAdminAction.php?act=editAdmin&id=<?php echo $id;?>" method="post">
    <br/>
    Admin Name:<br/><input class="formInfo" type="text" name="aName" required="required" placeholder="<?php echo $row['aName']; ?> "/><br/><br/>

    Password:<br/><input class="formInfo" type="password" name="aPassword" required="required" placeholder="<?php echo $row['aPassword']; ?>"/><br/><br/>

    Phone Number:<br/><input class="formInfo" type="text" name="aPhoneNumber" required="required" placeholder="<?php echo $row['aPhoneNumber']; ?>"/><br/><br/>
    Email Address:<br/><input class="formInfo" type="email" name="aEmail" required="required" placeholder="<?php echo $row['aEmail']; ?> "/><br/><br/>





      <input class="LoginButton" type="submit"  value="Edit Admin"/>
</form>
</div>
<div class="footer">
Copyright &copy; 2016 University of Nottingham Ningbo China
</div>
</body>
</html>

