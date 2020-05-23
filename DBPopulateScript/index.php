<?php

include "BD.php";



$first = true;
$connection = BD::obtine_conexiune();
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try{
    if (($file = fopen("data.csv", "r")) !== FALSE) {
        echo "File opened.\n Inserting lines...\n";
        $line = 1;
        while (($csv = fgetcsv($file, 5000, ",")) !== FALSE) { // for each row or the file
           

            // skip first line that contains column names
            if($first == true){
                $first = false;
                continue;
            }

            //insert null in empty columns and remove extra "
            for ($count = 0; $count < count($csv); $count++){
            
                if($csv[$count] == ''){
                    $csv[$count] = "null";
                }
                if(strpos($csv[$count], "\"") !== false){
                    $csv[$count] = str_replace("\"", '', $csv[$count]);
                }
            }

            
            $sql = "insert into attacks values(" . $csv[0] . "," . $csv[1] . ","  . $csv[2] . "," . $csv[3] . ",\""  . $csv[8] . "\",\"" . $csv[10] . "\",\""  . $csv[11] . "\",\"" . $csv[12] . "\",\"" . $csv[17] . "\",\"" . $csv[26] . "\",\"" . $csv[27] . "\",\"" . $csv[29] . "\",\"" . $csv[35] . "\",\"". $csv[37] . "\",\"". $csv[38] . "\",\"". $csv[39] . "\",\"". $csv[41] . "\",\"". $csv[58] . "\",\"". $csv[64] . "\",\"". $csv[73] . "\",\"" . $csv[82] . "\",\"". $csv[84] . "\",\"". $csv[97] . "\",\"". $csv[106] . "\",\"". $csv[129] . "\"" . ")";
            $request = $connection->prepare($sql);
            $request->execute();
            $line++;
            
        }
        echo "Successfully inserted $line lines.";
        fclose($handle);
   
}
}catch( PDOException $e ) {
   echo $e->getMessage();
}


?>