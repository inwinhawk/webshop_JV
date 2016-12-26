<!doctype html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>	Log out </title>

	<link href="css/reset.css" rel="stylesheet"/>
	<link href="css/algemeen.css" rel="stylesheet"/>
	<link href="css/project.css" rel="stylesheet"/>
	<link href="css/menu.css" rel="stylesheet"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">


</head>
<body>
<div id="content">
	<div id="spacer">
		<?php include("menu.php") ?>
	</div>
	<hr>
	<div id="inhoud">
		<?php
		//start the session
		session_start();

		//check to make sure the session variable is registered
		if(isset($_SESSION['username']))
		{
			//session variable is registered, user ready to logout
			
			echo " ".$_SESSION['username']." , You are succesfully loged out!";
			$_SESSION['loggedin']=0;
			unset($_SESSION['loggedin']);
			session_destroy();			
		}
		else
		{
			//session variable isn't registered, user shouldn't be on this page
			header( "Location: mijnaccount.php" );
			
		}
		?>

	</div>
	<hr>
	<div class="footer-distributed">
		<?php include("info.php") ?>
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




