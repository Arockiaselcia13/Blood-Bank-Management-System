<?php session_start();?>

<html>
<head>
	<link rel="stylesheet" href="home.css">
	<style>
		.profile{
	text-align:center;
	padding:10px;
	height:550px;
	width:400px;
	border:3px solid #fff;
	float:left;
	margin-left:35%;
	margin-top:20px;
	background:#E6E2D8;
	
}
	</style>
</head>
<body>
	<nav>
		<label class="logo">Blood Donation</label>
		<ul>
			<li><a class="active" href="#">DonarDetails</a></li>
			<li><a href="donarcount.php">DonarCount</a></li>
			<li><a href="Profile.php">Profile</a></li>
			<li><a href="login.php">Logout</a></li>
		</ul>
	</nav>
	<div class='profile'>
	<?php
   echo "<center><h2><br>";
    echo "<bold>My Profile</bold><br><br>";
    echo '<img height="150" width="150" src="data:image;base64,'.$_SESSION['image'].'">';
	echo "<br><br>&ensp;&emsp;&nbsp;Name : ".$_SESSION['name']."<br><br>";
	echo "&ensp;&emsp;&nbsp;&ensp;Email : ".$_SESSION['email']."<br><br>";
	echo "Address : ".$_SESSION['address']."<br><br>";
	echo "Mobileno: ".$_SESSION['mobileno']."<br><br>";
	echo "</h2></center>";
	?>
</div>
</body></html>