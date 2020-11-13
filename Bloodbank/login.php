<html>
<head>
		<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<div class='bld'>
	<div class='center'>
    <h1>Blood Bank</h1>
    <h2>Login</h2>
    <form method="post" action="" action='profile.php'>
      
	  <input type="email" class='email' name="email" placeholder="Username/Email" required><br>
	 
	  <input type="password" class='userpassword' name="password" placeholder="password"  required>
	  <button class="btn" onclick="location.href='login.php'"><i class="fa fa-sign-in" aria-hidden="true"></i>&ensp;Sign In</button>
	 <button class="btn" onclick="location.href='register.php'"><i class="fa fa-sign-in" aria-hidden="true"></i>&ensp;Register</button>

	</form>
</div></div>
<?php
session_start();
$con = mysqli_connect("localhost","root","","bloodbank");
$email=$_POST['email'];
$password=$_POST['password'];
$query="SELECT * FROM donardetails WHERE email='$email' AND password='$password' ";
$result=mysqli_query($con,$query);
$count=mysqli_num_rows($result);
if($count>0)
	{
		
		while($row = mysqli_fetch_array($result))
		{
		 $email1 = $row['email'];
		 $password1 = $row['password'];
		 $name = $row['name'];
		 $address = $row['address'];
		 $bloodgroup = $row['bloodgroup'];
		 $mobileno = $row['mobileno'];
		 $image = $row['image'];
	     if($email==$email1 && $password==$password1)
	     {
	     	$_SESSION['name'] = $name;
	     	$_SESSION['email'] = $email1;
	     	$_SESSION['address'] = $address;
	     	$_SESSION['password'] = $password1;
	     	$_SESSION['mobileno'] = $mobileno;
	     	$_SESSION['image'] = $image;
	     	header("Location: home.php");
	     }
	    }
    }

else
?>
	{
	<script type='text/javascript'>
	
	alert("invalid details!!");</script>}

</body>
</html>