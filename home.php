<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div>
   	Zdravo <?php echo $userRow['user_name']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
</div>
</body>
</html>