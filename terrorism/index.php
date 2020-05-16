<?php
	session_start();
	define('SLASH',DIRECTORY_SEPARATOR);
	define('DIRECTOR_SITE', dirname(__FILE__));
	
	$controller = "CHome";
	$actiune= "viewHome";
	$parametri= "";
	
	include "controller/chome.php";
	include "model/mhome.php";
	include "view/vhome.php";
	$control = new CHome($actiune, $parametri);

	


?>