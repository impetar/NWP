<?php 
    print '
    <div id="register">
	<h1>Registracija </h1>';
	
	
	if ($_POST['_action_'] == FALSE) {
        print '
        
		<form action="" id="regForm1" name="regForm1" method="POST">
			<input type="hidden" id="_action_" name="_action_" value="TRUE">
			
			<label for="fname">Ime * <small>(Obavezno polje...)</small></label>
			<input type="text" id="fname" name="frstname" placeholder="npr.: Marko 	" required>

			<label for="lname">Prezime *<small>(Obavezno polje...)</small></label>
			<input type="text" id="lnane" name="lastname" placeholder="Your last name.." required>
				
			<label for="email">Elektronska pošta  <small>(Obavezno polje...)</small></label>
			<input type="email" id="email" name="email" placeholder="npr: ime.prezime@info.hr" required>
			
			<label for="username">Korisničko ime:* <small>(minimalno 5 maksimalno 10 znakova)</small></label>
			<input type="text" id="username" name="username" pattern=".{5,10}" placeholder="npr: mmarkic" required><br>
			
									
			<label for="password">Lozinka:* <small>(Lozinka mora sadržavati min 4 znaka)</small></label>
			<input type="password" id="password" name="password" placeholder="npr.necuTiRec1." pattern=".{4,}" required>
			<p></p>
			<label for="country">Država:</label>
			
			<select name="country" id="country">
                <option value="">molimo odaberite</option>
            </div>';
				#upiti prema bazi country
				$query  = "SELECT * FROM countries";
				$result = @mysqli_query($MySQL, $query);
				while($row = @mysqli_fetch_array($result)) {
					print '<option value="' . $row['country_code'] . '">' . $row['country_name'] . '</option>';
				}
            print '
            
			</select>
            <input type="submit" value="Potvrdi">
       
		</form>';
	}
	else if ($_POST['_action_'] == TRUE) {
		
		$query  = "SELECT * FROM users";
		$query .= " WHERE email='" .  $_POST['email'] . "'";
		$query .= " OR username='" .  $_POST['username'] . "'";
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);		
		if ($row['fname'] == '') {	
			$pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 5]);
			
			$query  = "INSERT INTO users (firstname, lastname, email, username, password, password_txt, country)";
			$query .= " VALUES ('" . $_POST['frstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['email'] . "', '" . $_POST['username'] . "', '" . $pass_hash . "', '" . $_POST['password'] . "','" . $_POST['country'] . "')";
			$result = @mysqli_query($MySQL, $query);
			
			# ucfirst() — Make a string's first character uppercase
			# strtolower() - Make a string lowercase
			echo '<p>' . ucfirst(strtolower($_POST['frstname'])) . ' ' .  ucfirst(strtolower($_POST['lastname'])) . ', Hvala na registraciji!!!  </p>
			<hr>';
		}
		else {
			echo '<p>KORISNIK s tom emila adesom postoji!</p>';
		}
	
	}
	print '
	</div>';
?>