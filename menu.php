<?php 
    print '
    <div class="banner-image"></div>
	<ul>
		<li><a href="index.php?menu=1">Naslovna</a></li>
		<li><a href="index.php?menu=2">Novosti</a></li>
		<li><a href="index.php?menu=3">Kontakt</a></li>
		<li><a href="index.php?menu=8">Filmovi</a></li>
		<li><a href="index.php?menu=10">Crypto</a></li>
		<li><a href="index.php?menu=9">BTC 2017</a></li>';
		if (!isset($_SESSION['user']['valid']) || $_SESSION['user']['valid'] == 'false') {
			print '
			<li><a href="index.php?menu=5">Registracija</a></li>
			<li><a href="index.php?menu=6">Prijava</a></li>';
		}
		else if ($_SESSION['user']['valid'] == 'true') {
			print '
			<li><a href="index.php?menu=7">Admin</a></li>
			<li><a href="signout.php">Odjava</a></li>';
			
		}
		print '
	</ul>';
?>