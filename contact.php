<?php

    print '
    <h1>Naša Lokacija </h1>
    <div id="contact">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3417.482151214414!2d15.917493715934544!3d45.82478437910691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d0d8e142bee3%3A0xdc9a9a9aa31dac62!2sul.+Mire+Petrina+21%2C+10000%2C+Zagreb!5e1!3m2!1shr!2shr!4v1543009086715" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            <form action="" id="contact_form" name="contact_form" method="POST">
                <h2>KONTAKT</h2>
                <p> xyx Logistika</p>
                <p> Adresa: Mire Petrina 21</p>
                <p> 10 000 Zagreb </p>

                <br></br>
                <label for="fname">Ime *</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

                <label for="lname">Prezime *</label>
                <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>
                
                <label for="lname">E-mail adresa *</label>
                <input type="email" id="email" name="email" placeholder="Your e-mail.." required>

                <label for="country">Država</label>
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

                <label for="subject">Poruka</label>
                <textarea id="subject" name="subject" placeholder="Napiši šta te zanima.." style="height:200px"></textarea>

                <input type="submit" value="Submit">
                <br />

                <input type="submit" value="Odustani" href="index.php">
            
                </form>
				
        </div>';
?>