<?php
	#stop hack
	define('__APP__', TRUE);


	#session
	session_start();


	#databese connection
	include ("dbconn.php");

	if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }
		if(isset($_GET['action'])) { $action   = (int)$_GET['action']; }
	
	# Variables MUST BE STRINGS A-Z
   		 if(!isset($_POST['_action_']))  { $_POST['_action_'] = FALSE;  }
	
		if (!isset($menu)) { $menu = 1; }

	include_once("functions.php");
	

print '
<!DOCTYPE html>
<html>
	<head>
		
		<link rel="stylesheet" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Chakra+Petch:400i" rel="stylesheet"> 
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="description" content="some description">
        <meta name="keywords" content="keyword 1, keyword 2, keyword 3, keyword 4, ...">
		<title>Logistika</title>
	</head>
<body>
	<header>
		<div'; print '></div>

		<nav>';
			include("menu.php");
		print '</nav>

	</header>
	<main>';
		if (isset($_SESSION['message'])) {
			print $_SESSION['message'];
			unset($_SESSION['message']);
	}

	#Homepage
	if (!isset($_GET['menu']) || $_GET['menu'] == 1) { include("home.php"); }
	
	# News
	else if ($_GET['menu'] == 2) { include("news.php"); }
	
	# Contact
	else if ($_GET['menu'] == 3) { include("contact.php"); }
	
	# About us
	else if ($_GET['menu'] == 4) { include("about.php"); }
	
	# API PROF	
	else if ($_GET['menu'] == 8) { include("api.php"); }


	else if ($_GET['menu'] == 9) { include("apicrypto.php"); }

	else if ($_GET['menu'] == 10) { include("cryptoapi.php"); }

	# MY apy
	else if ($_GET['menu'] == 5) { include("register.php"); }

	#Signin
	else if ($_GET['menu'] == 6) { include("signin.php"); }

	#Admin	
	else if ($menu == 7) { include("admin.php"); }



	print'
	</main>

	<footer>
		<p>Copyright &copy; 2022 Petar Imbrešić NWP projekt</p>
		<div class="drustvene_mreze">
		<a href="https://www.linkedin.com/" target="_blank"><img src="image/linkedin.svg" alt="Linkedin" title="Linkedin" style="width:24px; margin-top:0.4em"></a>
		<a href="https://twitter.com/login" target="_blank"><img src="image/twitter.svg" alt="Twitter" title="Twitter" style="width:24px; margin-top:0.4em"></a>
		<a href="https://plus.google.com/discover" target="_blank"><img src="image/google+.svg" alt="Google+" title="Google+" style="width:24px; margin-top:0.4em"></a>
		<a href="https://www.facebook.com/"target="_blank"><img src="image/facebook.jpg" alt="Facebook" title="Facebook" style="width:24px; margin-top:0.4em"></a>
		</div>
	</footer>
</body>
</html>';
?>