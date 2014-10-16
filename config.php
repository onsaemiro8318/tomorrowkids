<?
	session_start();
    
	//환경설정 파일
	include_once "include/global.php"; 		//변수정보
	include_once "include/function.php"; 			//함수정보
	include_once "include/dbi.php"; 				//DB 연결정보

	mysqli_query ($my_db,"set names utf8");


?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-55803245-1', 'auto');
  ga('send', 'pageview');

</script>