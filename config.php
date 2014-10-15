<?
	session_start();
	//환경설정 파일
	include_once "include/global.php"; 		//변수정보
	include_once "include/function.php"; 			//함수정보
	include_once "include/dbi.php"; 				//DB 연결정보

	$mobile_agent = array("Iphone","Ipod","Android","Blackberry","SymbianOS|SCH-M\d+","Opera Mini", "Windows ce", "Nokia", "sony" );
	$check_mobile = false;
	for($i=0; $i<sizeof($mobile_agent); $i++){
		if(stripos( $_SERVER['HTTP_USER_AGENT'], $mobile_agent[$i] )){
			$check_mobile = true;
			break;
		}
	}
	if($check_mobile)
	{
		Header("Location:http://www.tomorrowkids.or.kr/MOBILE/");
		exit;
	}else{
		Header("Location:http://www.tomorrowkids.or.kr/PC/");
		exit;
	}

?>