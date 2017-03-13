<?php
error_reporting(0);
require_once 'include.php';
$rows=getAllEvent();
if(!$rows){
    alertMes("Sorry, no event! Please wait some time.", "login.php");
    exit;
}

function getAvailNum($eventID, $eventCapacity)
{
    $sql="select * from Web_UAE where eID = '$eventID' ";
    $AvailNum= $eventCapacity - getResultNum($sql);
    //return the availNum of event
    return $AvailNum;
}


//$loginFlag=0;
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>UNNC EVENT</title>
<link type="text/css" rel="stylesheet" href="admin/styles/reset.css"/>
<link rel="stylesheet" type="text/css" href="styles/main.css"/>
<script src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.1.min.js"></script>
</head>
<body>

<div class="headerBar">

  <div class="title"><h1>UNNC EVENTS</h1>
        
    <!-- user info -->
    <div class="navbar">

		<?php if($_SESSION['loginFlag']):?>
            <ul>
        	<li class="nav_hi fl">Hi, <?php echo $_SESSION['userName'];?></li>
                <ul>
        	<li class="nav_li fr"><a class="nav_right" href="doAction.php?act=userOut">LogOut</a></li>
        <?php else:?>
            <ul>
        	<li class="nav_li fr"><a class="nav_right" href="register.php">Register</a></li>
        	<li class="nav_li fr"><a class="nav_right" href="login.php">Log In</a></li>
      		</ul>        
		<?php endif;?>


    </div>
  </div>
</div>


<!--event table-->
<div class="frontendtablediv" >
<h2>Latest Event</h2> <br>
<?php $i=1; foreach($rows as $row):

if (($row['enddt']) > date('Y-m-d H:i:s')){ ?>

<table class="frontendtable" id="alternatecolor" width="100%" >
<thead>
<tr>
<th width="10%">Event Title</th>
<th width="10%">Start Date</th>
<th width="10%">End Date</th>
<th width="5%">Capacity</th>
<th width="5%">Available Number</th>
<th width="10%">Location</th>
<th width="10%">Description</th>
<th width="8%">Operation</th>
</tr>
</thead>
<tbody>

    <tr>	
    <td><?php echo $row['eTitle'];?></td>
    <td><?php echo $row['startdt'];?></td>   
    <td><?php echo $row['enddt'];?></td>
    <td><?php echo $row['eCapacity'];?></td>
	
	<td><?php 
$eCapacity=$row['eCapacity'];
$eID=$row['eID'];

$AvailNum=getAvailNum($eID, $eCapacity); 

echo $AvailNum;
?></td>
	<td><?php echo $row['eLocation'];?></td>
    <td><?php echo $row['eDesc'];?></td>

<td>
<?php 

$uID=$_SESSION['loginFlag'];
//Accoring to different user to show different content
$sql="select * from Web_UAE where uID='$uID' and eID='$eID'";
if($uID){
    if(checkAttend($sql)){?>
        <input class="formButton" type="button" value="CANCEL" onclick="cancelEvent(<?php echo $eID;?>)">
    <?php }else if($AvailNum>0){?>
<input type="button" value="ATTEND" class="formButton" onclick="attendEvent(<?php echo $eID;?>)" > 
    <?php }else{?>
                 <span class="formButton">FULL</span>   
<?php }}else{?>
    <input type="button" value="LogIn" class="formButton" onclick="window.location.href='login.php'">
    <?php }?>
    </td>
    </tr>

<br/><br/>
<?php }$i++; endforeach;?>


</tbody>
</table>
</div>
<div class="footer">
Copyright &copy; 2016 University of Nottingham Ningbo China
</div>
</body>

<script type="text/javascript">
function addEvent() {
    window.location="addEvent.php";
}
function attendEvent(eventID) {
        //use ajax ask php 
        var url = "attendEvent.php";
        var data = {"eventID": eventID};
        var success = function (response){
            if (response.errno == 0) {
                alert("Attend successful!");
                window.location.reload();

            }else{
                alert("Sorry, failed to attend!");
                window.location.reload();
            }

        };
        $.post(url,data,success,"json");
    }
function cancelEvent(eventID) {
        //use ajax ask php 
        var url = "cancelEvent.php";
        var data = {"eventID": eventID};
        var success = function (response){
            if (response.errno == 0) {
                alert("Cancel successful!");
                window.location.reload();
            }else{
                alert("Sorry, failed to cancel!");
                window.location.reload();
            }
        };
        $.post(url,data,success,"json");
    }


</script>



</html>






