<?
	function TK_GetTestQuestionInfo($idx)
	{
		global $_gl;
		global $my_db;

		$query 			= "SELECT * FROM ".$_gl[tk_worktest_table]." WHERE idx='".$idx."'";
		$result 		= mysqli_query($my_db, $query);
		$info	= mysqli_fetch_array($result);

		return $info;
	}

	function TK_GetTestAnswerInfo($idx)
	{
		global $_gl;
		global $my_db;

		$query 			= "SELECT * FROM ".$_gl[tk_worktest_table]." WHERE parent_idx='".$idx."'";
		$result 		= mysqli_query($my_db, $query);
		while($data = mysqli_fetch_array($result))
			$info[] = $data;

		return $info;

	}
?>