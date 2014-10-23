<?php
include_once "config.php";

switch ($_REQUEST['exec'])
{
    case "update_user_email" :
        $email = $_REQUEST['email'];
		$userid	= $_SESSION['ss_mb_id'];
		TK_UpdateUserEmail($userid,$email); 
        
    break;
    
	case "ka_user_info" :
		$ip_addr = $_SERVER['REMOTE_ADDR'];
		$userid	= $_REQUEST['kaUserId'];
		$media = $_gl[login_media]['kakao'];

		unset($_SESSION['ss_mb_id']);
		unset($_SESSION['ss_media']);
		// 회원아이디 세션 생성
		$_SESSION['ss_mb_id'] = $userid;
		$_SESSION['ss_media'] = $media;

		$info = TK_GetUserCnt($userid);

		if ($info == 0){
			TK_InsertUserInfo($userid,$ip_addr,$media,$gubun);
			$flag = "Y";
		}else {
            TK_UpdateUserInfo($userid);
			$flag = "N";
		}

		echo $flag;
	break;

	case "fb_user_info" :
		$ip_addr = $_SERVER['REMOTE_ADDR'];
		$userid	= $_REQUEST['fbUserId'];
		$media = $_gl[login_media]['facebook'];

		unset($_SESSION['ss_mb_id']);
		unset($_SESSION['ss_media']);
		// 회원아이디 세션 생성
		$_SESSION['ss_mb_id'] = $userid;
		$_SESSION['ss_media'] = $media;

		$info = TK_GetUserCnt($userid);

		if ($info == 0){
			TK_InsertUserInfo($userid,$ip_addr,$media,$gubun);
			$flag = "Y";
		}else {
			TK_UpdateUserInfo($userid);
			$flag = "N";
		}

		echo $flag;
	break;

	case "update_user_share" :
		$test_idx	= $_REQUEST['test_idx'];
		$share_on = "Y";
		TK_UpdateUserShare($test_idx,$share_on);
	break;

	case "update_user_donation" :
		$userid	= $_SESSION['ss_mb_id'];
		$direct_on = "Y";
		TK_UpdateUserDonation($userid,$direct_on);     
	break;

	case "insert_test_result" :
		$selected_val	= $_REQUEST['selected_val'];
		$userid			= $_SESSION['ss_mb_id'];
		$media			= $_SESSION['ss_media'];

		//$test_cnt	= TK_GetTestUserCntInfo($userid);
/*
		if ($test_cnt >= 3)
		{
			echo "N";
		}else{
*/
			$test_point = 0;

			// 직업 선택 로직
			$worker_array	= explode("|",$selected_val);
			if ($worker_array[4]%2 == 0)
				$test_point = $test_point + 2;
			else
				$test_point = $test_point + 1;

			if ($worker_array[6]%2 == 0)
				$test_point = $test_point + 2;
			else
				$test_point = $test_point + 1;

			if ($worker_array[9]%2 == 0)
				$test_point = $test_point + 2;
			else
				$test_point = $test_point + 1;

			$selected_job	= TK_GetTestResultInfo($test_point);

			$test_result_idx = TK_InsertTestResultUserInfo($userid,$selected_val,$selected_job[idx],$media,$gubun);

			echo $selected_job[idx]."|".$test_result_idx;
		//}
	break;

	case "user_test_check" :
		$userid			= $_SESSION['ss_mb_id'];

		$test_cnt	= TK_GetTestUserCntInfo($userid);

		if ($test_cnt >= 3)
			echo "N";
		else
			echo "Y";

	break;
}

?>