<?
	include_once "config.php";


	list($test) = mysql_fetch_array($dbi_tk->execQuery("SELECT count(*) FROM $_gl[tk_member_table]"));

	$query 		= "SELECT count(*) FROM $_gl[tk_member_table]";
	$result 	= mysqli_query($my_db, $query);
	$data		= mysqli_fetch_array($result);
	print_r($data);

?>

