<?php

$error=''; // Variable To Store Error Message
$error2=''; // Variable To Store Error Message
$error3=''; // Variable To Store Error Message

if (isset($_POST['registreer'])) 
{


// get form data, making sure it is valid

    $voornaam = mysqli_real_escape_string(htmlspecialchars($_POST['voornaam']));
	$achternaam = mysqli_real_escape_string(htmlspecialchars($_POST['achternaam']));
    $email = mysqli_real_escape_string(($_POST['email']));
    $adres =mysqli_real_escape_string(htmlspecialchars($_POST['adres']));
	$gemeente =mysqli_real_escape_string(htmlspecialchars($_POST['gemeente']));
    $wachtwoord = mysqli_real_escape_string(htmlspecialchars($_POST['wachtwoord']));


// check to make sure both fields are entered


    if (empty($_POST['voornaam']) || empty($_POST['achternaam']) || empty($_POST['wachtwoord']) || empty($_POST['email']) || empty($_POST['adres']) || empty($_POST['gemeente'])) 
	{
        $error2 = "voornaam,email, gemeente or wachtwoord,adres is empty";
    }
    else
	{
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error2 = "Email is invalid."; // invalid emailaddress
        }
        else
        {
            // Selecting Database
           include "dbconnect.php";
            $query = mysqli_query("select * from klant where email='$email'");
             $a = mysqli_num_rows($query);
             if ($a >= 1) {
                 $error2 = " Email adress is already in use !";
             }





			else 
			{ 		/* Establishing Connection with Server by passing server_name, user_id and wachtwoord as a parameter*/


		// To protect MySQL injection for Security purpose
				$voornaam = stripslashes($voornaam);
				$achternaam = stripslashes($achternaam);
				$wachtwoord = stripslashes($wachtwoord);
				$adress =   stripslashes($adress);
				$gemeente =   stripslashes($adress);

				$voornaam = mysqli_real_escape_string($voornaam);
				$achternaam = mysqli_real_escape_string($achternaam);
				$wachtwoord = mysqli_real_escape_string($wachtwoord);


		// save the data to the database

				mysqli_query("INSERT klant SET voornaam='$voornaam',achternaam='$achternaam', wachtwoord='$wachtwoord'")
				or die(mysqli_error());
				mysqli_query("INSERT klant SET email='$email',adres='$adres',gemeente='$gemeente'")
				or die(mysqli_error());


		// once saved, redirect back to the view page


				$error2 = "Succesfully created a account please log in.";
			}
		}
	}
}

?>