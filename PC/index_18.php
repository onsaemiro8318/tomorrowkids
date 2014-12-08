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

	if ($total_count > 10000)
		$total_count = 10000;

	$left_per	= ($total_count / 10000) * 100;
	$right_per	= 100 - $left_per - 0.3;

?>
<html>
  <head>
    <title>내일을부탁해 - 드림풀 매칭그랜트 캠페인</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta property="og:title" content="나는 막걸리 소믈리에!! 당신에게 어울리는 직업은?">
    <meta property="og:type" content="website" />
    <!-- <meta property="og:url" content="http://www.tomorrowkids.or.kr/PC/work_test_result_1.php" /> -->
    <meta property="og:image" content="http://www.tomorrowkids.or.kr/images/fb/jobbigimg_18.jpg" />
    <meta property="og:description" content="당신은 내일을 꿈꾸며 살아가고 있습니다. 당신에게 어울리는 직업을 찾아보세요!">
    <link rel="shortcut icon" type="image/x-icon" href="./images/tomorrow.ico" />
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script type='text/javascript' src='../js/jquery-1.11.0.min.js'></script>
    <!-- <script type="text/javascript" src="../js/custom.js"></script> -->
    <script type='text/javascript' src='../js/tk.js'></script>
    <script type='text/javascript' src='../js/googleAnalytics.js'></script>
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

	if(window.opera ){
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
		var height = 0;

		if( browser.msie ){ //IE
			var scrollHeight = document.documentElement.scrollHeight;
			var browserHeight = document.documentElement.clientHeight;
			height = scrollHeight;

		} else if ( browser.safari ){ //Chrome || Safari
			height = document.body.scrollHeight;
		} else if ( browser.firefox ){ // Firefox || NS
			var bodyHeight = document.body.clientHeight;
			height = window.innerHeight < bodyHeight ? bodyHeight : window.innerHeight;
		} else if ( browser.opera ){ // Opera
			var bodyHeight = document.body.clientHeight;
			height = window.innerHeight < bodyHeight ? bodyHeight : window.innerHeight;
		}

		$(".mask").width(width).height(height);
	});
	$(document).keydown(function(event){
		if(event.which=='27'){
			$(".video_fremebox").fadeOut(500);
			$(".mask").fadeOut(500);
		//	$(".video_but").show();
		}
	});
	$(document).ready(function(){
		$(".mask").click(function(){
			$(".mask").fadeOut(500);
		//	$(".video_but").show();
			$(".video_fremebox").fadeOut(500);
			controllable_player.stopVideo();
		});

		$(".greenco_left").css("width","<?=$left_per?>%");
		$(".greenco_right").css("width","<?=$right_per?>%");
		$(".peopleic").css("left","<?=$left_per?>%");
	});
    </script>
  </head>
<body>
  <!--Line1 start-->
  <div class="main_wrapper">
    <div class="main_top1">
      <div class="main_topinbg1">
        <h1><a href="http://www.dreamfull.or.kr" target="_blank"><img src="images/logo.png" alt="dreamfull"/></a></h1>
        <div class="videobox"><div class="video_but"><a href="#" onclick="play_movie('<?=$gubun?>');"><img src="images/play_but.png"/></a></div></div>
        <div class="testbox"><div class="test_but"><a href="#" onclick="test_start();"><img src="images/test_bt.png"/></a></div></div>        
      </div>
    </div>
  <!--Line1 end-->
  <!--Line2 start-->
    <div class="main_top2">
      <div class="main_topin2">
        <p class="text_data"><span class="f_text">10,000명의 내일이 모이면</span><br/><span class="t_text">아이들의 내일을 위해 5천만원</span>이 기부됩니다.</p>
        <div class="gr_box">
          <div class="greenco_left fl_left"></div><div class="greenco_right fl_left"><div class="peopleic"><img src="images/gr_peopleicon.png"/></div></div><div class="minic"><img src="images/gr_15min.png"/></div><div class="line_number"><img src="images/gr_number_line.png"/></div>
        </div>
        <div class="number_boxwr">
          <div class="fl_left peoplenumber">현재 참여자수</div>
          <div class="number_box fl_left">
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
<!--Line2 end-->
<!--Line3 start-->
    <div class="main_top3">
      <div class="soc_linkbox">
        <div class="hidden"></div>
      </div>
      <div class="stepbox hidden">
        <div><img src="images/step_fiveicon.png"/></div>
        <ul>
          <li>내일<br/>테스트하기</li>
          <li class="stept1">내일 결과<br/>SNS에 공유하기</li>
          <li class="stept2">참여를 통한<br/>기부 완료</li>
          <li class="stept3">세상을 바꾸는 시간, 15분과<br/>함께 하는 아이들 교육<br/>프로그램 제작</li>
        </ul>
      </div>
      <div class="donation"><img src="images/donation_img.png"/><div class="donationbutton"><span class="fl_left pinkbut"><a href="http://www.dreamfull.or.kr/app/newdf/donation/collection_box_detail?themeNo=201401070002" target="_blank"><img src="images/donation_but_pink.png"/></a></span><span class="fl_left"><a href="http://www.dreamfull.or.kr/app/newdf/donation/collection_box" target="_blank"><img src="images/donation_but_green.png"/></a></span></div>
    </div>
<!--Footer start-->
<?
	include_once "footer.php";
?>
<!--Footer end-->
  </div>
<!--Line3 end-->
</div>
<div class="mask"></div>
<div class="video_fremebox">
  <div class="video"><iframe id="ytplayer" width="951px" height="579px" src="<?=$_gl['youtube_url']?>" frameborder="0" allowfullscreen></iframe></div>
</div>
</body>
</html>
