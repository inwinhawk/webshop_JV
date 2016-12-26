<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>	Winkelmandje </title>

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
		require_once('Item.php');
		require_once('ShoppingCart.php');
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
     
	<?php
	if(isset($_SESSION['loggedin']))
	{
		  //include hier connect.php == connectie met databank 
		include 'dbconnect.php';

		//Alle categorieën tonen (DISTINCT)
		$query = "SELECT * FROM product WHERE product_ID =". $_GET["ID"] . "";
		$result = mysqli_query($link,$query) or die(mysqli_error());


					  
		mysqli_close($link);
                
                
 
# cart.php
    // This script uses the ShoppingCart and Item classes.
    // Create the cart:
    
	// Create some items:
       
        //$w1 = new Item('W139', 'Product 1', 23.45);
        //$w2 = new Item('W384', 'Product 2', 12.39);
        //$w3 = new Item('W55', 'Product 3', 5.00);
			
		echo "<pre>";
print_r($_SESSION); echo "</pre>";
	
	try {
        
        $cart = new ShoppingCart();
               
        //Hier gaan we de het karretje opvullen met de opgeslagen gegevens van winkelmandje
        
        if(isset($_SESSION['kar']) && !empty($_SESSION['kar']))
        {
              $cart = $_SESSION['kar'];
        }
               
        $aantal = count($cart)+1;
		echo $aantal;
        //via databank
         // output data of each row
       while($row = $result->fetch_assoc())
        {
            
            //Kijken hoeveel items er in winkelmandje zitten
                       
            
            $prod = new Item($row['product_ID'], $row['productnaam'], $row['prijs'], $row['merk']);
			echo "<pre>";print_r($prod);echo("</pre>");
            $cart->addItem($prod);
			echo "<pre>";print_r($cart);echo("</pre>");
           
            //wordt opslagen zodat we het op de bestelpagina kunnen gebruiken(productbestelling vullen)
		}
		
        //zodat gegevens uit winkelmandje niet vergeten worden
        $_SESSION['kar'] = $cart;
         echo "<pre>";print_r($_SESSION);echo("</pre>");     
        
        // Update some quantities:
        //$cart->updateItem($w2, 4);
        //$cart->updateItem($w1, 1);
        
        // Delete an item:
       // $cart->deleteItem($w3);
        
        // Toon inhoud van mandje
        echo "<h2>Uw winkelmandje</h2>"; 
        
        //kjiken of winkelmandje niet leeg is
        if (!$cart->isEmpty())
        {
            $totaalbedrag=0;
            $teller =0; 			//vullen van een array 

            foreach ($cart as $array)
            {
                // Get the item object:
                $item = $array['item'];
                
              
                     // Print the item:
                printf('<table><td>%s</td> <td>%s</td><td>Aantal: %d</td><td> Totaalprijs: &#8364; %0.2f </td></table>',$item->getMerk(), $item->getNaam(), $array['qty'],(($array['qty'])*($item->getPrijs())));
                
                //totaalbedrag berekenen
                $totaalbedrag = $totaalbedrag+(($array['qty'])*($item->getPrijs()));
                //arrays vullen voor in bestel pagina --> prducten doorgeven
                $IDarray[$teller] = $item->getID();
                $Aantalarray[$teller]=$array['qty'];
                
                //om te kunnen weergeven welke producten besteld zijn
                $productbest[$teller] = $item->getNaam();
                
                                           
               $teller++;			 //teller +1
            } 
            
               //producten doorgeven
            $_SESSION['arrID'] = $IDarray;
            //aantal prod per soort
            $_SESSION['arraantal'] = $Aantalarray;
            //aantal verschillende producten
            $_SESSION['arrver'] = count($cart);
            //bestelde producten doorgeven
            $_SESSION['productbest'] = $productbest; 
           
            
            echo "<br/>Totaalbedrag: &#8364;".$totaalbedrag;
            //Bestel knop 
            echo" <br/><a href=\"Bestel.php\">Bestel</a> ";   
            
         
            
        }
        else
        {
            echo"<br/>Er zit voorlopig niets in je winkelmandje<br/>";
        }
    
        } catch (Exception $e)
    {
// Handle the exception.
    }
                
            
        //Link naar webshop
       echo" <br/><a href=\"index.php\">Terug winkelen</a>";
                
	}
	else
	{
		echo "Alvorens dat je het winkelmandje kan bekijken moet ingelogd zijn. Gelieve je dus in te loggen<br/><br/><a href=\"mijnaccount.php\"><br/>";
		echo  "<a href=\"mijnaccount.php\">Inloggen</a>";	
	}
	
	?>
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


