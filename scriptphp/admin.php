<?php

if(isset($_POST['addproduct']))
    {
        $error ="rrrr";
        if (empty($_POST['Productnaam']) || empty($_POST['Prijs']) || empty($_POST['Categorie']) || empty($_POST['Merk']) || empty($_POST['Beschrijving']) || empty($_POST['Type'])) {
            $error6 = "Productnaam,Prijs,Categorie,Beschrijving,Type or Merk is empty";
        }
        else 
		{

             $productname = $_POST['Productnaam'];
             $beschrijving = $_POST['Beschrijving'];
             $prijs = $_POST['Prijs'];
             $categorie = $_POST['Categorie'];
			 $merk = $_POST['Merk'];	
			 $type = $_POST['Type'];
             $testafb = "images/test.jpg";

 // To protect MySQL injection for Security purpose
            $productname = stripslashes($productname);
            $beschrijving = stripslashes($beschrijving);
			$prijs = stripslashes($prijs);
            $categorie = stripslashes($categorie);
			$merk = stripslashes($merk);
			$type = stripslashes($type);


             $productname = phpinjectie($productname);
             $beschrijving = phpinjectie($beschrijving);
             $prijs = phpinjectie($prijs);
			 $type = phpinjectie($type);
             $prijs = floatval($prijs);
			 $prijs1 = $prijs;
             $categorie = phpinjectie($categorie);
             if((is_int($prijs1) == true))
             {
                 $error = "Prijs is gelijk aan 0 !";
             }


             else{

                 // Selecting Database
             if((include( "dbconnect.php")) === false)
                 {
                   echo("Error with the including of the file");
                 }




             $result = mysqli_query($link,"select id_c from categorie WHERE name_c = '$category'")
                 or die(mysqli_error());

             $row = mysqli_fetch_array( $result );

                   $result = $row['id'];
 // save the data to the database

                     mysqli_query($link,"INSERT product  SET Product_ID='', productnaam=".$productname.", productbeschrijving ='$beschrijving',afbeelding='$testimmage',price='$price', categorie='$categorie', merk='$merk' soort='$type'")
                     or die(mysqli_error());



 // once saved, redirect back to the view page


                     $error = "Succesfully created a product";
                 }
     }}