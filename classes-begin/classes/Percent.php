<?php
	class Percent { 
		public $relative;
		public $hundred;
		public $nominal;

		public function __construct($new, $unit) /*construct --> om uitgevoerd te worden wanneer de klasse word aangeroepen?*/
		{
			$this->relative = $this->formatNumber($new / $unit);
			$this->hundred 	= $this->formatNumber($this->relative * 100);

			if ($this->relative > 1)
			{
				$this->nominal = "positive";
			}
			else if ($this->relative == 1)
			{
				$this->nominal = "status-quo";
			}
			else
			{
				$this->nominal = "negative";
			}
		}
		public function formatNumber($number) /*uitleg functie format nr: http://php.net/manual/en/function.number-format.php */
		{
			return number_format($number, 2, '.', ' ');
		}
		
	}
?>