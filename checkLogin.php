<!doctype html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>	Webshop van Jeroen Vastmans </title>

	<link href="css/reset.css" rel="stylesheet"/>
	<link href="css/algemeen.css" rel="stylesheet"/>
	<link href="css/project.css" rel="stylesheet"/>
	<link href="css/menu.css" rel="stylesheet"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">


</head>
<body>
<div id="content">
	<div id="spacer">
		<?php include("menu_logout.php") ?>
	</div>
	<hr>
	<div id="inhoud">
			<?php
			//start the session
			session_start();
			//check to make sure the session variable is registered
			if(isset($_SESSION['loggedin']))
			{
				//echo<pre>;
				//print_r($_SESSION);//session variable is registered, user is allowed to see anything that follows
			
			
				include "dbconnect.php";
			
				echo "Welcome ".$_SESSION['username']." , you are succesfully logged in.<br/>
						You are logged in as a normal user";
			
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
							 
                        echo "<br/><br/>"; 
												
                } 
				else 
				{
                    echo "Helaas, in onze systeem hebben we geen gegevens van u. ";
                }	

				echo "U bestelling(en):<br/>";
        
                //Toon de laatste bestelling
                 $query2 = "SELECT merk,productnaam,prijs,productbestelling.aantal, bestelling.bestelling_ID, bestelling.besteldatum FROM product 
                INNER JOIN productbestelling
                ON productbestelling.product_ID = product.product_ID
                INNER JOIN bestelling
                ON bestelling.bestelling_ID = productbestelling.bestelling_ID
                INNER JOIN klant
                ON klant.klant_ID = bestelling.klant_ID
                WHERE klant.voornaam =\"".$_SESSION['username']."\"";
				$result2 = mysqli_query($link, $query2) or die(mysqli_error());


                if (mysqli_num_rows($result2) > 0)
                {
                    // output data of each row
                     while($row = mysqli_fetch_array($result2)) //Haalt steeds volgende record uit set van records en slaat op als associatieve array

                    {
                        echo "<br/>Bestelling ".$row['bestelling_ID']." op ".$row['besteldatum'].":<br/>";
                        echo "<br/>" .$row['merk']." ".$row["productnaam"]."<br/>aantal: ".$row['aantal']."<br/> Prijs: ".$row['prijs']."<br/>Totale Prijs: &#8364; ".(($row['prijs'])*($row['aantal']))."<br/>";

                        echo "<br/><br/>";
                    }
                } else 
				{
                    echo "<br/>U heeft nog niets bij de zwemshop besteld<br/>";
                }
                    
                   
			
				
			}
			else
			{
				//session variable isn't registered, send back to login page
				echo "Geen overeenkomst<br/>Probeer opnieuw in te loggen<br/>";
				header( "Location: mijnaccount.php" );
			}
			mysqli_close($link);
			?>
			</div>
			</div>
	<hr>
	
	<div class="footer-distributed">
		<?php include("info.php") ?>
	</div>
</div>
<footer>
	<div id="voeter">
		<?php include("footer.php") ?>
	</div>
</footer>
</body>
</html>

