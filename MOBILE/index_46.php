<?
	// 설정파일
	include_once "../config.php";
	//include_once "header.php";

	session_destroy();

	$t_count1 = substr($total_count,0,1);
	$t_count2 = substr($total_count,1,1);
	$t_count3 = substr($total_count,2,1);
	$t_count4 = substr($total_count,3,1);
	$t_count5 = substr($total_count,4,1);

	$left_per	= ($total_count / 10000) * 100;
	$right_per	= 100 - $left_per - 1.3;

	$iPod = stripos($_SERVER['HTTP_USER_AGENT'], "iPod");
	$iPhone = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
	$iPad = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
	$Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
?>
<html>
  <head>
    <title>내일을부탁해 - 드림풀 매칭그랜트 캠페인</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0"/>
    <meta property="og:title" content="나는 놀이 디자이너!! 당신에게 어울리는 직업은?">
    <meta property="og:type" content="website" />
    <!-- <meta property="og:url" content="http://www.tomorrowkids.or.kr/PC/work_test_result_1.php" /> -->
    <meta property="og:image" content="http://www.tomorrowkids.or.kr/images/fb/jobbigimg_46.jpg" />
    <meta property="og:description" content="당신은 내일을 꿈꾸며 살아가고 있습니다. 당신에게 어울리는 직업을 찾아보세요!">
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script type='text/javascript' src='../js/jquery-1.11.0.min.js'></script>
    <!-- <script type="text/javascript" src="../js/custom.js"></script> -->
    <script type='text/javascript' src='../js/tk.js'></script>
    <script type='text/javascript' src='../js/googleAnalytics.js'></script>
    <script type='text/javascript' src='../js/kakao.link.js'></script>
    <script type="text/javascript" src="http://www.youtube.com/player_api"></script>

    <script type='text/javascript'>
	// 유튜브 반복 재생
	var controllable_player,start, 
	statechange = function(e){
		if(e.data === 0){controllable_player.seekTo(0); controllable_player.playVideo()}

	};
	function onYouTubeIframeAPIReady() {
	controllable_player = new YT.Player('ytplayer', {events: {'onStateChange': statechange}}); 
	}

	if(window.opera){
	addEventListener('load', onYouTubeIframeAPIReady, false);
	}
	setTimeout(function(){
		if (typeof(controllable_player) == 'undefined'){
			onYouTubeIframeAPIReady();
		}
	}, 3000)

	$(window).resize(function(){
		var width = $(window).width();
		//var height = $(window).height();

		var youtube_height = (width / 16) * 9;
		$("#ytplayer").height(youtube_height);
	});

	$(document).ready(function(){
		$(".greenco_left").css("width","<?=$left_per?>%");
		$(".greenco_right").css("width","<?=$right_per?>%");
		$(".peopleic").css("left","<?=$left_per?>%");
		facebook_logout();
	});

    </script>
  </head>

<body>
	<div class="mob_top1box">
        <div class="content"><div><h1><a href="http://www.dreamfull.or.kr/" target="_blank"><img src="images/logo.png"/></a></h1></div>
        	<!--<div class="text1_cont"><img src="images/mob_top1_text1.png"/></div>
            <div class="text2_cont"><img src="images/page_title.png"/></div>-->
            <div class="sum_text"><!-- 약 100만 명의 우리 아이들이 빈곤한 환경 탓에
기쁨과 성취를 얻을 수 있는 다양한 일이 있다는 것을 몰라
내일을 꿈꾸지 못하고 있다는 사실, 알고 계셨나요?
<p class="bold">당신이 도전할만한 특별한 내일(work)을 확인하시면,
내일(work)이 모여 아이들의 내일(Tomorrow)이 만들어집니다.</p> -->
            </div>
            <!--<div class="top1_mobbotbg"><img src="images/top_1bg_img.png"/></div>-->
        </div>
      	<div class="testbox">
          <div class="facebook_but"><a href="#" onclick="test_start();"><img src="images/test_bt_mobile.png"/></a></div>
        </div>
<?
	if($Android)
	{
?>
        <p style="text-align:center;font-family: 'Malgun Gothic','돋움',Dotum,AppleGothic,Arial,sans-serif;font-size:12px;margin-top:5px">페이스북 오류시 크롬, 사파리<br /> 브라우저에서 참여해주세요.</p>
<?
	}
?>

    </div>
    <!--Line2 start-->
    <div class="main_top2">
    	<div class="main_topin2">
        <p class="text_data"><span class="f_text">10,000명의 내일이 모이면</span><br/><span class="t_text">아이들의 내일을 위해 5천만원</span><span class="f_text">이<br/>기부됩니다.</span></p>
        <div class="gr_box">
        	<div class="greenco_left fl_left"></div><div class="greenco_right fl_left"><div class="peopleic"><img src="images/gr_peopleicon_mob.png"/></div></div><div class="minic"><img src="images/gr_15min_mob.png"/></div>
            <div class="line_number_mob">
            	<ul>
                	<li class="three"><img src="images/gr_number_line_mob300.png"/></li>
                    <li class="seven"><img src="images/gr_number_line_mob700.png"/></li>
                    <li class="ten"><img src="images/gr_number_line_mob1000.png"/></li>
                </ul>
            </div>
        </div>
        <div class="number_boxwr hidden">
        	<div class="fl_left peoplenumber">현재 참여자수</div>
            <div class="number_box_mob fl_left">
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
        <div class="youtubebox">
          <iframe id="ytplayer" width="100%" src="<?=$_gl['youtube_url']?>" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <!--Line2 end-->
    <div class="mob_top3box">
        <div class="step_box_mob"><img src="images/step_mob.png"/></div>
        <div class="event"><img src="images/event_img.png"/></div>
        <div class="so_butbox">
            <div class="donation_but"><a href="http://dreamfull.mobilefarms.com/?link=by6och9o" target="_blank"><img src="images/bt_01.png"/></a></div>
        </div>
<?
	include_once "footer.php";
?>
    </div>
</body>
</html>
