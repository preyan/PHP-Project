<?php
session_start();
require_once('connection.php');


if(isset($_SESSION['fromMain']) && ($_SESSION['fromMain'] !== 'admin'))						//_____PREVENT DIRECT ACCESS______	
{
	header('location:logout.php');
}

?>



<html>
<head>
<title>ADMINISTRATOR</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<header>
		M. K. GHOSH HOSPITAL
	</header>
	<nav>
		<ul>
		  <li><a href="#home">HOME</a></li>
		  <li><a href="#packages">PACKAGES</a></li>
		  <li id="admin"><a href="logout.php"><b>Logout</b></a></li>
		</ul>
	</nav>
	
</div>
</body>
</html>