<?php
include_once "../config.php";

switch ($_REQUEST['exec'])
{

	case "ka_user_info" :
        $ip_addr = $_SERVER['REMOTE_ADDR'];
        $userid	= $_REQUEST['kaUserId'];
        $media = "kakao";
        // 유저 정보 체크
        $query 		= "SELECT * FROM users WHERE user_id = '".$userid."'";
        $result 	= mysqli_query($my_db, $query);
    	$data = mysqli_num_rows($result);
    	if ($data == 0){
    		$query = "insert into users (user_id, ip_addr, created_at, updated_at, media) values ('".$userid."','".$ip_addr."',now(),now(),'".$media."')";
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
        // 유저 정보 체크
        $query 		= "SELECT * FROM users WHERE user_id = '".$userid."'";
        $result 	= mysqli_query($my_db, $query);
    	$data = mysqli_num_rows($result);
    	if ($data == 0){
    		$query = "insert into users (user_id, ip_addr, created_at, updated_at, media) values ('".$userid."','".$ip_addr."',now(),now(),'".$media."')";
    		$result = mysqli_query($my_db, $query);
            $flag = "Y";
    	}else {
            $flag = "N";
    	}
        echo $flag;
    break;

	case "insert_test_result" :
	
	break;

}

?>