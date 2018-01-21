<!doctype html>

<?php
        session_start();
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>	Admin page </title>

    <link href="css/reset.css" rel="stylesheet"/>
    <link href="css/algemeen.css" rel="stylesheet"/>
    <link href="css/project.css" rel="stylesheet"/>
    <link href="css/menu.css" rel="stylesheet"/>
	<link href="css/contact.css" rel="stylesheet"/>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"/> 

		  <script type="text/javascript">
		<!--	
			
			function controleer()
			{
				var productnaam = document.getElementById("productnaam");
				var productbeschrijving = document.getElementById("productbeschrijving");
				var soort = document.getElementById("soort");
				var merk = document.getElementById("merk");
				var categorie = document.getElementById("categorie");
				var prijs = document.getElementById("prijs");
				var sendmessage = true;
				
				if (formulier.productnaam.value == "")
				{
					document.getElementById("productnaam").style.border='2px solid red';
					document.getElementById("alertproductnaam").style.display='inline';
					sendmessage = false;
				}
				else
				{
					document.getElementById("productnaam").style.border='1px solid grey';
					document.getElementById("alertproductnaam").style.display='none';
				}
				
				if (formulier.productbeschrijving.value == "")
				{
					document.getElementById("productbeschrijving").style.border='2px solid red';
					document.getElementById("alertproductbeschrijving").style.display='inline';
					sendmessage = false;
				}
				else
				{
					document.getElementById("productbeschrijving").style.border='1px solid grey';
					document.getElementById("alertproductbeschrijving").style.display='none';
				}
				
				if (formulier.soort.value == "")
				{
					document.getElementById("soort").style.border='2px solid red';
					document.getElementById("alertsoort").style.display='inline';
					sendmessage = false;
				}
				else
				{
					document.getElementById("soort").style.border='1px solid grey';
					document.getElementById("alertsoort").style.display='none';
				}
				
				if (formulier.merk.value == "")
				{
					document.getElementById("merk").style.border='2px solid red';
					document.getElementById("alertmerk").style.display='inline';
					sendmessage = false;
				}
				else
				{
					document.getElementById("merk").style.border='1px solid grey';
					document.getElementById("alertmerk").style.display='none';
				}
				
				if (formulier.categorie.value == "")
				{
					document.getElementById("categorie").style.border='2px solid red';
					document.getElementById("alertcategorie").style.display='inline';
					sendmessage = false;
				}
				else
				{
					document.getElementById("categorie").style.border='1px solid grey';
					document.getElementById("alertcategorie").style.display='none';
				}
				
				if (formulier.prijs.value == "")
				{
					document.getElementById("prijs").style.border='2px solid red';
					document.getElementById("alertprijs").style.display='inline';
					sendmessage = false;
				}
				else
				{
					document.getElementById("prijs").style.border='1px solid grey';
					document.getElementById("alertprijs").style.display='none';
				}
				
				return sendmessage;
			} 
			
			function terug()
			{
				document.getElementById("productnaam").style.border='1px solid grey';
				document.getElementById("alertproductnaam").style.display='none';

				document.getElementById("productbeschrijving").style.border='1px solid grey';
				document.getElementById("alertproductbeschrijving").style.display='none';
					
				document.getElementById("soort").style.border='1px solid grey';
				document.getElementById("alertsoort").style.display='none';

				document.getElementById("merk").style.border='1px solid grey';
				document.getElementById("alertmerk").style.display='none';
				
				document.getElementById("categorie").style.border='1px solid grey';
				document.getElementById("alertcategorie").style.display='none';
				
				document.getElementById("prijs").style.border='1px solid grey';
				document.getElementById("alertprijs").style.display='none';
			} 
			
		-->	
		</script>
	</head>
