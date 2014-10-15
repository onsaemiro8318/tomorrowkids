<?
	// 내 직업 테스트 질문 정보
	function TK_GetTestQuestionInfo($idx)
	{
		global $_gl;
		global $my_db;

		$query 			= "SELECT * FROM ".$_gl[tk_worktest_table]." WHERE idx='".$idx."'";
		$result 		= mysqli_query($my_db, $query);
		$info	= mysqli_fetch_array($result);

		return $info;
	}

	// 내 직업 테스트 질문idx에 해당하는 답변 정보
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