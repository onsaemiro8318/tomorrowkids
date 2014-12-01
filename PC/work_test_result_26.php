<?
	// 설정파일
	include_once "../config.php";
	//include_once "header.php";

	if ( isset($_SESSION['ss_mb_id']) == false && $_SERVER['REMOTE_ADDR'] != "127.0.0.1" ) {
		header('Location: index.php'); 
		exit; 
	}

 	$job_idx = "26";
	$user_job	= TK_GetUserJobInfo($job_idx);

	$user_info	= TK_GetUserInfo($_SESSION['ss_mb_id']);

	$test_idx	= $_REQUEST['idx'];

	$t_count1 = substr($total_count,0,1);
	$t_count2 = substr($total_count,1,1);
	$t_count3 = substr($total_count,2,1);
	$t_count4 = substr($total_count,3,1);
	$t_count5 = substr($total_count,4,1);


	$job_imgurl	= "http://www.tomorrowkids.or.kr/images/jobimg_".$job_idx.".jpg";
	//$job_imgurl	= "http://www.tomorrowkids.or.kr/images/jobimg_2.jpg";
	$job_imgurl_kakao	= $_gl['kakao_img'][$job_idx];
?><html>
  <head>
    <title>내일을부탁해 - 드림풀 매칭그랜트 캠페인</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta property="og:title" content="내일을 부탁해">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.tomorrowkids.or.kr/PC/work_test_result_26.php" />
    <meta property="og:image" content="http://www.tomorrowkids.or.kr/images/fb/jobimg_26.jpg" />
    <meta property="og:description" content="어릴 적 당신이 지녔던 '그 마음'을 팝니다">
    <link rel="shortcut icon" type="image/x-icon" href="./images/tomorrow.ico" />
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script type='text/javascript' src='../js/jquery-1.11.0.min.js'></script>
    <!-- <script type="text/javascript" src="../js/custom.js"></script> -->
    <script type='text/javascript' src='../js/tk2.js'></script>
    <script type='text/javascript' src='../js/googleAnalytics.js'></script>
    <script type="text/javascript" src="http://www.youtube.com/player_api"></script>

	<script type="text/javascript">


		window.history.forward(0);

		function close_popup()
		{
			$("#email_div").fadeOut(500);
			$(".mask").fadeOut(500);
		}

		function close_popup2()
		{
			$("#donation_div").fadeOut(500);
			$(".mask").fadeOut(500);
		}

		function close_popup3()
		{
			$("#privacy_term").fadeOut(500);
		}

	</script>
  </head>

<body>
<div class="main_wrapper">
<!--Line1 start-->
  <div class="main_top1">
    <div class="subtopinbg1">
      <h1><a href="http://www.dreamfull.or.kr" target="_blank"><img src="images/logo.png" alt="dreamfull"/></a></h1>
      <div class="fl_left tomrlogo"><a href="index.php"><img src="images/tomrr_logo.png"/></a></div>
      <div class="fl_right sub_toprite">
        <span class="toptext">10,000명의 내일이 모이면<br/>아이들의 내일을 위해<br/>5천만원이 기부됩니다.</span>
        <div class="number_sub">
          <ul>
            <li><?=$t_count1?></li>
            <li class="number2"><?=$t_count2?></li>
            <li class="number3"><?=$t_count3?></li>
            <li class="number4"><?=$t_count4?></li>
            <li class="number5"><?=$t_count5?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
<!--Line1 end-->
<!--Line2 start-->
<div class="sub_top2">
  <div class="sub_top2in">
    <p class="bluetext">STEP2</p>
    <p class="whitetext">내일 (Work) 공유로 기부하기</p>
    <div class="result_box"><div class="bluebox_result fl_left"><img src="<?=$job_imgurl?>"/></div>
    <div class="fl_left">
      <div class="re_text">당신의 내일(Work) 테스트 결과입니다.</div>
      <div class="resulttwotext" style="width:460px;height:230px">
        <p class="big">"<?=$user_job['job'];?>"</p>
        <p class="sm"><?=$user_job['job_explain'];?></p>
      </div>
    </div>
  </div>
  <div class="undertext">세상에는 이처럼 당신이 하고 있는 일, 상상치도 못했던 다양한 내 일(Work) 이 많이 있답니다.<br/>
