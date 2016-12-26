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
    <div id="inhoud">
    <?php
		session_start();
		require("dbconnect.php");

		//add product to session or create new one
		if(isset($_POST["type"]) && $_POST["type"]=='add' && $_POST["product_qty"]>0)
		{
			foreach($_POST as $key => $value){ //add all post vars to new_product array
				$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
			}
			//remove unecessary vars
			unset($new_product['type']);
			unset($new_product['return_url']); 
			
			//we need to get product name and price from database.
			$statement = $mysqli->prepare("SELECT product_name, price FROM products WHERE product_code=? LIMIT 1");
			$statement->bind_param('s', $new_product['product_code']);
			$statement->execute();
			$statement->bind_result($product_name, $price);
			
			while($statement->fetch()){
				
				//fetch product name, price from db and add to new_product array
				$new_product["product_name"] = $product_name; 
				$new_product["product_price"] = $price;
				
				if(isset($_SESSION["cart_products"])){  //if session var already exist
					if(isset($_SESSION["cart_products"][$new_product['product_code']])) //check item exist in products array
					{
						unset($_SESSION["cart_products"][$new_product['product_code']]); //unset old array item
					}           
				}
				$_SESSION["cart_products"][$new_product['product_code']] = $new_product; //update or create product session with new item  
			} 
		}


		//update or remove items 
		if(isset($_POST["product_qty"]) || isset($_POST["remove_code"]))
		{
			//update item quantity in product session
			if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){
				foreach($_POST["product_qty"] as $key => $value){
					if(is_numeric($value)){
						$_SESSION["cart_products"][$key]["product_qty"] = $value;
					}
				}
			}
			//remove an item from product session
			if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
				foreach($_POST["remove_code"] as $key){
					unset($_SESSION["cart_products"][$key]);
				}	
			}
		}

		//back to return url
		$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
		header('Location:'.$return_url);
		
		mysqli_close($link1);
		session_destroy();
	?>

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

