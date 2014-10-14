<?
	include_once "config.php";


	$query 		= "SELECT count(*) FROM $_gl[tk_member_table]";
	$result 	= mysqli_query($my_db, $query);
	$data		= mysqli_fetch_array($result);
	print_r($data);

?>

