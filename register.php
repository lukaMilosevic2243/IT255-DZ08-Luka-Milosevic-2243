<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['pass']));
	
	$uname = trim($uname);
	$email = trim($email);
	$upass = trim($upass);
	
	$query = "SELECT user_email FROM users WHERE user_email='$email'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result);
	
	if($count == 0){
		
		if(mysql_query("INSERT INTO users(user_name,user_email,user_pass) VALUES('$uname','$email','$upass')"))
		{
			?>
			<script>alert('Uspesno registovan ');</script>
			<?php
		}
		else
		{
			?>
			<script>alert('greska...');</script>
			<?php
		}		
	}
	else{
			?>
			<script>alert('email se vec koristi ...');</script>
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
<input type="text" name="uname" placeholder="User Name" required /></td>
<input type="email" name="email" placeholder="Your Email" required /></td>
<input type="password" name="pass" placeholder="Your Password" required /></td>
<button type="submit" name="btn-signup">Registracija</button></td>
<a href="index.php">Login</a></td>
</form>
</div>
</center>
</body>
</html>