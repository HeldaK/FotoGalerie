<section class="registeration center">
	<div class="section-header">
		<h1>Registreieren</h1>
		<h6><a href="index.php" class="primary">Home</a>&gt;Registreieren</h6>
	</div>
	<div class="registeration-content">
		<form method="post" id="register-form" action="register.php">
			<input type="text" class="fname" id="fname" name="fname" placeholder="Vornamen" value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];} ?>"/>
			<input type="text" class="lname" id="lname" name="lname" placeholder="Nachnamen" value="<?php if(isset($_POST['lname'])){echo $_POST['lname'];} ?>"/>
			<input type="text" class="username" id="username" name="username" placeholder="Benutzername" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>"/>
			<input type="email" class="email" id="email" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>"/>
			<input type="password" class="password" id="password" name="password" placeholder="Passwort"/>
			<input type="password" class="confirm-password" id="confirm-password" name="confirm-password" placeholder="Passwort bestätigen"/>
			<textarea id="bio" name="bio" placeholder="Biography(optional)" value="<?php if(isset($_POST['bio'])){echo $_POST['bio'];} ?>"></textarea>
			<input type="submit" name="submit" class="submit" id="submit" value="Registreieren"/>
		</form>
		<div id="error" class="primary">
		</div>
		<div id="success" class="secondary">
		</div>
	</div>
</section>

<?php
	include 'db.inc.php';
	$fname="";
	$lname="";
	$username="";
	$email="";
	$password="";
	$bio="";
	$uploads=0;
	$id="";
	$error=array();
	
	function register($id,$fname,$lname,$username,$email,$password,$bio,$uploads)
	{
		global  $conn;
		$newpassword = md5($password);
		$query = "insert into users values('$id','$fname','$lname','$username','$email','$newpassword','$bio','$uploads')";
		$result=mysqli_query($conn, $query);
		if($result)
		{
			?>
			<script type="text/javascript">
			$('#success').append("<h4>Sie haben sich erfolgreich registriert. <a href='login.php' class='click-to-login'>Klicken Sie hier, um sich anzumelden.</a></h4>");
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
			$('#error').append("Fehler bei der Registrierung.");
			</script>
			<?php
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
		//checking firstname
		if(empty($_POST['fname']))
		{
			$error[]="Bitte Vornamen Eintragen.";
		}
		elseif(strlen($_POST['fname']>25))
		{
			$error[]="Vorname muss maximal 25 Zeichen enthalten.";
		}
		else
		{
			$fname=sanitize($_POST['fname']);
		}
		
		//checking lastname
		if(empty($_POST['lname']))
		{
			$error[]="Bitte Nachnamen Eintragen.";
		}
		elseif(strlen($_POST['lname']>25))
		{
			$error[]="Nachnamen muss maximal 25 Zeichen enthalten.";
		}
		else
		{
			$lname=sanitize($_POST['lname']);
		}
		
		//checking username
		if(empty($_POST['username']))
		{
			$error[]="Bitte Benutzername Eintragen.";
		}
		elseif(strlen($_POST['username']>25))
		{
			$error[]="Benutzername muss maximal 25 Zeichen enthalten.";
		}
		else
		{
			$username=sanitize($_POST['username']);
		}
		
		//checking email
		if(empty($_POST['email']))
		{
			$error[]="Bitte Email Eintragen.";
		}
		elseif(strlen($_POST['email']>50))
		{
			$error[]="Email muss maximal 25 Zeichen enthalten.";
		}
		elseif(!(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)))
		{
			$error[]="Das eingegebene Email ist falsch";
		}
		else
		{
			$email=sanitize($_POST['email']);
		}
		
		//checking password
		if(empty($_POST['password']))
		{
			$error[]="Bitte Passwort Eintragen.";
		}
		elseif(strlen($_POST['password']>32))
		{
			$error[]="Passwort muss maximal 25 Zeichen enthalten.";
		}
		else
		{
			$password=sanitize($_POST['password']);
			if(!empty($_POST['confirm-password']))
			{
				if($_POST['password']!=$_POST['confirm-password'])
				{
					$error[]="Passwort und Passwort bestätigen sind nicht gleich.";
				}
			}
			else
			{
				$error[]="Bitte Passwort bestätigen.";
			}
		}
		
		//checking bio
		if(!empty($_POST['bio']))
		{
			$bio=sanitize($_POST['bio']);
		}
		
		if(count($error)==0)
		{
			$checkusername = "select * from users where username='$username'";
			$runqueryusername = mysqli_query($conn, $checkusername);
			
			$checkemail = "select * from users where email='$email'";
			$runqueryemail = mysqli_query($conn, $checkemail);
			
			if(mysqli_num_rows($runqueryusername)>0)
			{
				?>
				<script type="text/javascript">
				$('#error').append("<?php echo 'Benutzername verfügbar, geben Sie eine andere Benutzername ein.'; ?>");
				</script>
				<?php
			}
			elseif(mysqli_num_rows($runqueryemail)>0)
			{
				?>
				<script type="text/javascript">
				$('#error').append("<?php echo 'Email verfügbar, geben Sie eine andere Email ein.'; ?>");
				</script>
				<?php
			}
			else
			{
				register($id,$fname,$lname,$username,$email,$password,$bio,$uploads);
			}
		}
		else
		{
			foreach($error as $key => $value)
			{
				?>
				<script type="text/javascript">
				$('#error').append("<?php echo $value.'<br>'; ?>");
				</script>
				<?php
			}
		}
		
	}
?>













