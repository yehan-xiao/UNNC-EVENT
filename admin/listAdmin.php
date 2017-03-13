<?php
error_reporting(0);
require_once '../include.php';
checkIsLogin();
$rows=getAllAdmin();
if(!$rows){
    alertMes("Sorry, no admin! Please add!", "addAdmin.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Admin List</title>
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
<h2>Admin List</h2>
<table class="altrowstable" id="alternatecolor" width="100%" >
<thead>
<tr>
<th>ID</th>
<th>Admin Name</th>
<th>Phone Number</th>
<th>Email</th>
<th>Operation</th>

</tr>
</thead>
<tbody>
<?php $i=1; foreach($rows as $row):?>
    <tr>

    <td><?php echo $i;?></td>
    <td><?php echo $row['aName'];?></td>
    <td><?php echo $row['aPhoneNumber'];?></td>   
    <td><?php echo $row['aEmail'];?></td>

    <td align="center"><input class="formButton" type="button" value="Edit" onclick="editAdmin(<?php echo $row['aID'];?>)"> <input type="button" value="Delete" class="formButton"  onclick="delAdmin(<?php echo $row['aID'];?>)"></td>
    </tr>
<?php $i++; endforeach;?>

</tbody>
</table>
</div>
</body>
<script type="text/javascript">
function addAdmin() {
    window.location="addAdmin.php";
}

    function editAdmin(id) {
        window.location="editAdmin.php?id="+id;
    }
    function delAdmin(id){
        if(window.confirm("Are you sure to delete admin?")){       
        window.location="doAdminAction.php?act=delAdmin&id="+id;
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