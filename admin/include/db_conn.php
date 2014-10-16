<?php
	$my_db = new mysqli("mnv-tfs-db", "mnvdev", "topgirl", "topgirl");
	if (mysqli_connect_error()) {
		exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}
?>

