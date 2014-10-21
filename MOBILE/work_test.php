<?
	// 설정파일
	include_once "../config.php";
	include_once "header.php";
?>
  <body>
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
  </body>
</html>

