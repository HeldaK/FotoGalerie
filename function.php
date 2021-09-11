<?php
	include 'inc/db.inc.php';
	
	function get_profile_info($username)
	{
		global  $conn;
		$fname="";
		$lname="";
		$email="";
		$bio="";
		
		$query = "select * from users where username='$username'";
		$result=mysqli_query($conn, $query);
		
		if(mysqli_num_rows($result)>0)
		{
			echo "<div class='col-md-2 float-start'>
					Vorname : <br>
					Nachname : <br>
					Email : <br>
					Biografy : <br>
				</div>";
				
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<div class='col-md-8'>";
				echo $fname= $row['fname'],'<br>';
				echo $lname= $row['lname'],'<br>';
				echo $email= $row['email'],'<br>';
				
				if($row['bio']=='')
				{
					echo 'Sie haben keine Biografie zur Verfügung gestellt<br>';
				}
				else
				{
					echo $row['bio'];
				}
			}
			
			echo "</div>";
		}
	}
	
	function get_avatar_image($user)
	{
		$pic = 0;
		$upload_folder="uploads";
		$user_folder = $upload_folder.'/'.$user;
		$avatar_image_folder = $user_folder.'/avatar';
		
		if(is_dir($upload_folder))
		{
			if(is_dir($user_folder))
			{
				
			}
			else
			{
				mkdir($user_folder);
			}
		}
		else
		{
			mkdir($upload_folder);
			
			if(is_dir($user_folder))
			{
				
			}
			else
			{
				mkdir($user_folder);
			}
		}
		
		if(is_dir($avatar_image_folder))
		{
			
		}
		else
		{
			mkdir($avatar_image_folder);
		}
		
		if($handle = opendir($avatar_image_folder))
		{
			while(false !== ($entry = readdir($handle)))
			{
				if(($entry!='.') and ($entry!='..'))
				{
					$pic = 1;
					$avatar_image_path = $avatar_image_folder.'/'.$entry;
					echo "<img src='$avatar_image_path' alt='$entry' id='avatar-image-id' width='300px'>";
				}
			}
			closedir($handle);
		}
		
		if($pic==0)
		{
			echo "<img src='images/user-default.jpg' id='avatar-image-id' width='300px'/>";
		}
	}
	
	function get_user_uploaded_pics($username)
	{
		global $conn;
		$query = "select * from pics where username='$username'";
		$result=mysqli_query($conn, $query);
		
		if(mysqli_num_rows($result)>0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$pid = $row['pid'];
				$picname = $row['picname'];
				$path = 'uploads/'.$username.'/'.$picname;
				?>
				<div class="col-md-4 float-start">
					<img src="<?php echo $path; ?>">
				</div>
				<?php
			}
		}
	}
	
	
?>

