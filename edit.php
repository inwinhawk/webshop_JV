<?php
        session_start();
		if(isset($_GET['ID']))
		{
		$ID = $_GET["ID"];
		}
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
				var voornaam = document.getElementById("voornaam");
				var achternaam = document.getElementById("achternaam");
				var email = document.getElementById("email");
				var adres = document.getElementById("adres");
				var gemeente = document.getElementById("gemeente");
				var wachtwoord = document.getElementById("wachtwoord");
				var sendmessage = true;
				
				if (formulier.voornaam.value == "")
				{
					document.getElementById("voornaam").style.border='2px solid red';
					document.getElementById("alertvoornaam").style.display='inline';
					sendmessage = false;
				}
				else
				{
					document.getElementById("voornaam").style.border='1px solid grey';
					document.getElementById("alertvoornaam").style.display='none';
				}
				if (formulier.achternaam.value == "")
				{
					document.getElementById("achternaam").style.border='2px solid red';
					document.getElementById("alertachternaam").style.display='inline';
					sendmessage = false;
				}
				else
				{
					document.getElementById("achternaam").style.border='1px solid grey';
					document.getElementById("alertachternaam").style.display='none';
				}
				if (formulier.email.value == "")
				{
					document.getElementById("email").style.border='2px solid red';
					document.getElementById("alertemail").style.display='inline';
					sendmessage = false;
				}
				else 
				{
					document.getElementById("email").style.border='1px solid grey';
					document.getElementById("alertemail").style.display='none';
				}
				if(formulier.email.value != "")
				{
					var email=email.value;
					filter = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
					filter = filter.test(email);
				
					if (filter)
					{
						document.getElementById("email").style.border='1px solid grey';
						document.getElementById("alertemail").style.display='none';
					}
					else
					{
						document.getElementById("email").style.border='2px solid red';
						document.getElementById("alertmail").style.display='inline';
						sendmessage = false;
					}
				}
				
				if (formulier.adres.value == "")
				{
					document.getElementById("adres").style.border='2px solid red';
					document.getElementById("alertadres").style.display='inline';
					sendmessage = false;
				}
				else
				{
					document.getElementById("adres").style.border='1px solid grey';
					document.getElementById("alertadres").style.display='none';
				}
				
				if (formulier.gemeente.value == "")
				{
					document.getElementById("gemeente").style.border='2px solid red';
					document.getElementById("alertgemeente").style.display='inline';
					sendmessage = false;
				}
				else
				{
					document.getElementById("gemeente").style.border='1px solid grey';
					document.getElementById("alertgemeente").style.display='none';
				}
				
				if (formulier.wachtwoord.value == "")
				{
					document.getElementById("wachtwoord").style.border='2px solid red';
					document.getElementById("alertwachtwoord").style.display='inline';
					sendmessage = false;
				}
				else
				{
					document.getElementById("wachtwoord").style.border='1px solid grey';
					document.getElementById("alertwachtwoord").style.display='none';
				}
				
				return sendmessage;
			} 
			
			function terug()
			{
				document.getElementById("voornaam").style.border='1px solid grey';
				document.getElementById("alertvoornaam").style.display='none';
				document.getElementById("voornaam").value='       ';

				document.getElementById("achternaam").style.border='1px solid grey';
				document.getElementById("alertachternaam").style.display='none';
					
				document.getElementById("email").style.border='1px solid grey';
				document.getElementById("alertemail").style.display='none';

				document.getElementById("adres").style.border='1px solid grey';
				document.getElementById("alertadres").style.display='none';
				
				document.getElementById("gemeente").style.border='1px solid grey';
				document.getElementById("alertgemeente").style.display='none';
				
				document.getElementById("wachtwoord").style.border='1px solid grey';
				document.getElementById("alertwachtwoord").style.display='none';
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
<form method="post" action="<?php echo ($_SERVER["PHP_SELF"]."?ID=".$ID);?>" onsubmit="return controleer();" id="formulier">

            <p> * verplicht in te vullen !!</p><br><br>
			<?php
			include "dbconnect.php";
			echo"<p> De gebruiker_ID is ".$ID." <br/></p>";
			$query="SELECT * FROM Klant where klant_ID=".$_GET["ID"]." ";
			
			$result = mysqli_query($link,$query) or die(mysqli_error());


                // output data of each row
                    while($row = mysqli_fetch_array($result ))
                    {
						
                        $voornaam= $row['voornaam'];
						$achternaam = $row['naam'];
						$adres = $row['adres'] ;
						$gemeente=$row['gemeente'];
						$email= $row['email'];
						$admin= $row['admin'];
			
					}
			?>
			
			<p>Voornaam: <span class="verplicht">*</span><span class="alert" id="alertvoornaam">Voornaam is niet ingevuld!</span></p>
				<input type="text" value="<?php echo $voornaam; ?>" name="voornaam" id="voornaam"/> 
			
			<p>Achternaam: <span class="verplicht">*</span> <span class="alert" id="alertachternaam">Achternaam is niet ingevuld!</span></p>
				<input type="text" value="<?php echo $achternaam; ?>"  name="achternaam" id="achternaam" />
			
			<p>Adres: <span class="verplicht">*</span> <span class="alert" id="alertadres">Adres is niet ingevuld!</span></p>
				<input type="text" value="<?php echo $adres; ?>" name="adres" id="adres" />
				
			<p>Gemeente: <span class="verplicht">*</span> <span class="alert" id="alertgemeente">Gemeente is niet ingevuld!</span></p>
				<input type="text" value="<?php echo $gemeente; ?>"	 name="gemeente" id="gemeente" />
			
			<p>E-mail: <span class="verplicht">*</span> <span class="alert" id="alertemail">Geef een  geldig emailadres op!</span></p>
				<input type="text" value="<?php echo $email; ?>" name="email" id="email" />
				
				
			<p>Admin-rights:</p>
				<input type="checkbox" name="admin" value="admin"/><span> admin rights</span>
				
				<br>	
			
			<br><br>
			<div id="knoppen" >
				<input type="submit" name="aanpassen" value="aanpassen">
				<input type="reset" onclick="terug()" value="Alles leegmaken" >
				<input type="button" value="Terug" onclick="mijnaccount.php"/>
			</div>
        </form>
		
		
<?php

	if(isset($_POST["aanpassen"]))
	{
		if (!empty($_POST['voornaam']) && !empty($_POST['achternaam']) && !empty($_POST['adres']) && !empty($_POST['gemeente']) && !empty($_POST['email'])) 
		{
			// $voornaam=mysqli_real_escape_string($link,$_POST['voornaam']);
			// $achternaam=mysqli_real_escape_string($link,$_POST['achternaam']);
			// $adres=mysqli_real_escape_string($link,$_POST['adres']);
			// $gemeente=mysqli_real_escape_string($link,$_POST['gemeente']);
			// $email=mysqli_real_escape_string($link,$_POST['email']);

		if(isset ($_POST['admin']))	
		{
			$admin=1;
			
		}
		else
		{
			$admin=0;
		}
		
			$query="UPDATE Klant SET voornaam ='".$_POST['voornaam']."', naam='".$_POST['achternaam']."', adres='".$_POST['adres']."' ,gemeente='".$_POST['gemeente']."' ,email='".$_POST['email']."', admin ='".$admin."' WHERE klant_ID =".$ID." ";
			$result = mysqli_query($link, $query);
			if($result)
			{
				echo "<script type='text/javascript'>alert('User Created Successfully.!')</script>";
				

				
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

<footer>
    <div id="voeter">
        <?php include("footer.php") ?>
    </div>
</footer>
</body>
</html>

