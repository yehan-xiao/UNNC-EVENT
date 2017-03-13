<?php
error_reporting(0);
require_once '../include.php';
checkIsLogin();
$rows=getAllEvent();
if(!$rows){
    alertMes("Sorry, no event! Please add!", "addEvent.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Event List</title>
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

<!--event table-->
<div class="tablediv" >
<h2>Event List</h2>
<table class="altrowstable" id="alternatecolor" width="100%" >
<thead>
<tr>
<th>ID</th>
<th>Event Title</th>
<th>Start Date</th>
<th>End Date</th>
<th>Capacity</th>
<th>Location</th>
<th>Description</th>
<th>Operation</th>

</tr>
</thead>
<tbody>
<?php $i=1; foreach($rows as $row):?>
    <tr>

    <td><?php echo $i;?></td>
    <td><?php echo $row['eTitle'];?></td>
    <td><?php echo $row['startdt'];?></td>   
    <td><?php echo $row['enddt'];?></td>
    <td><?php echo $row['eCapacity'];?></td>
    <td><?php echo $row['eDesc'];?></td>
    <td><?php echo $row['eLocation'];?></td>

    <td align="center"><input class="formButton" type="button" value="Edit" onclick="editEvent(<?php echo $row['eID'];?>)"> <input type="button" value="Delete" class="formButton"  onclick="delEvent(<?php echo $row['eID'];?>)"></td>
    </tr>
<?php $i++; endforeach;?>

</tbody>
</table>
</div>
</body>
<script type="text/javascript">
function addEvent() {
    window.location="addEvent.php";
}

    function editEvent(id) {
        window.location="editEvent.php?id="+id;
    }
    function delEvent(id){
        if(window.confirm("Are you sure to delete event?")){       
        window.location="doAdminAction.php?act=delEvent&id="+id;
        }
    }

function altRows(id){
    if(document.getElementsByTagName){  
        
        var table = document.getElementById(id);  
        var rows = table.getElementsByTagName("tr"); 
         
        for(i = 0; i < rows.length; i++){          
            if(i % 2 == 0){
                rows[i].className = "evenrowcolor";
            }else{
                rows[i].className = "oddrowcolor";
            }      
        }
    }
}

window.onload=function(){
    altRows('alternatecolor');
}
</script>


<div class="footer">
Copyright &copy; 2016 University of Nottingham Ningbo China
</div>
</body>
</html>