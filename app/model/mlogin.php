<?php


	class MLogIn
	{

		public function searchUser($user, $password)
		{
		 //echo "searching for $user and $password";
		 $sql='SELECT id FROM tusers where user like :user AND password like :password ';
		//echo $sql;
			$cerere=BD::obtine_conexiune()->prepare($sql);
			$cerere->execute(["user"=> $user, "password"=> $password ]);
			//echo $cerere->fetchAll();
			$msg= $cerere->fetchAll();
			if($msg==NULL)
			{ //echo "wrong password or user";
				//unset($_POST['user']);
				//unset($_POST['actiune']);
				return 0;
			}
			// foreach($msg as $m)
			// 	{
			// 	echo "id".$m["id"];
			// 	if($m["id"]!=NULL) echo "loginsuccessufull";
			// 	}
			//return $cerere->fetchAll();
			 return 1;
		}

		public function insertUser($user, $password)
		{
		 //echo "inserting $user and $password";
		 $sql="INSERT INTO tusers(user,password) VALUES(:user,:password)";
			$cerere=BD::obtine_conexiune()->prepare($sql);
			$cerere-> execute([
				'user'=> $user,
				'password'=>$password
			]);
		}
		

	

	}


?>