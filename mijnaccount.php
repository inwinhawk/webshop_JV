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
        if(isset($_SESSION['loggedin']))
        {
            include "menu_logout.php";
        }
        else
            include "menu.php";

        ?>
    </div>
    <hr>
    <div id="inhoud">
       <h1> Please login to enter the site! </h1>
    <?php
	if(isset($_SESSION['loggedin']))
	{
		
		if($_SESSION['admin'] == false)
		{
			header("Location: checkLogin.php");
		}
		elseif ($_SESSION['admin'] == true)
		{
			header("Location: admin.php");
		}
	
	}
	
	else
	{
		?>
		<form method="POST" action="login.php">
    	<fieldset>
        	<legend>Login form</legend>
   				<p> 
                		Username: <input type="text" name="username" size="20"><br>
    				Password: <input type="password" name="password" size="20">
                </p>
        </fieldset>
		<br>
    	<input type="submit" value="Submit" name="login">
    </form>
	<?php
	}
	?>
	
<br>
<p> Nog geen account ?</p>
<a href="registreer.php"><input type="submit" value="register" name="register"></a>
    </div>
    <hr>
    <div class="footer-distributed">
        <?php include "info.php"; ?>
    </div>
</div>
<footer>
    <div id="voeter">
        <?php include("footer.php") ?>
    </div>
</footer>
</body>
</html>

