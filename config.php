<?
	session_start();
    
	//환경설정 파일
	include_once "include/global.php"; 			//변수정보
	include_once "include/function.php"; 		//함수정보
	include_once "include/dbi.php"; 			//DB 연결정보
	include_once "include/page.class.php"; 			//DB 연결정보

	mysqli_query ($my_db,"set names utf8");

	$mobile_agent = array("Iphone","Ipod","Android","Blackberry","SymbianOS|SCH-M\d+","Opera Mini", "Windows ce", "Nokia", "sony" );
	$check_mobile = false;
	for($i=0; $i<sizeof($mobile_agent); $i++){
		if(stripos( $_SERVER['HTTP_USER_AGENT'], $mobile_agent[$i] )){
			$check_mobile = true;
			break;
		}
	}
	if($check_mobile)
		$gubun = "MOBILE";
	else
		$gubun = "PC";

	//if ($_SERVER['REMOTE_ADDR'] != "61.40.46.36")
	//	exit;


	$total_count	= TK_GetTestTotalCount();

?>
