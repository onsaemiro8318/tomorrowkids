<?
	// 설정파일
	include_once "../config.php";

	$total_count = TK_GetTestTotalCount();
?>
<html>
  <head>
    <title>Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script type='text/javascript' src='../js/jquery-1.11.0.min.js'></script>
    <script type='text/javascript' src='../js/tk.js'></script>
    <script type='text/javascript' src='../js/googleAnalytics.js'></script>
    <script type='text/javascript'>
    $(window).resize(function(){
        var width = $(window).width();
        var height = $(window).height();
        $(".backLayer").width(width).height(height);
    });
    $(document).keydown(function(event){
        if(event.which=='27'){
        $("#movie_layer").fadeOut(300);
        $(".backLayer").fadeOut(1000);
        }
    });
    </script>
  </head>
  <body>
    <div class="backLayer" style="display:none;background-color:black;position:absolute;left:0px;top:0px;z-index:999;">
    </div>
    <div style="position:absolute;">
    <div>
      <h1>'내일을 부탁해'</h1>
      <div>
        <p>약 100만 명의 우리 아이들이 빈곤한 환경 탓에</p>
        <p>기쁨과 성취를 얻을 수 있는 다양한 일이 있다는 것을 몰라</p>
        <p>내일을 꿈꾸지 못하고 있다는 사실, 알고 계셨나요?</p>
        <p>당신이 도전할만한 특별한 내일(work)을 확인하시면,</p>
        <p>내일(work)이 모여 아이들의 내일(Tomorrow)이 만들어집니다.</p>
      </div>
      <div>
          <div id="movie_play_box">
              <a href="#" onclick="play_movie();"><img src="http://topgirl.thefaceshop.com/philippines/PC/images/sns/gift_for_voter_mini.png"></a>
          </div>
          <div id="count_box">
              <h1><?=number_format($total_count)?>명</h1>
              <p>의 내일(work)이<p>
              <p>아이들의 내일(Tomorrow)이 되고 있습니다.</p>
          </div>
      </div>
      <div id="sns_login_box">
        <div>
        <input type="button" value="페이스북으로 참여하기" onclick="facebook_login();">
        <input type="button" value="카카오계정으로 참여하기" onclick="kakao_login();">      
        <p>*어떠한 정보도 무단으로 포스팅하지 않습니다.</p>          
        </div>
      </div>
    </div>
    </div>
    <div id="movie_layer" style="position:absolute;display:none;background:red;margin-top:300px;z-index:1000;">
        <div id="movie_box">
          <iframe id="ytplayer" width="100%"  src="<?=$_gl[youtube_url]?>" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
  </body>
</html>

