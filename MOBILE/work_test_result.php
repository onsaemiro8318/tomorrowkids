<?
	// 설정파일
	include_once "../config.php";
	include_once "header.php";
	$user_job		= TK_GetUserJobInfo($_REQUEST[job]);
?>
  <body>
    <div style="position:absolute;">
    <div style="position:top;width:100%;height:60px;background:green">
      <a href="index.php">내일을 부탁해</a>
      <p><?=number_format($total_count)?>명의 내일(work)이 아이들의 내일(tomorrow)이 되고 있습니다.</p>
    </div>
    <div style="position:top;width:100%;height:110px;background:skyblue;">
      <h1>STEP2. 내일(work) 공유로 기부하기</h1>
      <p>당신의 내일(work) 테스트 결과 입니다.</p>
    </div>
    <div style="position:relative;width:100%;height:300px;background:orange;" id="test_result_div">
<?=$user_job[job];?>
<br />
------------------------------------------------------------------------------
<br />
<?=$user_job[job_explain];?>
    </div>
    <div style="position:top;width:100%;height:200px;background:skyblue;">
      <p>세상에는 이처럼 당신이 하고 있는 일, 상상치도 못했던 다양한 내 일(work)이 많이 있답니다.
         빈곤한 환경으로 이런 일이 있다는 것 조차 모른 채 제한된 꿈을 꾸는 아이들을 도와주세요.
         당신의 내일(work) 결과를 SNS에 공유하시면, 아이들의 내일(Tomorrow)을 위한 기부로 이어집니다.
      </p>
<?
	if ($user_info[media] == $_gl[login_media]['facebook'])
	{
?>
      <a href="#" onclick="fb_share('<?=$user_job[job]?>','<?=$user_job[job_explain]?>');">페이스북 공유</a>
<?
	}else{
?>
      <a href="#" id="kakao-link-btn" onclick="kt_share('<?=$user_job[job]?>','<?=$user_job[job_explain]?>');">카카오톡 공유</a>
      <a href="#" onclick="ks_share('<?=$user_job[job]?>','<?=$user_job[job_explain]?>');">카카오스토리 공유</a>
<?
	}
?>
      <!-- <a href="#" onclick="show_sns_select_box('<?=$_SESSION['ss_media']?>');">공유로 기부하기</a>
      <a href="http://www.dreamfull.or.kr/app/newdf/main" onclick="go_direct_donation();" target="_blank">직접 후원하고 싶다면?</a> -->
    </div>
    </div>
  </body>
</html>