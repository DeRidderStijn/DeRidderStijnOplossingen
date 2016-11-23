<?php

	class Lion extends Animal 
	{
		protected $species;

		function __construct($name, $gender, $health, $species)
		{
			parent::__construct($name, $gender, $health); //neem animal als bovenliggende klasse (lion is een animal)
			$this->species = $species;
		}

		public function getSpecies()
		{
			return $this->species;
		}
		public function doSpecialMove()
		{
			return "roar";
		}
	}
?>