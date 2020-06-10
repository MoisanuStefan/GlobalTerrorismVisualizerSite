<?php

class MAdmin{

    public function __construct(){
        $this->connection = BD::obtine_conexiune();
    }

    //insert Attack
    public function insertAtt($json){
        $sql = 'INSERT INTO attacks(iyear,imonth,iday,country_txt,city,latitude,longitude,success,suicide,attacktype1_txt,targtype1_txt,weaptype1_txt) VALUES(? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?)';
        
        $array=array();
        $i=0;
        foreach ($json as $key => $value) {
            if ($key == 'latitude' || $key == 'longitude'){
                $array[$i]=floatval($value);
            }
            else if($key == 'year'){
                $array[$i] = intval($value);
            }
            else{
                $array[$i]=$value;
            }
                
                $i=$i+1;
        }
        //print_r($array);
        $stmt = $this->connection->prepare($sql);
        $resp = $stmt->execute($array);

        //if($resp==false) echo 'true';
        // else echo 'proba';
        //echo "resp".$resp;
    }

    //delete Attack
    public function deleteAtt($id){
        $sql = 'Delete from attacks where id = ' . $id ;
        $request = $this->connection->prepare($sql);
        $request->execute();
    }
    //verificat-----------------------------------------------


    //delete User
    public function deleteUser($user){
        $sql = 'Delete from tusers where user = :user' ;
        $request = $this->connection->prepare($sql);
        $request->execute([
            'user' => $user
        ]);
    }

    //operate user
    public function operateUser($json){
        print_r($json);
        if($json->isAdmin == '1'){
            $sql = 'UPDATE tusers SET isAdmin = 1 WHERE user = :user' ;
        }
        else {
               $sql = 'UPDATE tusers SET isAdmin = 0 WHERE user = :user' ;
        }
        $request = $this->connection->prepare($sql);
        $request->execute([
            'user' => $json->user
        ]);
    }

}
