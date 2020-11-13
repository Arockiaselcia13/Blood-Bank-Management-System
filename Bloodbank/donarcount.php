<html>
<head>
	<link rel="stylesheet" href="home.css">
</head>
<body>
	<nav>
		<label class="logo">Blood Donation</label>
		<ul>
			<li><a class="active" href="home.php">DonarDetails</a></li>
			<li><a href="donarcount.php">DonarCount</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="login.php">Logout</a></li>
		</ul>
	</nav>

<?php
$con = mysqli_connect("localhost","root","","bloodbank");
$ap = "SELECT COUNT(bloodgroup) AS count FROM donardetails WHERE bloodgroup = 'A+' ";
$an = "SELECT COUNT(bloodgroup) AS count1 FROM donardetails WHERE bloodgroup = 'A-' ";
$bp = "SELECT COUNT(bloodgroup) AS count2 FROM donardetails WHERE bloodgroup = 'B+' ";
$bn = "SELECT COUNT(bloodgroup) AS count3 FROM donardetails WHERE bloodgroup = 'B-' ";
$abp = "SELECT COUNT(bloodgroup) AS count4 FROM donardetails WHERE bloodgroup = 'AB+' ";
$abn = "SELECT COUNT(bloodgroup) AS count5 FROM donardetails WHERE bloodgroup = 'AB-' ";
$op = "SELECT COUNT(bloodgroup) AS count6 FROM donardetails WHERE bloodgroup = 'O+' ";
$on = "SELECT COUNT(bloodgroup) AS count7 FROM donardetails WHERE bloodgroup = 'O-' ";

$apc = mysqli_query($con,$ap);
$apcv = mysqli_fetch_assoc($apc);
$apcn = $apcv['count'];


$anc = mysqli_query($con,$an);
$ancv = mysqli_fetch_assoc($anc);
$ancn = $ancv['count1'];

$bpc = mysqli_query($con,$bp);
$bpcv = mysqli_fetch_assoc($bpc);
$bpcn = $bpcv['count2'];

$bnc = mysqli_query($con,$bn);
$bncv = mysqli_fetch_assoc($bnc);
$bncn = $bncv['count3'];

$abpc = mysqli_query($con,$abp);
$abpcv = mysqli_fetch_assoc($abpc);
$abpcn = $abpcv['count4'];

$abnc = mysqli_query($con,$abn);
$abncv = mysqli_fetch_assoc($abnc);
$abncn = $abncv['count5'];


$opc = mysqli_query($con,$op);
$opcv = mysqli_fetch_assoc($opc);
$opcn = $opcv['count6'];

$onc = mysqli_query($con,$on);
$oncv = mysqli_fetch_assoc($onc);
$oncn = $oncv['count7'];
?>
<center><table class="group">
	<tr>
		<th>Group</th>
		<th>Count</th>
	</tr>
	<tr><td>A+</td><td><?php echo $apcn ?></td></tr>
	<tr><td>A-</td><td><?php echo $ancn ?></td></tr>
    <tr><td>B+</td><td><?php echo $bpcn ?></td></tr>
	<tr><td>B-</td><td><?php echo $bncn ?></td></tr>
    <tr><td>AB+</td><td><?php echo $abpcn ?></td></tr>
	<tr><td>AB-</td><td><?php echo $abncn ?></td></tr>
    <tr><td>O+</td><td><?php echo $opcn ?></td></tr>
	<tr><td>O-</td><td><?php echo $oncn ?></td></tr>

</table></center>
</body>
</html>