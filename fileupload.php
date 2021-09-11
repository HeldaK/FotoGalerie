<?php
	include 'inc/db.inc.php';
	session_start();

	$filename = $_FILES['file1']['name'];
	//echo $filename;

	$tmpname = $_FILES['file1']['tmp_name'];
	$session = $_SESSION['user'];
	$destination = 'uploads/'.$session.'/'.$filename;
	
	$id = '';
	$approved =0;
	
	$query = "insert into pics values('$id','$session','$filename','$approved')";
	$result=mysqli_query($conn, $query);
	
	
	if($result)
	{
		if(move_uploaded_file($tmpname, $destination))
		{
			echo $destination;
		}
	}
	
?>