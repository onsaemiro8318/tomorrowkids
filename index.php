<?
	include_once "config.php";


	unset($media);
	$media		= $_REQUEST['media'];
	$job_idx	= $_REQUEST['job_idx'];

	TK_InsertTrackingInfo($media, $gubun);

	if ( isset($job_idx) == false)
		$job_idx = "1";

	if($check_mobile)
	{
		Header("Location:http://www.tomorrowkids.or.kr/MOBILE/index_".$job_idx.".php");
		exit;
	}else{
		Header("Location:http://www.tomorrowkids.or.kr/PC/index_".$job_idx.".php");
		exit;
	}

?>
