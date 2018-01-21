	<?php

            //include hier connect.php == connectie met databank 
            include 'connect.php';


			$zoek=$_GET['orderby'];

			if($_GET['orderby']=="Alles")
            {
                  $sql = "SELECT * FROM product";
            }

            else
            {
                $sql = "SELECT * FROM product WHERE soort ='".$zoek."'";
                   
            }       
                $result = $conn->query($sql);
			  if ($result->num_rows > 0)
                {
                    // output data of each row
                    while($row = $result->fetch_assoc())
                    {
                        echo "<div>";
                        echo $row["ProductFabrikant"]. "    " . $row["ProductNaam"]."<br/>";
                                                
                        
                        //afbeelding tonen en verwijzen naar productinfo met doorgegeven ID
                        echo "<a href=\"productinfo.php?ID={$row['ProductID']}\"><img src=\"".htmlspecialchars($row["ProductAfbeelding"])."\"alt=\"Productafbeelding\" title=\"Meer info\" class = \"productimg\"></a><br>";
                    
                        echo "<form>
                        
                       <p>Prijs: &#8364;".htmlspecialchars($row["ProductPrijs"])."
                       <a class=\"Inwinkelmand\" href=\"Winkelmand.php?ID={$row['ProductID']}\">&#128722;</a><br>
                        
                        </form>";
						echo "</div>";
                    }
                } else {
                    echo "Geen resultaten voor deze categorie";
                }
           
?>           
			
