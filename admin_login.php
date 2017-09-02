<?php
session_start();

require_once('connection.php');

$_SESSION['fromMain'] = 'false';				//_____PREVENT DIRECT ACCESS______
$msg= " ";		

if(isset($_POST) & !empty($_POST))
{
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$pass=$_POST['password'];

	$sql="SELECT * from admin WHERE username='$username' AND password='$pass'";

	$result=mysqli_query($con,$sql);

	$row=mysqli_num_rows($result);
	if($row==1)
	{
		$_SESSION['username']=$username;
		$_SESSION['fromMain'] = 'admin';
		header('location:admin.php');

	}
	else
	{
		$err_msg= "Invalid username or password !";
	}
}
if(isset($_SESSION['username']))
{
	$log_msg= "Already logged in !";
}
?>




<html>
<head>
<title>M.K.Ghosh Hospital</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<header>
		M. K. GHOSH HOSPITAL
	</header>
	<nav>
		<ul>
		  <li><a href="#packages">PACKAGES</a></li>
		  <li id="admin"><a href="home.php">STAFF</a></li>
		</ul>
	</nav>

	<form  action="" method="post">
	<table id="login">
		<th colspan="2">
			<h2>ADMIN LOGIN</h2>
		<th>
		<tr>
			<td>USERNAME :</td><td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>PASSWORD :</td><td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td colspan ="2" align="center"><input type="reset" value="Reset"> &nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" value="Login"></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<?php if(isset($err_msg)){ echo $err_msg; }?>
				<?php if(isset($log_msg)){ header('location: admin.php'); }?>
			</td>
		</tr>
	</table>
	</form>
</div>
</body>
</html>
