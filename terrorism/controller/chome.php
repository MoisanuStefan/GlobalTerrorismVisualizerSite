<?php
	class CHome
	{	private $model;

		public function __construct($actiune, $parametri)
		{	
			
			if($actiune=="viewHome")
					
				{ $this->model= new MHome();
				echo "home"; $this->viewHome();}
			if($actiune=="changeChart")
				{
				echo "practic s a schimat chartul";
				$this->viewHome();
				}
			if($actiune=="LogIn")
				{
				$this->model= new MLogIn();
				echo "ne am logat";
				if(isset($_POST["user"])) $user=$_POST["user"];
				echo $user;
				if(isset($_POST["password"])) $password=$_POST["password"];
				echo $password;
				$this->model->searchUser($user,$password);
				$this->viewHome();
				}
			if($actiune=="SignIn")
				{
				$this->model= new MLogIn();
				
				if(isset($_POST["user"])) $user=$_POST["user"];
				if(isset($_POST["password"])) $password=$_POST["password"];
				$this->model->insertUser($user,$password);
				
				$this->viewHome();
				}
			
		}

		private function viewHome()
		{

			$view=new VHome();
			
			$view-> oferaVizualizare();
		
		}

	}

?>