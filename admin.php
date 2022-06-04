<?php 

	if ($_SESSION['user']['valid'] == 'true') {
		if (!isset($action)) { $action = 1; }
		print '
		<div id="adm">
			<h1>Administracija</h1>
			<div id="admin">
				<ul>
					<li>Uredi:</li>
					<li><a href="index.php?menu=7&amp;action=1">Korisnici</a></li>
					<li><a href="index.php?menu=7&amp;action=2">Novosti</a></li>
				</ul>';
				# Admin Users
				if ($action == 1) { include("admin/users.php"); }
			
				# Admin News
				else if ($action == 2) { include("admin/news.php"); }
			print '
			</div>
		</div>';
		
		
	}
	else {
		$_SESSION['message'] = '<p>Please register or login using your credentials!</p>';
		header("Location: index.php?menu=6");
	}
?>