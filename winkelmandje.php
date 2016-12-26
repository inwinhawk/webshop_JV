<?php

include("dbconnect.php");
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>	Winkelmandje </title>

        <link href="css/reset.css" rel="stylesheet"/>
        <link href="css/algemeen.css" rel="stylesheet"/>
        <link href="css/project.css" rel="stylesheet"/>
		<link href="css/cart.css" rel="stylesheet" />
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
            include "menu_logout.php";
        }
        else
            include "menu.php";
		session_destroy();

        ?>
        </div>
        <hr>
        <div class="cart">

		<?php
		session_start();
		?>

		<h1 align="center">View Cart</h1>
		<div class="cart-view-table-back">
		<form method="post" action="cart_update.php">
		<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Quantity</th><th>Name</th><th>Price</th><th>Total</th><th>Remove</th></tr></thead>
		  <tbody>
			<?php
			
				$total = 0; //set initial total value
				$subtotal = 0; //set initial total value
				$b = 0; //var for zebra stripe table 
				$totaal=0;
				
			if(isset($_SESSION["cart_products"])) //check session var
			{
				
				foreach ($_SESSION["cart_products"] as $cart_itm)
				{
					//set variables to use in content below
					$product_name = $cart_itm["product_name"];
					$product_qty = $cart_itm["product_qty"];
					$product_price = $cart_itm["product_price"];
					$product_code = $cart_itm["product_code"];
					$product_color = $cart_itm["product_color"];
					$subtotal = ($product_price * $product_qty); //calculate Price x Qty
					
					$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
					echo '<tr class="'.$bg_color.'">';
					echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
					echo '<td>'.$product_name.'</td>';
					echo '<td>'.$currency.$product_price.'</td>';
					echo '<td>'.$currency.$subtotal.'</td>';
					echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
					echo '</tr>';
					$totaal = ($total + $subtotal); //add subtotal to total var
				}
				
				
			}
			?>
			<tr><td colspan="5"><span style="float:right;text-align: right;"> Amount Payable : <?php echo sprintf("%01.2f", $totaal);?></span></td></tr>
			<tr><td colspan="5"><a href="dames.php" class="button">Add More Items</a><button type="submit">Update</button></td></tr>
		  </tbody>
		</table>
		<input type="hidden" name="return_url" value="<?php 
		$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		echo $current_url; ?>" />
		</form>
		</div>


		
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

	</br>
    </body>
</html>