<!doctype html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>	Log In</title>

    <link href="css/reset.css" rel="stylesheet"/>
    <link href="css/algemeen.css" rel="stylesheet"/>
    <link href="css/project.css" rel="stylesheet"/>
    <link href="css/menu.css" rel="stylesheet"/>


</head>
<body>
<div id="content">
    <div id="spacer">
        <?php include("menu.php") ?>
    </div>
    <hr>
    <div id="inhoud">
       
	   <?php
		session_start();
		//$session al in gelogd naar random pagina 
		 if(isset($_SESSION['username']))
		 {
			 header("Location:index.php");
		 }

			if (!isset($_POST['username']) || !isset($_POST['password']))
			{
				header( "Location: mijnaccount.php");
			}

			//check that form fields are not empty. Redirect back to login page if they are
			elseif (empty($_POST['username']) || empty($_POST['password']))
			{
				header( "Location: mijnaccount.php");
			}
		 
			include "dbconnect.php";

		$query="SELECT admin,voornaam,wachtwoord FROM Klant WHERE voornaam='".$_POST['username']."' and wachtwoord='".md5($_POST['password'])."' ";
		echo("$query");
		$result = mysqli_query($link1,$query) or die("FOUT: er is een fout opgetreden bij het uitvoeren van de query");
		if ((mysqli_num_rows($result)) == 1)
		{
			$row=mysqli_fetch_array($result);
			
			$_SESSION['admin']=$row['admin'];
			echo"$admin";
			if($admin == 1)
			{
				header("Location: dames.php");
				echo "<script type='text/javascript'>alert('You are an admin.!')</script>";
			}
			
			//start the session and register a variable
				
				$_SESSION['username'] = $user;
				echo "$user";
					
				//successful login code will go here...
				echo "Success!";
				$_SESSION['loggedin']=1;
				$_SESSION['tekst']=$row['voornaam'];
					
				//we will redirect the user to another page where we will make sure they're logged in
				header( "Location: checkLogin.php");
		}
			else
			{	
				header("Location: mijnaccount.php");
			}
		mysqli_close($link1);

		?>
	   
    </div>
    <hr>
    <div class="footer-distributed">
		<?php include "info.php"; ?>
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

