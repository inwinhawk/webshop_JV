<?php
class product
{
		private $afbeelding;
		private $productnaam;
		private $merk;
		private $productbeschrijving;
		private $prijs;

		
		
		public function __construct($p_afbeelding ,$p_productnaam="",$p_merk="", $p_productbeschrijving="",$prijs="")
		{
			$this->afbeelding=$p_afbeelding;
			$this->productnaam=$p_productnaam;
			$this->merk=$p_merk;
			$this->productbeschrijving=$p_productbeschrijving;
			$this->prijs=$prijs;
		}
		
		public function toon_productinfo()
		{
			echo "<img src=\"".$this->afbeelding."\"alt=\"Productafbeelding\" title=\"".$this->productnaam."\" class = \"productimg\"><br/>";
			echo "<p>".$this->merk."<br/>";
			echo "".$this->productnaam."<br/>";

			//afbeelding tonen en verwijzen naar productinfo met doorgegeven ID
			echo "<p class = \"links\">".$this->productbeschrijving."<p/>";
			echo "<p class = \"prijs\">Prijs: &#8364; " . $this->prijs."<br/>";
		}
				
}

class extrainfo extends product
{
		private $advies;
		
		
		public function __construct($afbeelding="",$p_productnaam="",$p_merk="", $p_productbeschrijving="",$prijs="", $p_advies="Wegens de eindejaarsperiode krijgt u tijdelijk een korting van 10% op dit product")
		{
			parent::__construct($afbeelding,$p_productnaam,$p_merk,$p_productbeschrijving,$prijs, $p_advies);
			$this->advies=$p_advies;
		}
		
		
		
		public function toon_info()
		{
			parent::toon_productinfo();
				
			$str="<br/><p>".$this->advies."</br></p>";
			echo'<div style="Color:red">'.$str.'</div>';
		
		}
}