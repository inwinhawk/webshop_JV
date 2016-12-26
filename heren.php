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
    <div>
		<ul id="soort">
			<li>
				<ul>
					
					<li><a href="heren.php">Alle producten</a></li>
					<li><a href="heren.php?soort=Jammer">jammer</a></li>
					<li><a href="heren.php?merk=merk">merk &uarr; </a></li><b>
					<li><a href="heren.php?prijs=prijs">prijs &darr; </a></li>
					<li><form action="#">
						<p>
						<input type="text" id="zoeken" name="input" placeholder ="Zoeken"/>
						</p>
					</form></li>
				</ul>
			</li>
		</ul>
	<div id="Resultaten">
		       	<?php
        //include hier connect.php == connectie met databank 
                include "dbconnect.php";
				if(isset($_GET['soort']))
				{
						//enkel producten tonen van bepaalde soort
						$query = "SELECT productnaam,productbeschrijving,afbeelding,prijs,product_ID,merk,soort,categorie FROM product WHERE (soort = '".$_GET['soort']."') AND (categorie='man')";
				}
				elseif(isset($_GET['merk']))
				{
					
						//enkel producten tonen van bepaald merk
						// $query = "SELECT productnaam,productbeschrijving,afbeelding,prijs,product_ID,merk,soort,categorie  FROM product WHERE (merk = '".$_GET['merk']."') AND (categorie='man')";
						$query = "SELECT productnaam,productbeschrijving,afbeelding,prijs,product_ID,merk,soort,categorie  FROM product WHERE categorie='man' ORDER BY merk ASC ";

				}
				
				elseif(isset($_GET['prijs']))
				{
					
						//enkel producten tonen van bepaald merk
						 $query = "SELECT productnaam,productbeschrijving,afbeelding,prijs,product_ID,merk,soort,categorie  FROM product WHERE categorie='man' ORDER BY prijs DESC ";
				}
				else
				{
                //Alle categorieën tonen (DISTINCT)
                 $query ="SELECT * FROM product where categorie='man'";
				}
                //Alle categorieën tonen (DISTINCT)
                 $result = mysqli_query($link, $query) or die(mysqli_error());


                // output data of each row
                    while($row = mysqli_fetch_array($result ))
                    {
						
                        $afbeelding= $row['afbeelding'];
						$id = $row['product_ID'];
						//$cat_id = $row['cat_id'] ;
						$productnaam=$row['productnaam'];
						$beschrijving= $row['productbeschrijving'];
						$prijs=$row['prijs'];
                        
                        echo "<div>";
                        echo "<a href=\"product.php?ID=".$id."\">$productnaam </a>";
						echo "<img src=$afbeelding alt=\"Picture not found,Please Report this to us!\" title=\"Meer info\" class = \"productimg\"><br>";				
                        
                        //naar winkelmandje
                        echo "<form>

						<p> Prijs:  € ".$row["prijs"]."";	
						if(isset($_SESSION['loggedin']))
						{
							echo" <a class=\"Inwinkelmand\" href=\"Winkelmand.php?ID={$row['product_ID']}\">&#128722;</a>";
						}
						//<a class=\"Inwinkelmand\" href=\"Winkelmand.php?ID={$row['product_ID']}\">&#128722;</a>
						echo "<form> </br><a href=\"product.php?ID=".$id."\" style= text-align:>More Info </a></t>
						
						</p>
                        </form>";

                        echo"</div>";
                    }
                 
				mysqli_close($link);

                ?>

    </div>
</div>	
	  <hr> 

    <div class="footer-distributed">
        <?php include "info.php" ?>
    </div>
</div>
<div>

<footer>
    <div id="voeter">
        <?php include("footer.php") ?>
    </div>
</footer>
</body>
</html>

