<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Log In</title>
<link type="text/css" rel="stylesheet" href="admin/styles/reset.css"/>
<link type="text/css" rel="stylesheet" href="styles/logreg.css"/>
</head>
<body>

	<div class="welcome_title"><h1>Welcome to UNNC EVENTS</h1></div>
	<div class="loginBox">
    <form class="loginForm" action="doAction.php?act=login" method="post">
        
        <input class="formInfo" type="text" name="username" placeholder="	username" required="required" /><br/>
        <br/><input class="formInfo" type="password" name="password" placeholder="	password" required="required" /><br/><br/>
      
        <input class="LoginButton" type="submit" value="Log In!"/><br/><br/><br/>
        <a href="register.php">Sign Up!</a>
    </form>
</div>

<div class="footer">
Copyright &copy; 2016 University of Nottingham Ningbo China<br>
</div>

</body>
</html>
