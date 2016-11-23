<?php

	class Animal
	{
		protected $name;
		protected $gender;
		protected $health;

		public function __construct($name, $gender, $health)
		{
			$this->name = $name;
			$this->gender = $gender;
			$this->health = $health;
		}
 
		public function getName()
		{
			return $this->name;
		}

		public function getHealth()
		{
			return $this->health;
		}

		public function getGender()
		{	
			return $this->gender;
		}

		public function changeHealth($health)
		{
			$this->health += $health;
		}

		public function doSpecialMove()
		{
			return "walk";
		}
	}
?>