<?php
	session_start();
	define('SLASH',DIRECTORY_SEPARATOR);
	define('DIRECTOR_SITE', dirname(__FILE__));
	
	$controller = "CHome";
	$actiune= "viewHome";
	$parametri= "";
	
	include "controller/chome.php";
	include "model/mhome.php";
	include "model/mlogin.php";
	include "model/mBD.php";
	include "view/vhome.php";
	include "model/mchart.php";
	include_once "model/mMap.php";

/* comenturi */
 
	if(isset($_POST["actiune"])){
		 $actiune=$_POST["actiune"];
		 unset($_POST['actiune']);
	}
	
	
	$control = new CHome($actiune, $parametri);

	


?>