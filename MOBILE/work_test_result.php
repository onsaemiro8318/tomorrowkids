<?
	// 설정파일
	include_once "../config.php";
	include_once "header.php";
	$user_job		= TK_GetUserJobInfo($_REQUEST[job]);

	$user_info	= TK_GetUserInfo($_SESSION['ss_mb_id']);

	$test_idx	= $_REQUEST[idx];

	$thumb = new Image("images/result_img1.jpg");
	$thumb->width(200);
	$thumb->save();

	//print_r($thumb);
?>
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
<body>
<div class="mob_sub_wrapper">
    <div class="mob_sub_top1">
	    <h1><a href="http://www.dreamfull.or.kr/" target="_blank"><img src="images/logo.png"/></a></h1>
        <div>
        	<div class="tmor_text fl_left"><a href="http://www.tomorrowkids.or.kr/"><img src="images/page_title.png"/></a></div>
            <div class="mob_sub_number fl_right">
                <div class="peopletitle">현재 참여자</div>
                <div class="numberbox">
                	<ul>
                        <li>1</li>
                        <li class="number2">0</li>
                        <li class="number3">0</li>
                        <li class="number4">0</li>
               		</ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mob_sub_top3">
	    <p class="blue">STEP 2</p>
        <p class="white">내일 (Work) 공유로 기부하기</p>
	    <div class="top3_content">
    	    <div class="imgbox">작업 이미지</div>
            <div>
                <div class="fl_left arrow"><img src="images/rihgt_arrowicon.png"/></div>
                <div class="bluetext">당신의 내일(Work) 테스트 결과입니다.</div>
            </div>
		    <div class="title_work">“<?=$user_job[job];?>”</div>
            <div class="summary"><?=$user_job[job_explain];?></div>
        </div>
        <div class="summary2">
세상에는 이처럼 당신이 하고 있는 일, 상상치도 못했던
다양한 내 일(Work) 이 많이 있답니다.
빈곤한 환경으로 이런 일이 있다는 것 조차 모른 채 제한된
꿈을 꾸는 아이들을 도와주세요.
당신의 내일(Work) 결과를 SNS에 공유하시면,
아이들의 내일(Tomorrow)을 위한 기부로 이어집니다.
        </div>
<?
	if ($user_info[media] == $_gl[login_media]['facebook'])
	{
?>    
        <div class="face_dt_button"><a href="#" onclick="fb_share('<?=$user_job[job]?>','<?=$user_job[job_explain]?>','<?=$test_idx?>');"><img src="images/facebook_mobbut_1.png"/></a></div>
<?
	}else{
?>
        <div class="kakaotalk_dt_button"><a href="#" id="kakao-link-btn" onclick="kt_share('<?=$user_job[job]?>','<?=$user_job[job_explain]?>','<?=$test_idx?>');"><img src="images/kakaotalk_mobbut_1.png"/></a></div>
        <div class="kakaostory_dt_button"><a href="#" onclick="ks_share('<?=$user_job[job]?>','<?=$user_job[job_explain]?>','<?=$test_idx?>');"><img src="images/kakaostory_mobbut_1.png"/></a></div>
<?
	}
?>    
    </div>
    <div class="footer_bggry">
<?
	include_once "footer.php";
?>
    </div>
</div>
<!--mail box-->
<div id="email_div" class="thankspupup">
	<div class="closeicon"><a href="javascript:close_popup();"><img src="images/popup_closeicon.png"/></a></div>
    <div class="bigtext">감사합니다<span>!</span></div>
    <div class="smtext">공유로 기부가 완료되셨습니다.<br/>
캠페인 결과와 강연회 소식을 이메일로<br/>
알려드립니다’
    </div>
    <div class="mailbox hidden">
        <div class="mail_inputbox fl_left">
			<input type="text" name="email1" id="email1" class="input" onfocus="this.value=''; return true" value="">
        </div>
        <div class="fl_left mail_ic"><img src="images/mail_icong.png"/></div>
        <div class="mail_inputbox fl_left">
			<input type="text" name="email2" id="email2" class="input" onfocus="this.value=''; return true" value="직접입력">
        </div>
    </div>
    <div class="provbox hidden">
        <div class="fl_left"><input type="checkbox" class="checkbox" id="chk_privacy" checked /></div>
            <ul>
                <li class="fi">개인정보동의<span>/</span></li>
                <li class="ti"><a href="#" onclick="show_term();">개인정보이용약관</a></li>
            </ul>
        </div>
        <div class="summitbut"><a href="#" onclick="update_user_email();"><img src="images/summit_but.png"/></a></div>
        </div>
    </div>
</div>
<!--thanks box-->
<div id="donation_div" class="thankspupup">
	<div class="closeicon"><a href="javascript:close_popup2();"><img src="images/popup_closeicon.png"/></a></div>
    <div class="bigtext"><img src="images/h_iconpopup.jpg"/></div>
    <div class="smtext">아이들을 <span class="smtext_in">2배</span> 더<br/>
후원하고 싶은 분은<br/>
아래 직접 기부하기에도<br/>
참여해보세요! 
    </div>
    <div class="summitbut"><a href="#" onclick="go_direct_donation('<?=$test_idx?>');"><img src="images/donation_but.jpg"/></a></div>
</div>
<!--privacy box-->
<div id="privacy_term" class="thankspupup" style="top:400px">
    <div class="closeicon"><a href="javascript:close_popup3();"><img src="images/popup_closeicon.png"/></a></div>
    <div class="smtext" style="margin-top:50px">사단법인 부스러기사랑나눔회 귀하</div>
    <div class="provbox hidden">
      <p>본인은 귀단체가 본인 및 기타 적합한 경로를 통해 수집한 본인의 개인정보를 활용하는데 동의합니다.</p>
      <p>1. 수집하는 개인정보의 항목 : 이메일 주소</p>
      <p>2. 개인정보 수집.이용목적 : 드림풀 캠페인 정보 알림</p>
      <p>3. 개인정보 보유.이용기간 : 캠페인 종료일로부터 1년간 보관됩니다.</p>
    </div>
</div>

<div class="mask"></div>
</body>
</html>
<script type="text/javascript">

	$(window).resize(function(){
        var width = $(window).width();
        var height = $(window).height();
        $(".mask").width(width).height(height);
    });
    $(document).keydown(function(event){
        if(event.which=='27'){
        $(".thankspupup").fadeOut(500);
        $(".mask").fadeOut(500);
        }
    });
    $(document).ready(function(){
    $(".backLayer").click(function(){
        $(".mask").fadeOut(500);
        $(".thankspupup").fadeOut(500);
    });
    });

	function show_term()
	{
		$("#privacy_term").show();
	}

</script>