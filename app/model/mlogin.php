<?php


	class MLogIn
	{
		/**
		 * the function searches for a specific user in the data base in order to complete the login process.
		 */
		public function searchUser($user, $password)
		{
		 $sql='SELECT id, hash FROM tusers where user like :user AND password like :password ';
			$cerere=BD::obtine_conexiune()->prepare($sql);
			$cerere->execute(["user"=> $user, "password"=> $password ]);
			$msg= $cerere->fetchAll();
			if($msg==NULL)
			{ 
				return 0;
			}
			setcookie("authHash", $msg[0]['hash'], 0, "/");
			return 1;
		}

		/**
		 * the function inserts a new user in the database, generating him an user hash
		 */
		public function insertUser($user, $password)
		{
			$userHash = hash('md5', $user);
			
		 	$sql="INSERT INTO tusers(user,password,hash) VALUES(:user,:password,:hash)";
			$cerere=BD::obtine_conexiune()->prepare($sql);
			$cerere-> execute([
				'user'=> $user,
				'password'=>$password,
				'hash'=>$userHash
			]);
		}
		

	

	}


?>