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
                //session starten
                session_start();
        


                //include hier connect.php == connectie met databank 
                include 'dbconnect.php';

                $query = "SELECT voornaam,wachtwoord,admin,klant_ID FROM klant";
				$result = mysqli_query($link,$query) or die("FOUT: er is een fout opgetreden bij het uitvoeren van de query");
     
        
				if(isset($row['klant_ID']))
                {
                      $_SESSION['klant_ID'] = $row['klant_ID'];
                }
              
                   //  output data of each row
                    while($row = mysqli_fetch_array($result))
                    {
                        $login[] = $row;
                        
                    }
                
                
//functie voor het zoeken naar de gebruiker
function search_user($user, $pass, $login)
{
	$len=count($login);
	for($i=0;$i<$len;$i++)
	{
        //kijken of username en paswoord correct zijn
		if(($login[$i][0] == $user) && ($login[$i][1] == $pass))
        {
           
            //Kijken of persoon Admin is of niet
           if(($login[$i][2])==true)
           {
               //idien de gebruiker admin rechten heeft, wordt 2 gereturnd
                return 2;
           }
        else
        {
            //idien de gebruiker geen admin rechten heeft, wordt 1 gereturnd
            return 1;
        }
            
            
        }
			
	}
	return 0;			
}
             

//kijken of user pagina direct probeert te accessen, indien nodig redirecten naar login pagina
if (!isset($_POST['username']) || !isset($_POST['password'])) 
{
    header("Location: mijnaccount.php");
    
    
} //extra controle om te kijken of velden ingevuld zijn
elseif (empty($_POST['username']) || empty($_POST['password'])) 
{
    header("Location: mijnaccount.php");
} else
{
    //velden omzetten naar variabelen; addslashes aan username toevoegen en md5() aan password voor SQL-injection tegen te gaan/ beveiliging
    $user = addslashes(mysqli_real_escape_string($link,$_POST['username']));
    $pass = md5(mysqli_real_escape_string($link,$_POST['password']));
    
    //zresultaat van zoekfunctie ophalen
    $result = search_user($user, $pass, $login);

    
    //Kijken of er iets gereturned wordt
    //login OK maar geen admin
    if ($result == 1)
    {
        //sessie starten en variabele invullen
        session_start();
        $_SESSION['username'] = $user;
        $_SESSION['admin'] = false;
		$_SESSION['loggedin']=1;
		

        //Gelukt!
        echo 'Success!';

        //naar andere pagina sturen 
        header("Location: checkLogin.php");
    }
    
    //Login OK maar wel admin
    if($result ==2)
    {
        //start the session and register a variable
        session_start();
        $_SESSION['username'] = $user;
        //meegeven om te vermijden dat gewone user ook admin dingen kan doen
        $_SESSION['admin'] = true;
		$_SESSION['loggedin']=1;
		
		echo 'Success!';

        //redirect naar admin pagina
        header("Location: admin.php");
        
    }
    if($result ==0)
    {
        //PHP error oplossen
        $_SESSION['admin'] = false;
		unset($_SESSION['loggedin']);

        echo "Er is een fout opgetreden. De gegevens die u in gaf zijn onjuist of bestaan niet.<br/>";
        echo "<a href = mijnaccount.php>Terug </a>";
    }
	
}
		mysqli_close($link);
?>
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