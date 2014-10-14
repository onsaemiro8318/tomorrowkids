<?
	//환경설정 파일
	include_once "include/global.php"; 		//변수정보
	include_once "include/function.php"; 			//함수정보
	include_once "include/dbi.php"; 				//DB 연결정보

	//DB 연결
	$dbi_tk = new CDbi();
	$dbi_tk->connectDB_tk();

?>