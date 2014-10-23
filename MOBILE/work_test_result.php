<?
	// 설정파일
	include_once "../config.php";
	include_once "header.php";
	$user_job		= TK_GetUserJobInfo($_REQUEST[job]);

	$user_info	= TK_GetUserInfo($_SESSION['ss_mb_id']);

	$test_idx	= $_REQUEST[idx];

?>
<script>
    window.history.forward(0);
</script>
  <body>
    <div class="backLayer" style="display:none;background-color:black;position:absolute;left:0px;top:0px;z-index:999;width:100%;height:100%;"></div>      
    <div style="position:absolute;width:100%;height:100%;">
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
      <a href="#" onclick="fb_share('<?=$user_job[job]?>','<?=$user_job[job_explain]?>','<?=$test_idx?>');">페이스북 공유</a>
<?
	}else{
?>
      <a href="#" id="kakao-link-btn" onclick="kt_share('<?=$user_job[job]?>','<?=$user_job[job_explain]?>','<?=$test_idx?>');">카카오톡 공유</a>
      <a href="#" onclick="ks_share('<?=$user_job[job]?>','<?=$user_job[job_explain]?>','<?=$test_idx?>');">카카오스토리 공유</a>
<?
	}
?>
      <!-- <a href="#" onclick="show_sns_select_box('<?=$_SESSION['ss_media']?>');">공유로 기부하기</a>
      <a href="http://www.dreamfull.or.kr/app/newdf/main" onclick="go_direct_donation();" target="_blank">직접 후원하고 싶다면?</a> -->
    </div>
    <div id="email_div" class="popup_div" style="display:none;position:absolute;width:50%;height:30%;top:30%;margin-left:20%;background:gray;z-index:1000;">
      감사합니다. 공유로 기부가 완료 되셨습니다.<br />
      캠페인 결과와 강연회 소식을 이메일로 알려드립니다.<br />
      <input type="text" name="email1" id="email1"> @ 
      <input type="text" name="email2" id="email2">
      <select name="sel_email" onchange="input_email(this.value)">
        <option value="">직접입력</option>
        <option value="gmail.com">gmail.com</option>
        <option value="hanmail.net">hanmail.net</option>
        <option value="hitel.net">hitel.net</option>
        <option value="hotmail.com">hotmail.com</option>
        <option value="korea.com">korea.com</option>
        <option value="nate.com">nate.com</option>
        <option value="naver.com">naver.com</option>
        <option value="outlook.com">outlook.com</option>
      </select>
      <input type="button" value="확인" onclick="update_user_email();">
    </div>
    <div id="donation_div" class="popup_div" style="display:none;position:absolute;width:50%;height:30%;top:30%;margin-left:20%;background:gray;z-index:1000;">
        아이들을 2배 더 후원하고 싶은 분은<br />
        아래 직접 기부하기에도 참여해보세요!<br />
        <a href="#" onclick="go_direct_donation('<?=$test_idx?>');">직접 기부하기</a>
    </div>
    </div>
  </body>
</html>
<script type="text/javascript">
	$(window).resize(function(){
        var width = $(window).width();
        var height = $(window).height();
        $(".backLayer").width(width).height(height);
    });
    $(document).keydown(function(event){
        if(event.which=='27'){
        $(".popup_div").fadeOut(500);
        $(".backLayer").fadeOut(500);
        }
    });
    $(document).ready(function(){
    $(".backLayer").click(function(){
        $(".backLayer").fadeOut(500);
        $(".popup_div").fadeOut(500);
    });
    });
</script>