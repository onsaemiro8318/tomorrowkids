<?php
include_once "../config.php";

switch ($_REQUEST['exec'])
{

	case "ka_user_info" :
        $ip_addr = $_SERVER['REMOTE_ADDR'];
        $userid	= $_REQUEST['kaUserId'];
        $media = "kakao";

		// 회원아이디 세션 생성
		$_SESSION['ss_mb_id'] = $userid;
		$_SESSION['ss_media'] = $media;

        // 유저 정보 체크
        $query 		= "SELECT * FROM tk_member WHERE user_id = '".$userid."'";
        $result 	= mysqli_query($my_db, $query);
    	$data = mysqli_num_rows($result);
    	if ($data == 0){
    		$query = "insert into tk_member (user_id, ip_addr, created_at, updated_at, media) values ('".$userid."','".$ip_addr."',now(),now(),'".$media."')";
    		$result = mysqli_query($my_db, $query);
            $flag = "Y";
    	}else {
            $flag = "N";
    	}
        echo $flag;
    break;

	case "fb_user_info" :
        $ip_addr = $_SERVER['REMOTE_ADDR'];
        $userid	= $_REQUEST['fbUserId'];
        $media = "facebook";

		// 회원아이디 세션 생성
		$_SESSION['ss_mb_id'] = $userid;
		$_SESSION['ss_media'] = $media;

        // 유저 정보 체크
        $query 		= "SELECT * FROM tk_member WHERE user_id = '".$userid."'";
        $result 	= mysqli_query($my_db, $query);
    	$data = mysqli_num_rows($result);
    	if ($data == 0){
    		$query = "insert into tk_member (user_id, ip_addr, created_at, updated_at, media) values ('".$userid."','".$ip_addr."',now(),now(),'".$media."')";
    		$result = mysqli_query($my_db, $query);
            $flag = "Y";
    	}else {
            $flag = "N";
    	}
        echo $flag;
    break;

	case "insert_test_result" :
		$selected_val	= $_REQUEST['selected_val'];
		$userid			= $_SESSION['ss_mb_id'];
		$media			= $_SESSION['ss_media'];

		$query		= "SELECT * FROM ".$_gl[tk_test_result_table]." WHERE user_id = '".$userid."'";
		$result		= mysqli_query($my_db, $query);
		$test_cnt	= mysqli_num_rows($result);

		if ($test_cnt >= 3)
		{
			echo "N";
		}else{
			$query = "insert into ".$_gl[tk_test_result_table]." (user_id, answer, media, ip_addr, regdate) values ('".$userid."','".$selected_val."','".$media."','".$_SERVER['REMOTE_ADDR']."',now())";
			$result = mysqli_query($my_db, $query);
			echo "Y";
		}
	break;
}

?>