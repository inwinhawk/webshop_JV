<?php

              
	
	if(isset($_POST['zoek']))
	{
		if(!empty($_POST['zoek']))
		{
            //include hier connect.php == connectie met databank 
            include 'dbconnect.php';
			
			$zoek=mysqli_real_escape_string($link,htmlspecialchars($_POST['zoek']));

			//concat om in verschillende velden van tabel product te kunnen zoeken
			$query = "SELECT * FROM product WHERE Concat(productnaam, '',merk , '', soort) LIKE '%".$zoek."%' "	;		            
			$result = mysqli_query($link, $query);     
			
			  
                    // output data of each row
                    while($row = mysqli_fetch_array($result ))
                    {
						
                        $afbeelding= $row['afbeelding'];
						$id = $row['product_ID'];
						//$cat_id = $row['cat_id'] ;
						$productnaam=$row['productnaam'];
						$beschrijving= $row['productbeschrijving'];
						$prijs=$row['prijs'];
                        
                        echo "<div>";
                        echo "<a href=\"product.php?ID=".$id."\">$productnaam </a>";
						echo "<img src=$afbeelding alt=\"Picture not found,Please Report this to us!\" title=\"Meer info\" class = \"productimg\"><br>";				
                        
                        //naar winkelmandje
                        echo "<form>

						<p> Prijs:  € ".$row["prijs"]."
						<a class=\"Inwinkelmand\" href=\"Winkelmand.php?ID={$row['product_ID']}\">&#128722;</a>
						<br> <a href=\"product.php?ID=".$id."\" style= text-align:>More Info </a></t>
						
						</p>
                        
                        </form>";
                      echo"</div>";
                    }
					mysqli_close($link);
                
            
		}
		else
		{
			echo ("Gelieve 1 of meer letters in te geven waarnaar wat u wil zoeken.");
		}
    }
	

        
?> 
</div>          