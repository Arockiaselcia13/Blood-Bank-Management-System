<?php
	
	if(isset($_POST['submit']))
	{
		if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
		{
			echo "select img";
		}
		else
		{
			$email = $_POST['email'];
			$image = addslashes($_FILES['image']['tmp_name']);
			$name = addslashes($_FILES['image']['name']);
			$image = file_get_contents($image);
			$image = base64_encode($image);
			saveimage($name,$image,$email);
		}
	}
	
	function saveimage($name,$image,$email)
	{
		$con = mysqli_connect("localhost","root","","Bloodbank");
		$query = "insert into image (name,image,email) values ('$name','$image','$email')";
		$r = mysqli_query($con,$query);
		if($r)
			echo 'img uploaded';
		else
			echo 'not uploaded';
	}
	

		?>