빈곤한 환경으로 이런 일이 있다는 것 조차 모른 채 제한된 꿈을 꾸는 아이들을 도와주세요.<br/>
당신의 내일(Work) 결과를 SNS에 공유하시면, 아이들의 내일(Tomorrow)을 위한 기부로 이어집니다.</div>
  <div class="facebookbut">
    <a href="#" onclick="fb_share('<?=$user_job['job']?>','<?=$user_job['job_explain']?>','<?=$test_idx?>','<?=$job_idx?>');return false;"><img src="images/facebook_sub.png" style="margin-right:10px"/></a>
    <a href="#" onclick="ks_share('<?=$user_job['job']?>','<?=$user_job['job_explain']?>','<?=$test_idx?>','<?=$job_imgurl_kakao?>');return false;"><img src="images/ks_sub.png"/></a>
  </div>
<div class="popupbg1" id="email_div">
  <div class="closeic"><a href="#" onclick="close_email();"><img src="images/close_icon.gif"/></a></div>
  <div class="mailboxw hidden">
    <div class="fl_left mailbox">
      <form action="" method="post">
        <input type="text" class="inputw" onfocus="this.value=''; return true" value="" name="email1" id="email1">
      </form>
    </div>
    <div class="fl_left mailcion"><img src="images/mail_icon.gif"/></div>
    <div class="fl_left mailbox">
      <form action="" method="post">
        <input type="text" class="inputw" onfocus="this.value=''; return true" value="직접입력" name="email2" id="email2">
      </form>
    </div>
    <div class="selectbox fl_left">
      <select name="sel_email" onchange="input_email(this.value)">
        <option>직접입력</option>
        <option value="gmail.com">gmail.com</option>
        <option value="hanmail.net">hanmail.net</option>
        <option value="hitel.net">hitel.net</option>
        <option value="hotmail.com">hotmail.com</option>
        <option value="korea.com">korea.com</option>
        <option value="nate.com">nate.com</option>
        <option value="naver.com">naver.com</option>
        <option value="outlook.com">outlook.com</option>
      </select>
    </div>
    <div class="provboxw hidden">
      <div class="fl_left"><input type="checkbox" class="checkboxw" id="chk_privacy" checked /></div>
      <ul>
        <li class="fi">개인정보동의<span>/</span></li>
        <li class="ti"><a href="#" onclick="show_term();return false;">개인정보이용약관</a></li>
      </ul>
    </div>
  <div class="summitbt"><a href="#" onclick="update_user_email();return false;"><img src="images/pu_summitbut.jpg"/></a></div>
  </div>
</div>

<div class="popupbg2" id="donation_div">
  <div class="closeic"><a href="javascript:close_popup2()"><img src="images/close_icon.gif"/></a></div>
  <div class="donationbt"><a href="#" onclick="go_direct_donation('<?=$test_idx?>','<?=$gubun?>');return false;"><img src="images/donation_pbut.jpg"/></a></div>
</div>

<div class="popupbg3" id="privacy_term">
  <div class="closeic"><a href="javascript:close_popup3()"><img src="images/close_icon.gif"/></a></div>
  <!-- <div class="privacybt" style="width:400px;padding-top:80px"> -->
  <div class="privacy_content">
    <p class="privacy_title">개인정보약관</p>
    <p>본인은 귀단체가 본인 및 기타 적합한 경로를 통해 수집한 본인의 개인정보를 활용하는데 동의합니다.</p>
    <p>1. 수집하는 개인정보의 항목 : 이메일 주소</p>
    <p>2. 개인정보 수집.이용목적 : 드림풀 캠페인 정보 알림</p>
    <p>3. 개인정보 보유.이용기간 : 캠페인 종료일로부터 1년간 보관됩니다.</p>
  </div>
</div>
    </div>
</div>
<!--Line2 end-->
<!--Line3 start-->
<div class="main_top3">
<!--Footer start-->
<?
	include_once "footer.php";
?>
<!--Footer end-->
</div>
<!--Line3 end-->
</div>

<div class="mask"></div>
<!-- <div id="schemeFileDiv"></div> -->
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
    $(".mask").click(function(){
        $(".mask").fadeOut(500);
        $(".popupbg1").fadeOut(500);
        $(".popupbg2").fadeOut(500);
    });
	//fncSelectFile();


    });

window.fbAsyncInit = function() {
	FB.init({
		appId      : '293604627507652',
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.2' // use version 2.1
	});
};

// Load the SDK asynchronously
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/ko_KR/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


/*
	function fncSelectFile(){

		document.getElementById("schemeFileDiv").innerHTML = "<input type='file' name='file-input' id='file-input' value='<?=$job_imgurl?>'>";		
		$("#file-input").click();
		
	 }
*/
	function show_term()
	{
		$("#privacy_term").show();
	}
</script>