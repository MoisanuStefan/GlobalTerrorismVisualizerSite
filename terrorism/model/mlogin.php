<?php
	class BD{
		private static $conexiune_bd= NULL;
		public static function obtine_conexiune()
		{
			if(is_null(self::$conexiune_bd))
			{
			self::$conexiune_bd =new PDO('mysql:host=localhost;dbname=chat','costina','costina');
			}
			return self::$conexiune_bd;
		}
	}
	



	class MLogIn
	{

		public function searchUser($user, $password)
		{
		 echo "searching for $user and $password";
		 $sql='SELECT id FROM tusers where user like \''.$user.'\' and password like \''.$password.'\'';
		echo $sql;
			$cerere=BD::obtine_conexiune()->prepare($sql);
			$cerere->execute();
			//echo $cerere->fetchAll();
			$msg= $cerere->fetchAll();
			if($msg==NULL)
			{ echo "wrong password or user";
			}
			foreach($msg as $m)
				{
				echo "id".$m["id"];
				if($m["id"]!=NULL) echo "loginsuccessufull";
				}
			return $cerere->fetchAll();
			 
		}

		public function insertUser($user, $password)
		{
		 echo "inserting $user and $password";
		 $sql="INSERT INTO tusers(user,password) VALUES(:user,:password)";
			$cerere=BD::obtine_conexiune()->prepare($sql);
			$cerere-> execute([
				'user'=> $user,
				'password'=>$password
			]);
		}
		
		public function adaugaMesaj($user, $mesaj)
			{
			$sql="INSERT INTO mesaje(user,mesaj) VALUES(:user,:mesaj)";
			$cerere=BD::obtine_conexiune()->prepare($sql);
			$cerere-> execute([
				'user'=> $user,
				'mesaj'=>$mesaj
			]);

			}
		public function obtineMesaje()
			{
			$sql="SELECT * FROM mesaje";
			$cerere=BD::obtine_conexiune()->prepare($sql);
			$cerere->execute();
			return $cerere->fetchAll();
			}

		public function modificaMesaj($id,$mesaj)
			{
			$sql="UPDATE mesaje SET mesaj= :mesaj WHERE id=:id";
			$cerere=BD::obtine_conexiune()->prepare($sql);
			return $cerere->execute([
				'mesaj'=> $mesaj,
				'id' => $id
				]);
			}
		public function stergeMesaj($id)
			{
			$sql="DELETE FROM mesaje WHERE id=?";
			$cerere=BD::obtine_conexiune()->prepare($sql);
			return $cerere->execute([$id]);
			}

	}


?>