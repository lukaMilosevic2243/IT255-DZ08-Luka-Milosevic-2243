<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['pass']);
	
	$email = trim($email);
	$upass = trim($upass);
	
	$res=mysql_query("SELECT user_id, user_name, user_pass FROM users WHERE user_email='$email'");
	$row=mysql_fetch_array($res);
	
	$count = mysql_num_rows($res);
	
	if($count == 1 && $row['user_pass']==md5($upass))
	{
		$_SESSION['user'] = $row['user_id'];
		header("Location: home.php");
	}
	else
	{
		?>
        <script>alert('Username ili Password Pogresni !');</script>
        <?php
	}
	
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<center>
<div id="login-form">
<form method="post">
<input type="text" name="email" placeholder="Email" required /></td>
<input type="password" name="pass" placeholder="Password" required /></td>
<button type="submit" name="btn-login">Login</button></td>
<a href="register.php">Registracija</a></td>
</form>
</div>
</center>
</body>
</html>