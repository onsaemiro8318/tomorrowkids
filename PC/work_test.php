<?
	// 설정파일
	include_once "../config.php";
	include_once "header.php";

	// 주소 바로 입력시 index로 이동
	if ( !isset($_SERVER['HTTP_REFERER']) ) { 
		header('Location: index.php'); 
		exit; 
	} 
?>
<script>
	// 테스트 결과 페이지에서 뒤로가기 버튼을 이용해 테스트 페이지로 이동 막기
	window.history.forward(0);
</script>

  <body>
    <div class="backLayer" style="display:none;background-color:black;position:absolute;left:0px;top:0px;z-index:999;width:100%;height:100%"></div>
    <div style="position:absolute;width:100%;height:100%">
    <div style="position:top;width:100%;height:60px;background:green">
      <a href="index.php">내일을 부탁해</a>
      <p><?=number_format($total_count)?>명의 내일(work)이 내일(tomorrow)이 되고 있습니다.</p>
    </div>
    <div style="position:top;width:100%;height:110px;background:skyblue;">
      <h1>STEP1. 내일(work) 테스트</h1>
      <p>당신의 내일(work)을 확인하기 위한 10개의 질문에 답해주세요.<br/>
         직감에 의존하는 대답을 해 주실수록 상상 이상의 특별한 일들이 기다리고 있답니다!
      </p>
    </div>
    <div style="position:relative;width:100%;height:500px;background:orange;" id="test_div">
      <div style="position:absolute;margin-top:200px;margin-left:45%;background:green;cursor:pointer" onclick="go_test('1','');">
        <p><font size="17pt">테스트 시작!!</font></p>
      </div>
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
</script>