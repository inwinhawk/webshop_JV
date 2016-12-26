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
        <?php
        //start the session
        session_start();

        //check to make sure the session variable is registered
        if(isset($_SESSION['username']))
        {
            include("menu_logout.php");
        }
        else
            include("menu.php");

        ?>
    </div>
    <hr>
	<div id="product">
		<?php

		
		include "dbconnect.php";


			$query="SELECT * FROM product WHERE product_ID=".$_GET["ID"]."";
			$result = mysqli_query($link,$query) or die("FOUT: er is een fout opgetreden bij het uitvoeren van de query");



	// loop through results of database query
		while($row = mysqli_fetch_array( $result ))
        {

			echo "<div>";
			echo "<img src=\"".$row["afbeelding"]."\"alt=\"Productafbeelding\" title=\"".$row["productnaam"]."\" class = \"productimg\"><br/>";
			echo "<p>".$row["merk"]."<br/>";
			echo "".$row["productnaam"]."<br/>";
				
				
				
											//als je aparte knop wilt en niet op de afbeelding wilt klikken
				
			   // echo "<img src=\"".$row["ProductAfbeelding"]."\""."<br>";
				//<input type=\"submit\" value=\"Submit\">
				
				
				//afbeelding tonen en verwijzen naar productinfo met doorgegeven ID
			   
				
				 
				echo "<p class = \"links\">".$row["productbeschrijving"]."<p/>";
			   echo "<p class = \"prijs\">Prijs: &#8364; " . $row["prijs"]."<br/>";
				//ID doorgeven naar winkelmandje
				if(isset($_SESSION['loggedin']))
						{
							echo" </br><a class=\"Inwinkelmand\" href=\"Winkelmand.php?ID={$row['product_ID']}\">&#128722;</a>";
						}
								   
			  


			echo"</div>";
        }
                 
		mysqli_close($link);
         ?>
	</div>
<hr>
    <div class="footer-distributed">
        <?php include "info.php" ?>
    </div>
	
</div>

<footer>
    <div id="voeter">
        <?php include("footer.php") ?>
    </div>
</footer>
</body>
</html>