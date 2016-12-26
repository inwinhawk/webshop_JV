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
	<script type="text/javascript" src="js/jquery.js"></script>
    
		<!-- Ajax zoekfunctie -->
     
	<script type="text/javascript">
    <!--             
			$(document).ready(function()
                {
                     $("#zoeken").keyup(function()
                    {
                        
                        $zoekterm = $("#zoeken").val();
                        console.log($zoekterm);
                         
                         //hier komt de AJAX call
                         $request = $.ajax(
                             {
                             
                             method:"POST",
                             url:"zoek.php",
                             data: {zoek: $zoekterm},
                             });
			
                         $request.done(function(msg)
                                      
                                       {
                             //jquery effect, miliseconden of slow of fast
                             $("#Resultaten").fadeOut("500", function()
                                        
                                                    
                            {
                                 $("#Resultaten").html(msg);
                                 $("#Resultaten").fadeIn("slow");
                             });
                         
                         });
			
                         $request.fail(function(jqXHR, textStatus)
                                       {
                             $("#Resultaten").html("Request failed: " + textStatus);
                         });
			
                     });     
        
	
                 });
//-->
</script>
</head>
<body>

<div id="content">
    <div id="spacer">
        <?php
        //start the session
        session_start();

        //check to make sure the session variable is registered
        if(isset($_SESSION['loggedin']))
        {
            include("menu_logout.php");
        }
        else
            include("menu.php");
		

		?>
    </div>
    <hr>
	  <h2 class="inhoud">Bestel</h2></p>
         <div class="inhoud">
                <?php
       
                //sessie starten

                //Kijken of username geset is
                if (isset($_SESSION['loggedin'])) 
                {
                    //Als de username geset us, mag de user het volgende zien
                    
                    //verbinding met databank maken
                      include 'dbconnect.php';

                //Toon de klantgegevens
        
					echo("<h2 Bestel hier uw producten</h2>");
                       
                    
                     if(isset($_SESSION['kar']) && !empty($_SESSION['kar']))
					 {
                         //eerst klantid ophalen uit tabel klanten om te kunnen invoeren bij tabel bestelling
                         $query1 = "SELECT klant_ID FROM klant   WHERE  klant.voornaam =\"".$_SESSION['username']."\"";
						$result1 = mysqli_query($link, $query1) or die(mysqli_error());
                        while($row1 = mysqli_fetch_array($result1))							 //Haalt het volgende record uit set van records en deze wordt opgeslagen als een associatieve array
                          {
                              $klant_ID = $row1['klant_ID'];
							                          
                          }
                         
                         
                         //Voeg de benodigde gegevens in, in tabel bestelling
                          $query = "INSERT INTO bestelling(Klant_ID,besteldatum,Betaald) VALUES ('".$klant_ID."','".date("Y/m/d")."','1')";
                         
                         //query om bestellingID op te halen bestelling met hoogste bestelnummer is de laatste
                         $query2 = "SELECT MAX(bestelling_ID) FROM bestelling WHERE Klant_ID =\"".$klant_ID."\" ";
                         
                       
                                                  
                         if (mysqli_query($link, $query) === TRUE) 
                         {
                             echo "Deze producten zijn aan je bestelling toegevoegd:<br/>";
                             //echo "<a href=\"webshop.php\">Terug</a><br/>";
                         } 
						 else
                         {
                            echo "Error: " . $query . "<br>" . mysqli_error();
                         }
                         
                        $result2 = mysqli_query($link, $query2) or die (mysqli_error());
						while($row2 = mysqli_fetch_array($result2))							 //Haalt het volgende record uit set van records en deze wordt opgeslagen als een associatieve array                          {
						{ //opslagen in variabele om in volgende tabel te kunnen invoegen
                              $Bestelling_ID = $row2['MAX(bestelling_ID)'];
                              //test indien het juiste id gebruikt wordt
                              //echo $BestellingID;
                              echo "<br/>";
                        }
                         
                         //tabel bestellingproduct vullen
                         $aantalprod = $_SESSION['arrver'];
                                                    
                         
                         //Producten allemaal inserten altijd volgende product doorgeven met for loop
                         for($i=0;$i<$aantalprod;$i++)
                         {
                             $query3 = "INSERT INTO productbestelling(aantal,Bestelling_ID,product_ID) VALUES ('".$_SESSION['arraantal'][$i]."','".$Bestelling_ID."','".$_SESSION['arrID'][$i]."')";
                                                       
                             if (mysqli_query($link, $query3) === TRUE) 
                         {
                             echo   $_SESSION['arraantal'][$i]." keer ".$_SESSION['productbest'][$i]."<br/>";
                             
                         } else
                         {
                             echo "Error: " . $query2 . "<br>" . mysqli_error();
                         }
                             
                         }
                         echo "<br/><a href=\"index.php\">Terug naar home</a><br/>";
                         
                    }
                    else
                    {
                        echo "Er zit niets in je winkelmandje";
                    }
                    
    
                            
                    //enkel logout tonen als inloggen lukt
                      //echo  "<a href=\"../php/Logout.php\">logout</a>";
                    
                         //connectie sluiten
				mysqli_close($link);
                    
                                    
                } else {
                    //Als de gebruiker niet ingelogd is, hem eerst  vragen om in te loggen
                    echo "Alvorens dat je iets kan bestellen, moet je ingelogd zijn. Gelieve je in te loggen<br/><a href=\"mijnaccount.php\"><br/>";
                    echo  "<a href=\"mijnaccount.php\">Inloggen</a>";
                    
                }
            
        
                echo "</div>";
        
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

