<html>
<head>
	<link rel="stylesheet" href="home.css">
</head>
<body>
	<nav>
		<label class="logo">Blood Donation</label>
		<ul>
			<li><a class="active" href="#">DonarDetails</a></li>
			<li><a href="donarcount.php">DonarCount</a></li>
			<li><a href="#">Profile</a></li>
			<li><a href="login.php">Logout</a></li>
		</ul>
	</nav>
	<form class='search' method="POST"  action ="home.php">
		<center>
		<input type='text' name='bloodgroup'>
		<input type='submit'  name='search' value='search'>
	</center>
	</form>
	<table class = 'colo'><br><br>
		<?php 
		
		$connection = mysqli_connect("localhost","root","","bloodbank");
		
		if(isset($_POST['search']))
		{
			$bloodgroup = $_POST['bloodgroup'];
			$query ="SELECT name,email,mobileno,address,bloodgroup from donardetails WHERE bloodgroup='$bloodgroup' ";
			$query_run = mysqli_query($connection,$query);
			if(mysqli_num_rows($query_run)>0)
            {
            	

			while($row = mysqli_fetch_array($query_run))
			{

				?><center>
				<tr>
					<th>Name</th>
			        <th>Email</th>
			        <th>Mobileno</th>
			        <th>Address</th>
			        <th>Bloodgroup</th>
			    </tr>
			    <tr>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php echo $row['mobileno'];?></td>
					<td><?php echo $row['address'];?></td>
					<td><?php echo $row['bloodgroup'];?></td>
				</tr></center>
				<?php
			}
		    }
		    else
		    	echo "<h1><center>No Donar Found</center></h1>";
	    }?>
</body>
</html>