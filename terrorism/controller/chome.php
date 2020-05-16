<?php
	class CHome
	{	private $model;

		public function __construct($actiune, $parametri)
		{	
			$this->model= new MHOME();
			if($actiune=="viewHome")	
				$this->viewHome();
			
		}

		private function viewHome()
		{

			$view=new VHome();
			
			$view-> oferaVizualizare();
		
		}

	}

?>