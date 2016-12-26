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
			?>
			
			
			<?php	
				include "dbconnect.php";
			
				echo "Welcome ".$_SESSION['username']." , you are succesfully logged in.";
			
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
                        echo "<div class=\gegevens\"><br/>
							 Naam: ".$row["voornaam"]. "<br/>
							 <span>Achternaam</span>: " . $row["naam"]."<br/>
							 <span>Adres</span>: ". $row["adres"]."<br/>
							 <span>Gemeente</span>: ". $row["gemeente"]."<br/>
							 <span >email</span>: ". $row["email"]."<br/>
							 </div>";
							 
                        echo "<br/>";
                    
                } 
				else 
				{
                    echo "Geen resultaten";
                }
			}
			else
			{
				//session variable isn't registered, send back to login page
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
</div>
<footer>
	<div id="voeter">
		<?php include("footer.php") ?>
	</div>
</footer>
</body>
</html>

