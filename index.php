<?
	include_once "config.php";


	unset($media);
	$media = $_REQUEST[media];

	TK_InsertTrackingInfo($media, $gubun);

	if($check_mobile)
	{
		Header("Location:http://www.tomorrowkids.or.kr/MOBILE/");
		exit;
	}else{
		Header("Location:http://www.tomorrowkids.or.kr/PC/");
		exit;
	}

?>
