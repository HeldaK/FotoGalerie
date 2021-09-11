<?php
	@session_start();
	/*$_SESSION['user'] = "Me";  check anmelden abmelden*/
	if(isset($_SESSION['user']))
	{
		$session = $_SESSION['user'];
	}
	else
	{
		$session = null;
	}
	

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>FotoGalerie</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="device-width, initial-scale=1.0">
		
		<!-- css styles -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet"> 
		<link rel="stylesheet" type="text/css" href="css/reset.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" href="../../original/favicon.ico">
		
		<!-- js scripts -->
		<script type="text/javascript" src="js/jquery.js"></script>
		
		<!-- css text rotater -->
		<link rel="stylesheet" type="text/css" href="css/simpletextrotator.css">
		<!-- JavaScript text rotater -->
		<script type="text/javascript" src="js/jquery.simple-text-rotator.js"></script>
	</head>

	<body>
		<!-- header -->
		<header class="transparent-bg">
			<div class="container">
				<a href="#" class="logo float-start">Foto<span class="bold primary">G</span>alerie</a>
				<nav class="float-end right">
					<button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse" id="menu">
						<ul class="transparent-bg center">
							<li><a href="#">Home</a></li>
							<li><a href="#">Gallery</a></li>
							<li><a href="#">Kontakt</a></li>
							<li><a href="#">Über Uns</a></li>
							<?php
								if($session==null)
								{
							?>
									<li class="login"><a href="login.php" class="secondary-bg">Anmelden</a></li>
									<li class="register"><a href="register.php" class="primary-bg">Regstrieren</a></li>
							<?php
								}
								else
								{
							?>
									<li class="logout"><a href="logout.php" class="primary-bg">Abmelden</a></li>
							<?php
								}
							?>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		