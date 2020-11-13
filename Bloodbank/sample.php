<html> 
<body>
	<form method="post" action="sample.php" enctype="multipart/form-data">
		
		<input type="file" name="image">
        <input type="submit" name="submit">
	</form>
	<?php
	
	if(isset($_POST['submit']))
	{
		if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
		{
			echo "select img";
		}
		else
		{
			$image = addslashes($_FILES['image']['tmp_name']);
			$name = addslashes($_FILES['image']['name']);
			$image = file_get_contents($image);
			$image = base64_encode($image);
			saveimage($name,$image);
		}
	}
	display();
	function saveimage($name,$image)
	{
		$con = mysqli_connect("localhost","root","","test");
		$query = "insert into sample (name,image) values ('$name','$image')";
		$r = mysqli_query($con,$query);
		if($r)
			echo 'img uploaded';
		else
			echo 'not uploaded';
	}
	function display()
	{
		$con = mysqli_connect("localhost","root","","test");
		$query = "select * from sample where id=1";
		$r = mysqli_query($con,$query);
		while($row=mysqli_fetch_array($r))
		{
			echo '<img height="100" width="100" src="data:image;base64,'.$row[1].'">';
		}
	}

		?>
</body>
</html>