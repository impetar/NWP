<?php 
	print '
	<h1>Crypto tražilica</h1>';
	if (!isset($_POST['action']) || $_POST['action'] == '') { $_POST['action'] = FALSE; }
		
		if ($_POST['action'] == FALSE) {
			print '
			<h1 style="text-align:center;">Search CRYPTO using API </h1>
			  <form class="form-horizontal" action="" name="imdbsearch" method="POST">
				<div class="form-group">
				  <label class="control-label col-sm-2" for="title">Unesi crypto valutu:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" id="title" placeholder="U obliku ETC, BTC, ERG ..." name="title" required>
				  </div>
				</div>
                <div class="form-group">       								  
				<input type="hidden" name="action" value="TRUE">
				
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<input type="submit" value="Pretraži">
				  </div>
				</div>				
				<p>. </a></p>
				<p>. </a></p>
				<p>. </a></p>
				<p>. </a></p>
				<p>. </a></p>

			  </form>';
		} 
		else if ($_POST['action'] == TRUE) {

			
			print '
			<h1>Rezultat pretrage</h1>';
			$key = '1F69AA6F-179B-4FDC-ABD5-B45F629E945A';
            
            //if ($_POST['title'] != '') { $url = 'https://randomuser.me/api/'; } 
		
			if ($_POST['title'] != '') { $url = 'https://rest.coinapi.io/v1/assets/'. urlencode($_POST['title']).'/?apikey='.$key; } 
			//else { $url = 'http://www.omdbapi.com/?apikey='.$key.'&t=' . urlencode($_POST['title']); }

			$json = file_get_contents($url);
			$_data = json_decode($json,true);
			if ($_url =! null) {

                foreach($_data as $json){
                    $name= $json['name'];
                    $oznaka= $json['asset_id'];
                    $dnevnipormet= $json['volume_1day_usd'];
                    $uporaba= $json['data_start'];
                    $cijena= $json['price_usd'];
					$hrs= $json['volume_1hrs_usd'];
					$day= $json['volume_1day_usd'];
					$mth= $json['volume_1mth_usd'];




                    

                    
                    

                }
                $dnevnipormet = number_format($dnevnipormet, 3, '.', '');
                $cijena = number_format($cijena, 2, '.', '');
            

				print '
                
                
				<div style="float: center;width: 22%;margin-right: 2%;">
				<div style="float:center;width:70%">
					<p><strong>Naziv criptya:</strong> '.$name.' </p>
                    <p><strong>Oznaka:</strong> '.$oznaka.' </p>
                    <p><strong>Količina:</strong> '.$dnevnipormet. '</p>
                    <p><strong>Vrijednost jednog:</strong> '.$cijena.'USD </p>
                    <p><strong>U upotrebi:</strong> '.$uporaba.' </p>
					<p><strong> 1h USD:</strong> '.$hrs.' </p>
					<p><strong> 1DAY USD:</strong> '.$day.' </p>
					<p><strong> 1MTH USD:</strong> '.$mth.' </p>
				</div>
				<div style="clear:both"></div>
                <p><a href="index.php?menu=10">BACK</a></p>';
	
			}
			else {
				echo '<p>Something went wrong </p>';
                print "<h2>".$url ."</h2>";
			}
		}
	print '
	</div>';
?>