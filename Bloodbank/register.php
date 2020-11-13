<html>
<head>
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<div class='bld'>
	<div class='rcenter'>
    <h1>Blood Bank</h1>
    <h2>Registeration</h2>
    <form method="post"  action='' enctype="multipart/form-data">
	  <input type="text" class='name' name="name" placeholder="Name" required><br>
	  
	  <input type="email" class="email" name="email" placeholder="email@gmail.com" required><br>
	  <input type="text" class = "number" name="mobileno" placeholder="mobile number" required><br>
	  <input type="text" class="address" name="address" placeholder="address" required><br>
      <input type="password" class='password' name="password" placeholder="password" required>
     <select id="blood" name="blood">
     <option value="Select Blood">Blood Group</option>
     <option value="A-">A-</option>
     <option value="A+">A+</option>
     <option value="AB-">AB-</option>
     <option value="AB+">AB+</option>
     <option value="B-">B-</option>
     <option value="B+">B+</option>
     <option value="O-">O-</option>
     <option value="O+">O+</option>
  </select><br><br>
      <input type="file" class="image" name="image" required><br>
	  <button class="btn" name="submit" ><i class="fa fa-sign-in" aria-hidden="true"></i>&ensp;Register</button>
<?php
$con=mysqli_connect("localhost","root","","Bloodbank");
if (isset($_POST['submit'])) {

$email=$_POST['email'];
$q = "SELECT * FROM donardetails WHERE email='$email' ";
$r = mysqli_query($con,$q);
$re = mysqli_num_rows($r);
if($re>0)
{
?><script type='text/javascript'>
	
	swal("user already exists!", {
  buttons: false,
  timer: 3000,
});</script>
<?php
}
else
{
$uname=$_POST['name'];
$email=$_POST['email'];
$mobileno=$_POST['mobileno'];
$address=$_POST['address'];
$password=$_POST['password'];
$blood=$_POST['blood'];
$image = addslashes($_FILES['image']['tmp_name']);
$name = addslashes($_FILES['image']['name']);
$image = file_get_contents($image);
$image = base64_encode($image);
saveimage($uname,$email,$mobileno,$address,$password,$blood,$name,$image);

}
}

function saveimage($uname,$email,$mobileno,$address,$password,$blood,$name,$image){
$con=mysqli_connect("localhost","root","","Bloodbank");
$sql = "INSERT INTO donardetails (name,email,mobileno,address,password,bloodgroup,iname,image)VALUES('{$uname}','{$email}','{$mobileno}','{$address}','{$password}','{$blood}','{$name}','{$image}')";
if(mysqli_query($con,$sql))
{
header('location:login.php');?>
<script>
alert('registered success!!');</script>
<?php
}
else
echo $con->error;
}

?>
</body></html>