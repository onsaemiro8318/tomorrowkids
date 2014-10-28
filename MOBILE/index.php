<?
	// 설정파일
	include_once "../config.php";
	include_once "header.php";

	unset($_SESSION['ss_mb_id']);
	unset($_SESSION['ss_media']);

?>
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


    </script>
<body>
	<div class="mob_top1box">
        <div class="content"><div><h1><a href=""><img src="images/logo.png"/></a></h1></div>
        	<!--<div class="text1_cont"><img src="images/mob_top1_text1.png"/></div>
            <div class="text2_cont"><img src="images/page_title.png"/></div>-->
            <div class="sum_text">약 100만 명의 우리 아이들이 빈곤한 환경 탓에
기쁨과 성취를 얻을 수 있는 다양한 일이 있다는 것을 몰라
내일을 꿈꾸지 못하고 있다는 사실, 알고 계셨나요?
<p class="bold">당신이 도전할만한 특별한 내일(work)을 확인하시면,
내일(work)이 모여 아이들의 내일(Tomorrow)이 만들어집니다.</p>
            </div>
            <!--<div class="top1_mobbotbg"><img src="images/top_1bg_img.png"/></div>-->
        </div>
    </div>
    <!--Line2 start-->
    <div class="main_top2">
    	<div class="main_topin2">
        <p class="text_data"><span class="f_text">1,000명의 내일이 모이면</span><br/><span class="t_text">아이들의 내일을 위한 특별 강연회</span><span class="f_text">가 열립니다!</span></p>
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
                	<li>1</li>
                    <li class="number2">0</li>
                    <li class="number3">0</li>
                    <li class="number4">0</li>
                </ul>
            </div>
        </div>
        </div>
        <div class="youtubebox">
          <iframe id="ytplayer" width="100%" height="100%" src="<?=$_gl[youtube_url]?>" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <!--Line2 end-->
    <div class="mob_top3box">
    	<div class="so_butbox">
            <div class="facebook_but"><a href="#" onclick="facebook_login();"><img src="images/facebook_mobbut.png"/></a></div>
            <div><a href="#" onclick="kakao_login();"><img src="images/kakaotalk_mobbut.png"/></a></div>
        </div>
        <p class="noticetext">* 어떠한 정보도 무단으로 포스팅하지 않습니다.</p>
        <div class="step_box_mob"><img src="images/step_mob.png"/></div>
        <div class="event"><img src="images/event_img.png"/></div>
    
        <div class="footer_mob">
    	    <div class="line1">
                <p>이 캠페인은 온라인 나눔문화 확산을 위한 한국타이어의</p>
                <span class="hankologo">기부후원으로 진행됩니다.</span>
            </div>
            <div class="line2">
        	    <div class="logoline"><img src="images/line2_logo.png"/></div>
                <div class="textline2">부스러기사랑나눔회 소개 | 이용약관 | 개인정보처리방침 | 기부정책 | <br/>
본 사이트는 [㈜엠프론티어]의 재능기부로 제작되었습니다.<br/>
사단법인 부스러기사랑나눔회 / 대표자 : 강명순 / 사업자번호 : 110-82-08381 <br/>
서울시 용산구 청파로 46 한통빌딩 10층 / 문의 : 070-7164-7215/7209<br/>
/ 카카오톡 ID : @드림풀
                </div>
            </div>
        </div>
    </div>
</body>
</html>
