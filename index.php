<?
	include_once "config.php";
	$my_db = new mysqli("localhost", "root", "m!nv#Rtisin9", "tomorrowkids");
	if (mysqli_connect_error()) {
		exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}

	$query 		= "SELECT * FROM tk_member";
	$result 	= mysqli_query($my_db, $query);
	$data		= mysqli_fetch_array($result);
	print_r($data);

?>

