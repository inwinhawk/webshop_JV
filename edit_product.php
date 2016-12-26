<?php
        session_start();
		
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>	edit page </title>

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
				var filter;
				var voornaam = document.getElementById("productnaam");
				var merk = document.getElementById("merk");
				var prijs = document.getElementById("prijs");
				var soort = document.getElementById("soort");
				var categorie = document.getElementById("categorie");
				var productbeschrijving = document.getElementById("productbeschrijving");
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
				
						
				return sendmessage;
			} 
			
			function terug()
			{
				document.getElementById("productnaam").style.border='1px solid grey';
				document.getElementById("alertproductnaam").style.display='none';
				document.getElementById("productnaam").value='       ';

				document.getElementById("merk").style.border='1px solid grey';
				document.getElementById("alertmerk").style.display='none';
					
				document.getElementById("prijs").style.border='1px solid grey';
				document.getElementById("alertprijs").style.display='none';

				document.getElementById("soort").style.border='1px solid grey';
				document.getElementById("alertsoort").style.display='none';
				
				document.getElementById("categorie").style.border='1px solid grey';
				document.getElementById("alertcategorie").style.display='none';
				
				document.getElementById("productbeschrijving").style.border='1px solid grey';
				document.getElementById("alertproductbeschrijving").style.display='none';
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
        if(isset($_SESSION['loggedin']))
        {
            include("menu_logout.php");
        }
        else
            include("menu.php");
		?>
    </div>
    <hr>

<div id="inhoud">
	
<h1>gegevens aanpassen</h1>
<hr>
<form method="post" action="<?php echo ($_SERVER["PHP_SELF"]."?PID=".$PID);?>" onsubmit="return controleer();" id="formulier">
<?php
if(isset($_GET['PID']))
{
		$PID = $_GET["PID"];
		
            echo "<p> * verplicht in te vullen !!</p><br>";
			
			include "dbconnect.php";
			echo"<p> De product_ID is ".$PID." </p>";
			$query="SELECT * FROM product where product_ID=".$_GET["PID"]." ";
			echo ("$query");
			$result = mysqli_query($link,$query) or die(mysqli_error());


                // output data of each row
                    while($row = mysqli_fetch_array($result ))
                    {
						
                        $productnaam= $row['productnaam'];
						$merk = $row['merk'];
						$soort = $row['soort'] ;
						$categorie=$row['categorie'];
						$prijs= $row['prijs'];
						$productbeschrijving= $row['productbeschrijving'];
			
					}
			?>
			
			<p>productnaam: <span class="verplicht">*</span><span class="alert" id="alertproductnaam">productnaam is niet ingevuld!</span></p>
				<input type="text" value="<?php echo $productnaam; ?>" name="productnaam" id="productnaam"/> 
			
			<p>merk: <span class="verplicht">*</span> <span class="alert" id="alertmerk">Merk is niet ingevuld!</span></p>
				<input type="text" value="<?php echo $merk; ?>"  name="merk" id="merk" />
			
			<p>soort: <span class="verplicht">*</span> <span class="alert" id="alertsoort">Soort is niet ingevuld!</span></p>
				<!--<input type="text" value="<?php echo $soort; ?>" name="soort" id="soort" /> -->
				
			<input type="radio" name="soort" <?php if (isset($soort) && $soort=="badpak") echo "checked";?> value="badpak">badpak</br>
			<input type="radio" name="soort" <?php if (isset($soort) && $soort=="bikini") echo "checked";?> value="bikini">bikini</br>
			<input type="radio" name="soort" <?php if (isset($soort) && $soort=="jammer") echo "checked";?> value="jammer">jammer</br>
			<input type="radio" name="soort" <?php if (isset($soort) && $soort=="zwembroek") echo "checked";?> value="zwembroek">zwembroek</br>
			<input type="radio" name="soort" <?php if (isset($soort) && $soort=="short") echo "checked";?> value="short">short</br>
			<input type="radio" name="soort" <?php if (isset($soort) && $soort=="slip") echo "checked";?> value="slip">slip</br></br>
				
				
			<p>categorie: <span class="verplicht">*</span> <span class="alert" id="alertcategorie">categorie is niet ingevuld!</span></p></br>				
				
			<input type="radio" name="categorie" <?php if (isset($categorie) && $categorie=="vrouw") echo "checked";?> value="vrouw">vrouw</br>
			<input type="radio" name="categorie" <?php if (isset($categorie) && $categorie=="man") echo "checked";?> value="man">man</br>
			<input type="radio" name="categorie" <?php if (isset($categorie) && $categorie=="jongen") echo "checked";?> value="jongen">jongen</br>
			<input type="radio" name="categorie" <?php if (isset($categorie) && $categorie=="meisje") echo "checked";?> value="meisje">meisje</br></br>

			
			<p>prijs: <span class="verplicht">*</span> <span class="alert" id="alertprijs">Geef een prijs op!</span></p>
				<input type="text" value="<?php echo $prijs; ?>" name="prijs" id="prijs" />
				
			<p>productbeschrijving:</p>
				<textarea name="productbeschrijving" rows="10" cols="80"> <?php echo $productbeschrijving; ?> </textarea>
				
				<br>	
			
			<br><br>
			<div id="knoppen" >
				<input type="submit" name="aanpassen" value="aanpassen">
				<input type="reset" onclick="terug()" value="Alles leegmaken" >
				<a href="admin.php">
				<input type="button" value="Terug "/>
				</a>
			</div>
			</form>
<?php			
}
else
{
	echo "Alvorens dat je deamin pagin's  te kunnen bekijken moet je ingelogd zijn. Gelieve je dus in te loggen<br/><br/><a href=\"mijnaccount.php\"><br/>";
		echo  "<a href=\"mijnaccount.php\">Inloggen</a>";
}
?>		
		
<?php

	if(isset($_POST["aanpassen"]))
	{
		if (!empty($_POST['productnaam']) && !empty($_POST['merk']) && !empty($_POST['soort']) && !empty($_POST['categorie']) && !empty($_POST['prijs']) && !empty($_POST['productbeschrijving'])) 
		{
			// $voornaam=mysqli_real_escape_string($link,$_POST['voornaam']);
			// $achternaam=mysqli_real_escape_string($link,$_POST['achternaam']);
			// $soort=mysqli_real_escape_string($link,$_POST['soort']);
			// $categorie=mysqli_real_escape_string($link,$_POST['categorie']);
			// $prijs=mysqli_real_escape_string($link,$_POST['prijs']);

		
		
			$query="UPDATE Klant SET productnaam ='".$_POST['productnaam']."', naam='".$_POST['merk']."', soort='".$_POST['soort']."' ,categorie='".$_POST['categorie']."' ,prijs='".$_POST['prijs']."', productbeschrijving ='".$productbeschrijving."' WHERE product_ID =".$PID." ";
			$result = mysqli_query($link, $query);
			if($result)
			{
				echo "<script type='text/javascript'>alert('User Created Successfully.!')</script>";
				header("Location: admin.php");

				
			}
			else
			{
				echo ("<script type='text/javascript'>alert('User Registration Failed')</script>");
			}
		}
		
	}
	mysqli_close($link);
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