<body>

    <div id="content">
        <div id="spacer">
        <?php
        //start the session

        //check to make sure the session variable is registered
        if (isset($_SESSION['loggedin']))
        {
            include "menu_logout.php";
        }
        else
            include "menu.php";

        ?>
        </div>
        <hr/>
        <div id="inhoud">
            <?php
			
			include 'dbconnect.php';
			
			if ((isset($_SESSION['username']))&&($_SESSION['admin']))
			{
			
			echo "Welcome ".$_SESSION['username']." , you are succesfully logged in.";
			echo "<br/><br/><p> Je bent ingelogd als administrator.<br/>Je bevind je de pagina waar je de gegevens in de databank kan aanpassen.</p>";
			
			 echo("<div class=\"links\">
					<h2 >Hieronder vind u de gegevens die in onze databank van u staat. </h2>
                    
                ");
				
				
                $query = "SELECT voornaam, naam,adres,adres, gemeente, email FROM Klant WHERE voornaam = \"".$_SESSION['username']."\"";
                $result = mysqli_query($link,$query) or die("FOUT: er is een fout opgetreden bij het uitvoeren van de query");
				
                if (mysqli_num_rows($result) > 0)
                {
                    // output data of each row
                    ($row = mysqli_fetch_assoc($result)); //Haalt steeds volgende record uit set van records en slaat op als associatieve array

                    // geen while omdat het maar 1 keer getoond moet worden
                        echo "<div class=\"gegevens\"><br/>
							 Naam: ".$row["voornaam"]. "<br/>
							 <span>Achternaam</span>: " . $row["naam"]."<br/>
							 <span>Adres</span>: ". $row["adres"]."<br/>
							 <span>Gemeente</span>: ". $row["gemeente"]."<br/>
							 <span >email</span>: ". $row["email"]."<br/>
							 </div>";
							 
                        echo "<br/>";
                    
                } else 
				{
                    echo "Geen resultaten";
                }
				
				echo "In de onderstaande lijst vindt je enkele functie ivm de databanken:<br/>";
                    
                    echo "<br/>";
					echo"<ul>
								<li><a href=\"admin.php?f=1\">Alle gebruikers tonen</a></li>
                                <li><a href=\"admin.php?f=2\">Toon alle producten</a></li>
                                <li><a href=\"admin.php?f=3\">Toon alle  fabrikanten's</a></li>
                                <li><a href=\"admin.php?f=4\">Toon alle bestellingen</a></li>
                                <li><a href=\"admin.php?f=5\">Voeg een product toe</a></li>
						</ul>";
					
					if(isset($_GET['f']))
                    {
                        //als het 1 is, alle gebruikers tonen
                        if(($_GET['f'])==1)
                        {
                            $query = "SELECT * FROM klant ";
							$result = mysqli_query($link,$query) or die("FOUT: er is een fout opgetreden bij het uitvoeren van de query");

							if (mysqli_num_rows($result) > 0)
							{
								echo("<table><tr><th>ID</th> <th>Voornaam</th> <th>Achternaam</th> <th>Email</th><th>Adres</th><th>Gemeente</th><th>Admin</th></tr>");
								// output data of each row
								while($row = mysqli_fetch_assoc($result)) // de volgende record uit de reeks, wordt opgeslagen als een associatieve array

								{
									
								   echo "<tr><td>" .$row['klant_ID']."</td><td>".$row["voornaam"]."</td><td>".$row['naam']."</td><td>".$row['email']."</td><td>" .$row['adres']."</td><td>" .$row['gemeente']."</td><td>" .$row['admin']."</td> <td><a href=\"registreer.php\">add</a></td>   <td><a href=\"edit.php?ID={$row['klant_ID']}\">edit</a></td> <td><a href=\"delete.php?ID={$row['klant_ID']}\">delete</a></td><tr/>";

								   
								}
								echo "</table>";
							} else 
							{
							echo "Nog geen gebruikers geregistreerdt<br/>";
							}
						}
                    
                    //als het 2 is, alle producten tonen
                         if(($_GET['f'])== 2)
                        {
                            $query = "SELECT * FROM product ";
							$result = mysqli_query($link,$query) or die("FOUT: er is een fout opgetreden bij het uitvoeren van de query");

							if (mysqli_num_rows($result) > 0)
							{
								echo("<table><tr><th>ID</th><th>Naam</th><th>Prijs</th><th>Merk</th><th>Omschrijving</th><th>Afbeelding</th></tr>");
								// output data of each row
								while($row = mysqli_fetch_assoc($result)) //de volgende record uit de reeks, wordt opgeslagen als een associatieve array

								{
									
									
									 echo "<tr> 
											<td>" .$row['product_ID']."</td> 
											<td>".$row["productnaam"]."</td> 
											<td>" .$row['productbeschrijving']."</td> 
											<td>".$row['merk']."</td> 
											<td>".$row['prijs']."</td> 
											<td><img src=\"".$row['afbeelding']."\"\"></td>
											<td><a href=\"edit_product.php?PID={$row['product_ID']}\">edit</a></td>
											<td><a href=\"delete.php?PID={$row['product_ID']}\">delete</a></td>
										 <tr/>";
								}
								echo "</table>";
							} 
							else 
							{
								echo "Er zijn geen gebruikers geregistreerd !<br/>";
							}
                            
                        }
                        
                        
                        //als het 3 is, worden alle merken getoond
                         if(($_GET['f'])==3)
                        {
                            $query = "SELECT DISTINCT(merk) FROM product";
							$result = mysqli_query($link,$query) or die("FOUT: er is een fout opgetreden bij het uitvoeren van de query");

							if (mysqli_num_rows($result) > 0)
							{
								echo("<table><tr><th>Merken</th></tr>");
								// output data of each row
								while($row = mysqli_fetch_assoc($result)) //De volgende record uit de reeks, wordt opgeslagen als een associatieve array
								{
								 echo "<tr><td>" .$row['merk']."</td><tr/>";
								}
								echo "</table>";
							} 
							else 
							{
								echo "Nog geen gebruikers geregistreerdt<br/>";
							}
                        }
                        
                        
                        
						//als het 4 is, alle bestellingen tonen
                         if(($_GET['f'])==4)
                        {
                              $query4 = "SELECT klant.voornaam,klant.naam,bestelling.bestelling_ID, bestelling.besteldatum, product.product_ID, product.merk, product.productnaam, product.prijs,bestelling.Betaald
										
										FROM bestelling INNER JOIN productbestelling
										ON bestelling.bestelling_ID = productbestelling.bestelling_ID
										INNER JOIN klant
										ON klant.klant_ID = bestelling.Klant_ID
										INNER JOIN product 
										ON product.product_ID = productbestelling.product_ID
										ORDER BY klant.voornaam";
										
                $result = mysqli_query($link,$query4) or die("FOUT: er is een fout opgetreden bij het uitvoeren van de query");

                if (mysqli_num_rows($result)>0)
                {
                      echo("<br/><br/><table><tr><th>Voornaam</th><th>Achternaam</th><th>BestellingID</th><th>Besteldatum</th><th>ProductID</th><th>merk</th><th>Productnaam</th><th>Betaald</th></tr>");
                    //output data of each row
                    while($row = mysqli_fetch_assoc($result)) //De volgende record uit de reeks, wordt opgeslagen als een associatieve array
                    {
                        
                         echo "<tr><td>" .$row['voornaam']."</td><td>".$row["naam"]."</td><td>".$row['bestelling_ID']."</td><td>".$row['besteldatum']."</td><td>" .$row['product_ID']."</td><td>" .$row['merk']."</td><td>" .$row['productnaam']."</td><td>" .$row['Betaald']."</td><tr/>";
                       
                    }
                    echo "</table>";
                } else {
                    echo "Nog geen gebruikers geregistreerd<br/>";
                }
                            
                      }
                        
                //als het 5 is, product toevoegen
                         if(($_GET['f'])==5)
                        {
			?>
                            
							<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>"	 onsubmit="return controleer();" id="formulier">
							<br/><br>
							<p> * verplicht in te vullen !!</p><br>
							
							<p>productnaam: <span class="verplicht">*</span><span class="alert" id="alertproductnaam">productnaam is niet ingevuld!</span></p>
								<input type="text" name="productnaam" id="productnaam"/>

							<p>productbeschrijving: <span class="verplicht">*</span> <span class="alert" id="alertproductbeschrijving">productbeschrijving is niet ingevuld!</span></p>
								<input type="text" name="productbeschrijving" id="productbeschrijving" />
							
							<p>merk: <span class="verplicht">*</span> <span class="alert" id="alertmerk">merk is niet ingevuld!</span></p>
								<input type="text" name="merk" id="merk" />
								
							<p>soort: <span class="verplicht">*</span>  (bikini,short,slip,badpak,zwembroek)<span class="alert" id="alertsoort">soort is niet ingevuld!</span></p>
								<input type="text" name="soort" id="soort" />
							
							<p>categorie: <span class="verplicht">*</span> (vrouw, man, meisje, jongen)<span class="alert" id="alertcategorie">categorie is niet ingevuld!!</span></p>
								<input type="text" name="categorie" id="categorie" />
							
							<p>prijs: <span class="verplicht">*</span> <span class="alert" id="alertprijs">prijs is niet ingevuld!</span></p>
								<input type="text" name="prijs" id="prijs" />
							
							<br><br><br>
							<div id="knoppen" >
								<input type="submit" name="create" value="create">
								<input type="reset" onclick="terug()" value="Alles leegmaken" >
							</div>
							<br>
							</form>
		
							<?php

							
								

						}
					}
								// zien wat er in $_POST zit print_r($_POST);
								if(isset($_POST["create"]))
								{
									if (!empty($_POST['productnaam']) && !empty($_POST['productbeschrijving']) && !empty($_POST['merk']) && !empty($_POST['soort']) && !empty($_POST['categorie']) && !empty($_POST['prijs'])) 
									{
										$_POST['afbeelding']= "images/producten/test.jpg";
										// Test voor duplicaten op basis van de voornaam
										$query = mysqli_query($link,"select * from product where productnaam='".$_POST['productnaam']."' ");
										 $a = mysqli_num_rows($query);
										 if ($a >= 1) 
										 {
											 echo "product is already in use !";
										 }
										 else
										 {
											
											$query = "INSERT INTO Product (productnaam, productbeschrijving, merk, soort, categorie, prijs,afbeelding) VALUES ('". $_POST['productnaam'] . "', '". $_POST['productbeschrijving'] . "', '". $_POST['merk'] . "', '". $_POST['soort'] . "', '". $_POST['categorie'] . "','".$_POST['prijs'] . "', '". $_POST['afbeelding'] . "')";
											$result = mysqli_query($link, $query);
											if($result)
											{
												echo "<script type='text/javascript'>alert('Product has been successfully created.!')</script>";
												
											}
											else
											{
												echo ("<script type='text/javascript'>alert('Product ceation failed.')</script>");

											}
										 }
									
									}
									else 
									{
										//Indien geen juiste gegevens gegevens, wordt er een melding gegeven
										echo "het product is niet aangemaakt kunnen worden<br/>Probeer opnieuw aub.<br/>";
										
									}
								}

								echo "</div>";
							
									//connectie sluiten
									mysqli_close($link);
									
									
								
						
								
					
			}
			
		else
		{
			echo"U hebt geen admin rechten voor de pagina.";
			
		}

							 ?>	
        </div>
		<hr>
        
        <div class="footer-distributed">
            <?php include "info.php"; ?>
        </div>
    </div>
    
    <footer>
        <div id="voeter">
            <?php include "footer.php"; ?>
		</div>
    </footer>
    </body>
</html>