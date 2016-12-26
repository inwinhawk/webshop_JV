<?php # Item.php

class Item {
	
	//attributen maken
	private $product_ID;
	private $productnaam;
	private $prijs;
    private $merk;
    
    // Constructor populates the attributes:

	public function __construct($product_ID, $productnaam, $prijs, $merk)	
    {
		$this->product_ID = $product_ID;
		$this->productnaam = $productnaam;
		$this->prijs = $prijs;
        $this->merk = $merk;
	}
	
	// functie om ID terug te geven
	public function getId()	
	{
		return $this->product_ID;
	}

	// funtie dat naam teruggeeft
	public function getNaam() 
	{
		return $this->productnaam;
	}

	// functie dat prijs terruggeeft
	public function getPrijs() 
	{
		return $this->prijs;
	}
    // functie voor fabrikant terug te geven
	public function getMerk() 
	{
		return $this->merk;
	}
    

}