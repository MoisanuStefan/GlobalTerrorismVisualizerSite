<?php
	class VHome
	{
		private $sablon;
		private $mesaje;

		public function __construct()
		{
			$this->sablon= DIRECTOR_SITE.SLASH.'view'.SLASH.'shome.tpl';
		}

		public function incarcaDatele($msg)
		{
			$this->mesaje= $msg;

		}

		public function oferaVizualizare()
		{
			$msg = $this->mesaje;
			include($this->sablon); 
		}

	}

?>