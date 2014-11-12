<?php
include_once "config_test.php";

switch ($_REQUEST['exec'])
{
    case "update_user_email" :
		$email		= $_REQUEST['email'];
		$userid		= $_SESSION['ss_mb_id'];
		TK_UpdateUserEmail($userid,$email); 
        
    break;
    
	case "ka_user_info" :
		$ip_addr = $_SERVER['REMOTE_ADDR'];
		$userid	= $_REQUEST['kaUserId'];
		$media = $_gl['login_media']['kakao'];
        $user_img = $_REQUEST['kaUserImage'];
        $user_name = $_REQUEST['kaNickname'];
        
		unset($_SESSION['ss_mb_id']);
		unset($_SESSION['ss_media']);
		// 회원아이디 세션 생성
		$_SESSION['ss_mb_id'] = $userid;
		$_SESSION['ss_media'] = $media;

		$info = TK_GetUserCnt($userid);

		if ($info == 0){
			TK_InsertUserInfo($userid,$ip_addr,$media,$gubun,$user_img,$user_name);
			$flag = "Y";
		}else {
            TK_UpdateUserInfo($userid,$user_img,$user_name);
			$flag = "N";
		}

		echo $flag;
	break;

	case "fb_user_info" :
		$ip_addr = $_SERVER['REMOTE_ADDR'];
		$userid	= $_REQUEST['fbUserId'];
		$media = $_gl['login_media']['facebook'];
        $user_img = $_REQUEST['fbUserImage'];
        $user_name = "";

		unset($_SESSION['ss_mb_id']);
		unset($_SESSION['ss_media']);
		// 회원아이디 세션 생성
		$_SESSION['ss_mb_id'] = $userid;
		$_SESSION['ss_media'] = $media;

		$info = TK_GetUserCnt($userid);

		if ($info == 0){
			TK_InsertUserInfo($userid,$ip_addr,$media,$gubun,$user_img,$user_name);
			$flag = "Y";
		}else {
			TK_UpdateUserInfo($userid,$user_img,$user_name);
			$flag = "N";
		}

		echo $flag;
	break;

	case "insert_user_info" :
		$ip_addr = $_SERVER['REMOTE_ADDR'];
		$userid	= mt_rand(100000000, 999999999);;

		unset($_SESSION['ss_mb_id']);

		$info = TK_GetUserCnt($userid);

		if ($info > 0){
			$userid	= mt_rand(100000000, 999999999);;
		}

		// 회원아이디 세션 생성
		$_SESSION['ss_mb_id'] = $userid;

		TK_InsertUserInfo($userid,$ip_addr,$gubun);

		echo $flag;

	break;
	case "update_user_share" :
		$test_idx	= $_REQUEST['test_idx'];
		$share_gubun	= $_REQUEST['share_gubun'];
		$share_on = "Y";
		TK_UpdateUserShare($test_idx,$share_on,$share_gubun);
	break;

	case "update_user_donation" :
		$test_idx	= $_REQUEST['test_idx'];
		$direct_on = "Y";
		TK_UpdateUserDonation($test_idx,$direct_on);     
	break;

	case "insert_test_result" :
		$selected_val	= $_REQUEST['selected_val'];
		$userid			= $_SESSION['ss_mb_id'];

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
			if ($worker_array[0]%2 == 0)
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

			$test_result_idx = TK_InsertTestResultUserInfo($userid,$selected_val,$selected_job['idx'],$gubun);

			echo $selected_job['idx']."|".$test_result_idx;
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