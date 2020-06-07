<?php


	class MLogIn
	{

		public function searchUser($user, $password)
		{
		 $sql='SELECT id FROM tusers where user like :user AND password like :password ';
			$cerere=BD::obtine_conexiune()->prepare($sql);
			$cerere->execute(["user"=> $user, "password"=> $password ]);
			$msg= $cerere->fetchAll();
			if($msg==NULL)
			{ 
				return 0;
			}
			 return 1;
		}

		public function insertUser($user, $password)
		{
		 $sql="INSERT INTO tusers(user,password) VALUES(:user,:password)";
			$cerere=BD::obtine_conexiune()->prepare($sql);
			$cerere-> execute([
				'user'=> $user,
				'password'=>$password
			]);
		}
		

	

	}


?>