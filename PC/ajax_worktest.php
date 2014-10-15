<?
	$query 		= "SELECT * FROM ".$_gl[tk_worktest_table]."";
	$result 	= mysqli_query($my_db, $query);
	$data		= mysqli_fetch_array($result);
	print_r($data);
	
?>
<div>
  <h1></h1>
</div>