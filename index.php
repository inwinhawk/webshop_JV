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

		<script src="js/jquery.js"></script>

		<script>
		$(document).ready(function() // eerst document ready  zetten en dan pas opstarten jquery
		{
			$("#slideshow > div:gt(0)").hide();

			setInterval(function() { 
			$('#slideshow > div:first')//eerste element inladen.
			.fadeOut(200) // wegvegen afbeelding  in ms
			.next() // volgende in de rij oproepen
			.fadeIn(250) // invegen nieuwe afbeelding in ms
			.end()// resetten van functie  alles terug normaal maken
			.appendTo('#slideshow');// toevoegen aan slideshow
			}, 5000);   // einde slide show + aantal seconden rust
		});
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
            include "menu_logout.php";
        }
        else
		{
			include "menu.php";
			
		}
         ?>
        </div>
        <hr>
        <div id="inhoud">
           <h1>Home pagina</h1>

			<a>Welkom bij The Swimshop.<br/> 
			De webshop voor zwemkledij voor jong en oud .</a>

        </div>
		<hr>
        <div id="slideshow">
            <?php include("slideshow.txt") ?>
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
	<br/>
    </body>
</html>

