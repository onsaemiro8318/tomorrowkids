<?
    /******************************************************************************
     *
     * dbi.php
     *
     * Configuration file
     *
     * Created : 2014
     *
     ******************************************************************************/
//	$my_db = new mysqli("localhost", "root", "root", "tomorrowkids");	
	//$my_db = new mysqli("localhost", "root", "m!nv#Rtisin9", "tomorrowkids");
	$my_db = mysqli_connect("localhost", "root", "m!nv#Rtisin9", "tomorrowkids");
	if (mysqli_connect_error()) {
		exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}
?>
