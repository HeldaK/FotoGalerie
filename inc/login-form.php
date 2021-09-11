<section class="login center">
	<div class="section-header">
		<h1>Anmelden</h1>
		<h6><a href="index.php" class="primary">Home</a>&gt;Anmelden</h6>
	</div>
	<div class="login-content">
		<form method="post" id="login-form" action="login.php">
			<input type="text" class="username" id="username" name="username" placeholder="Benutzername" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>"/>
			<input type="password" class="password" id="password" name="password" placeholder="Passwort"/>
			<input type="submit" name="submit" class="submit" id="submit" value="Anmelden"/>
		</form>
	</div>
</section>

<?php
	include 'db.inc.php';
	$username="";
	$password="";
	$error=array();
	
	function login($username,$password)
	{
		global  $conn;
		$newpassword = md5($password);
		$query = "select * from users where username='$username' and password='$newpassword'";
		$result=mysqli_query($conn, $query);
		
		if(mysqli_num_rows($result)>0)
		{
			$_SESSION['user'] = $username;
			header('Location:index.php');
		}
	}
	
	function sanitize($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		
		return $data;
	}
	
	
	if(isset($_POST['submit']))
	{
		$username=sanitize($_POST['username']);
		$password=sanitize($_POST['password']);
		
		if(empty($username))
		{
			?>
			<script type="text/javascript">
			$('#error').append("Benutzername eintragen.");
			</script>
			<?php
		}
		elseif(empty($password))
		{
			?>
			<script type="text/javascript">
			$('#error').append("Passwort eintragen.");
			</script>
			<?php
		}
		else
		{
			login($username,$password);
		}
		
	
		
	}
?>













