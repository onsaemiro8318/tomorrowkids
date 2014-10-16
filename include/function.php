<?
	// 내 직업 테스트 질문 정보
	function TK_GetTestQuestionInfo($idx)
	{
		global $_gl;
		global $my_db;

		$query 		= "SELECT * FROM ".$_gl[tk_worktest_table]." WHERE idx='".$idx."'";
		$result 	= mysqli_query($my_db, $query);
		$info		= mysqli_fetch_array($result);

		return $info;
	}

	// 내 직업 테스트 질문idx에 해당하는 답변 정보
	function TK_GetTestAnswerInfo($idx)
	{
		global $_gl;
		global $my_db;

		$query 		= "SELECT * FROM ".$_gl[tk_worktest_table]." WHERE parent_idx='".$idx."'";
		$result 	= mysqli_query($my_db, $query);
		while($data = mysqli_fetch_array($result))
			$info[] = $data;

		return $info;
	}

	// 내 직업 테스트 동일 유저 참여 횟수
	function TK_GetTestUserCntInfo($userid)
	{
		global $_gl;
		global $my_db;

		$query 			= "SELECT count(*) cnt FROM ".$_gl[tk_test_result_table]." WHERE user_id = '".$userid."'";
		$result 		= mysqli_query($my_db, $query);
		list($info)		= mysqli_fetch_array($result);

		return $info;
	}

	// 내 직업 테스트 직업 구하기 로직
	function TK_GetTestResultInfo($point)
	{
		global $_gl;
		global $my_db;

		$query 				= "SELECT job FROM ".$_gl[tk_test_result_table]." ORDER BY idx DESC limit 1";
		$result 			= mysqli_query($my_db, $query);
		if ($result)
			list($job_idx)		= mysqli_fetch_array($result);
		else
			$job_idx = 0;
		if ($job_idx != 0)
		{
			$query				= "SELECT `group` FROM ".$_gl[tk_works_table]." WHERE idx='".$job_idx."'";
			$result				= mysqli_query($my_db, $query);
			list($job_group)	= mysqli_fetch_array($result);

			if ($point == $job_group)
			{
				$job_idx = $job_idx + 1;

				$query				= "SELECT * FROM ".$_gl[tk_works_table]." WHERE group='".$job_group."' AND idx = '".$job_idx."'";
				$result				= mysqli_query($my_db, $query);
				if ($result)
					$job_yn			= mysqli_fetch_array($result);
				else
					$job_yn = 0;
			}else{
				$job_yn = 0;
			}
		}

		if ($job_yn != 0 && $job_idx != 0)
		{
			$query		= "SELECT * FROM ".$_gl[tk_works_table]." WHERE idx = '".$job_yn[idx]."'";
			$result		= mysqli_query($my_db, $query);
			$info		= mysqli_fetch_array($result);
		}else{
			if ($point == 3)
				$job_idx	= 1;
			else if ($point == 4)
				$job_idx	= 16;
			else if ($point == 5)
				$job_idx	= 31;
			else
				$job_idx	= 46;

			$query		= "SELECT * FROM ".$_gl[tk_works_table]." WHERE idx = '".$job_idx."'";
			$result		= mysqli_query($my_db, $query);
			$info		= mysqli_fetch_array($result);
		}

		return $info;
	}

	// 유입매체 정보 입력
	function TK_InsertTrackingInfo($media, $gubun)
	{
		global $_gl;
		global $my_db;

		$query		= "INSERT INTO ".$_gl[tk_tracking_info_table]."(media, ip_addr, reg_date, gubun) values('".$media."','".$_SERVER['REMOTE_ADDR']."',now(),'".$gubun."')";
		$result		= mysqli_query($my_db, $query);
	}

	// 기부 총 참여자 수 구하기
	function TK_GetTestTotalCount()
	{
		global $_gl;
		global $my_db;

		$query 		= "SELECT * FROM ".$_gl[tk_test_result_table]."";
		$result 	= mysqli_query($my_db, $query);
		$info		= mysqli_num_rows($result);

		return $info;
	}

	// 테스트 결과 직업 표시
	function TK_GetUserJobInfo($idx)
	{
		global $_gl;
		global $my_db;

		$query 		= "SELECT * FROM ".$_gl[tk_works_table]." WHERE idx='".$idx."'";
		$result 	= mysqli_query($my_db, $query);
		$info		= mysqli_fetch_array($result);

		return $info;
	}

?>