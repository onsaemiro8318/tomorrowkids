<?
	// 설정파일
	include_once "../config.php";
	include_once "header.php";
	$user_job	= TK_GetUserJobInfo($_REQUEST[job]);

	$user_info	= TK_GetUserInfo($_SESSION['ss_mb_id']);

	$test_idx	= $_REQUEST[idx];

?>
?>
<script>
    window.history.forward(0);
</script>
<body>
<div class="main_wrapper">
<!--Line1 start-->
<div class="main_top1">
	<div class="subtopinbg1">
    	<h1><a href=""><img src="images/logo.png" alt="dreamfull"/></a></h1>
        <div class="fl_right sub_toprite">
        	<span class="toptext">1,000명의 내일이 모이면<br/>아이들의 내일을 위한<br/>특별 강연회가 열립니다!</span>
            <div class="number_sub">
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
<!--Line1 end-->
<!--Line2 start-->
<div class="sub_top2">
	<div class="sub_top2in">
    	<p class="bluetext">STEP2</p>
        <p class="whitetext">내일 (Work) 공유로 기부하기</p>
        <div class="result_box"><div class="bluebox_result fl_left"><img src="images/result_img1.jpg"/></div>
        	 <div class="fl_left">
        		<div class="re_text">당신의 내일(Work) 테스트 결과입니다.</div>
                <div class="resulttwotext">
                	<p class="big">"<?=$user_job[job];?>"</p>
                    <p class="sm"><?=$user_job[job_explain];?></p>
                </div>
      		 </div>
        </div>
        <div class="undertext">세상에는 이처럼 당신이 하고 있는 일, 상상치도 못했던 다양한 내 일(Work) 이 많이 있답니다.<br/>
빈곤한 환경으로 이런 일이 있다는 것 조차 모른 채 제한된 꿈을 꾸는 아이들을 도와주세요.<br/>
당신의 내일(Work) 결과를 SNS에 공유하시면, 아이들의 내일(Tomorrow)을 위한 기부로 이어집니다.</div>
<?
	if ($user_info[media] == $_gl[login_media]['facebook'])
	{
?>
	<div class="facebookbut"><a href="#" onclick="fb_share('<?=$user_job[job]?>','<?=$user_job[job_explain]?>','<?=$test_idx?>');"><img src="images/facebook_sub.png"/></a></div>
<?
	}else{
?>
	<div class="kakaostorybut"><a href="#" onclick="ks_share('<?=$user_job[job]?>','<?=$user_job[job_explain]?>','<?=$test_idx?>');"><img src="images/facebook_sub.png"/></a></div>
<?
	}
?>
    </div>
</div>
<!--Line2 end-->
<!--Line3 start-->
<div class="main_top3">
<!--Footer start-->
<div class="footer">
	<div class="lineone"><div class="img"><img src="images/footer_line1_text.png"/></div></div>
    <div class="linetwo">
    	<div class="inbox"><span class="fl_left"><img src="images/footer_line2_text.png"/></span><span class="fl_right"><img src="images/footer_line2_logo.png"/></span></div>
    </div>
</div>
<!--Footer end-->
</div>
<!--Line3 end-->
</div>
<div class="mask"></div>
</body>
</html>
