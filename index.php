<?
	include_once "config.php";


	$query 		= "SELECT * FROM tk_member";
	$result 	= mysqli_query($my_db, $query);
	$data		= mysqli_fetch_array($result);
	print_r($data);

?>

