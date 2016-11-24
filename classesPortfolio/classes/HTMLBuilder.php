<?php 
	
	class HTMLBuilder
	{
		protected $header;
		protected $body;
		protected $footer;

		public function __construct($header, $body, $footer)
		{
			$this->header 	= $header;
			$this->body 	= $body;
			$this->footer 	= $footer;

			$this->buildHeader();
			$this->buildBody();
			$this->buildFooter();

		}
		public function buildHeader()
		{
			//zorgt ervoor dat de header op het scherm verschijnt
			//zorgt ervoor dat alle bestanden uit de map css worden ingeladen
			$cssDir	=	 dirname(dirname(__FILE__)) . '/css/';
			$filesArray	=	$this->findFiles($cssDir, 'css');
			$cssLinks	=	$this->createCssLink($filesArray);
			include 'html/' . $this->header;
		}

		public function buildBody()
		{
			//zorgt ervoor dat de body op het scherm verschijnt
			include 'html/' . $this->body;
		}

		public function buildFooter()
		{
			//zorgt ervoor dat de footer op het scherm verschijnt
			//zorgt ervoor dat alle bestanden uit de js map worden ingeladen
			$jsDir	=	 dirname(dirname(__FILE__)) . '/js/';
			$filesArray	=	$this->findFiles($jsDir, 'js');
			
			$jsScripts	=	$this->createJsScripts($filesArray);

			include 'html/' . $this->footer;
		}

		public function findFiles($dir, $file)
		{
			
			return glob($dir . '/*.' . $file);	
		}
		
		public function createCssLink($filesArray)
		{

			foreach ($filesArray as $file)
			{
				$fileInfo	=	pathinfo($file);
				$fileName	=	$fileInfo['basename'];
				
				echo('<link rel="stylesheet" type="text/css" href="css/' . $fileName . '">');
			}
		}
		
		public function createJsScripts($filesArray)
		{
			
			foreach ($filesArray as $file)
			{
				$fileInfo	=	pathinfo($file);
				$fileName	=	$fileInfo['basename'];
				
				echo ('<script src="js/' . $fileName . '"></script>');
			}
		
		}

	}

?>