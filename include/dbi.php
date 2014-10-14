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
	
	//$my_db = new mysqli("218.54.31.121", "root", "m!nv#Rtisin9", "tomorrowkids");
	$my_db = new mysqli("218.54.31.121", "root", "tomorrowkids", "tomorrowkids");
	if (mysqli_connect_error()) {
		exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}
?>
