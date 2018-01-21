<?php
        session_start();
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>	Webshop van Jeroen Vastmans </title>

    <link href="css/reset.css" rel="stylesheet"/>
    <link href="css/algemeen.css" rel="stylesheet"/>
    <link href="css/project.css" rel="stylesheet"/>
    <link href="css/menu.css" rel="stylesheet"/>
	<link href="css/contact.css" rel="stylesheet"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"> 

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
					///^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
					// /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
					filter = filter.test(email);
				
					if (filter)
					{
						document.getElementById("email").style.border='1px solid grey';
						document.getElementById("alertemail").style.display='none';
					}
					else
					{
						document.getElementById("email").style.border='2px solid red';
						document.getElementById("alertemail").style.display='inline';
						sendmessage = false;
					}
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
	
<h1>Registratie</h1>
<hr>


<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>"	 onsubmit="return controleer();" id="formulier">

            <p> * verplicht in te vullen !!</p><br><br>
			
			<p>Voornaam: <span class="verplicht">*</span><span class="alert" id="alertvoornaam">Voornaam is niet ingevuld!</span></p>
				<input type="text" name="voornaam" id="voornaam"/>

			<p>Achternaam: <span class="verplicht">*</span> <span class="alert" id="alertachternaam">Achternaam is niet ingevuld!</span></p>
				<input type="text" name="achternaam" id="achternaam" />
			
			<p>Adres: <span class="verplicht">*</span> <span class="alert" id="alertadres">Adres is niet ingevuld!</span></p>
				<input type="text" name="adres" id="adres" />
				
			<p>Gemeente: <span class="verplicht">*</span> <span class="alert" id="alertgemeente">Gemeente is niet ingevuld!</span></p>
				<input type="text" name="gemeente" id="gemeente" />
			
			<p>E-mail: <span class="verplicht">*</span> <span class="alert" id="alertemail">Geef een geldig emailadres op!</span></p>
				<input type="text" name="email" id="email" />
			
			<p>Wachtwoord: <span class="verplicht">*</span> <span class="alert" id="alertwachtwoord">wachtwoord is niet ingevuld!</span></p>
				<input type="text" name="wachtwoord" id="wachtwoord" />
			
			<br><br><br>
			<div id="knoppen" >
				<input type="submit" name="registreer" value="registreer">
				<input type="reset" onclick="terug()" value="Alles leegmaken" >
				<input type="button" value="Terug" onclick="window.location.href='mijnaccount.php'">
			</div>
			<br>
        </form>
		
		<?php

include "dbconnect.php";
	
	
	if(isset($_POST["registreer"]))
	{
		if (!empty($_POST['voornaam']) && !empty($_POST['achternaam']) && !empty($_POST['adres']) && !empty($_POST['gemeente']) && !empty($_POST['email']) && !empty($_POST['wachtwoord'])) 
		{
			// Test voor duplicaten op basis van de voornaam
			$query = mysqli_query($link,"select * from klant where voornaam='".$_POST['voornaam']."' ");
             $a = mysqli_num_rows($query);
             if ($a >= 1) 
			 {
                 echo"<script type='text/javascript'>alert('name is already in use !')</script>";
				 echo'<div style="Color:red">"name is already in use !"</div>';
				 //echo "name is already in use !";
             }
			 else
			 {
				
				$query = "INSERT INTO Klant (voornaam, naam, adres, gemeente, email, wachtwoord) VALUES ('". $_POST['voornaam'] . "', '". $_POST['achternaam'] . "', '". $_POST['adres'] . "', '". $_POST['gemeente'] . "', '". $_POST['email'] . "','".md5($_POST['wachtwoord']) . "')";
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

