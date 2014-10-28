<?
	// 설정파일
	include_once "../config.php";
	include_once "header.php";

	// 주소 바로 입력시 index로 이동
	if ( !isset($_SERVER['HTTP_REFERER']) ) { 
		header('Location: index.php'); 
		exit; 
	} 
	$t_count1 = substr($total_count,0,1);
	$t_count2 = substr($total_count,1,1);
	$t_count3 = substr($total_count,2,1);
	$t_count4 = substr($total_count,3,1);

	if (!$_POST[test_idx])
		$_POST[test_idx] = "1";
	// 질문 정보
	$question_data	= TK_GetTestQuestionInfo($_POST[test_idx]);

	$answer_data	= TK_GetTestAnswerInfo($_POST[test_idx]);

	$next_num		= $_POST[test_idx] + 1;

?>
<script>
    window.history.forward(0);
</script>

<body>
  <input type="hidden" name="sel_value" id="sel_value">
  <input type="hidden" name="selected_value" id="selected_value" value="<?=$_POST[selected_val]?>">
<div class="mob_sub_top1">
	<h1><a href=""><img src="images/logo.png"/></a></h1>
    <div>
    	<div class="tmor_text fl_left"><img src="images/page_title.png"/></div>
        <div class="mob_sub_number fl_right">
        	<div class="peopletitle">현재 참여자</div>
            <div class="numberbox">
            	<ul>
                    <li><?=$t_count1?></li>
                    <li class="number2"><?=$t_count2?></li>
                    <li class="number3"><?=$t_count3?></li>
                    <li class="number4"><?=$t_count4?></li>
           		</ul>
            </div>
        </div>
    </div>
</div>
<div class="mob_sub_top2">
	<p class="blue">STEP 1</p>
    <p class="white">내일 (Work) 테스트</p>
    <div class="white1">당신의 내일(work)을 확인하기 위한 10개의 질문에
답해주세요. 직감에 의존하는 대답을 해 주실수록 
상상 이상의 특별한 일들이 기다리고 있답니다!
</div>
	<div class="top2_content" id="test_div">
    	<div class="quas">
        	<?=$question_data[test_value]?>
        </div>
        <div class="ansbox" onclick="save_info('<?=$answer_data[0][idx]?>')" style="cursor:pointer;">
        	<div class="fl_left tag">A.</div>
            <div class="fl_left tagtext"><?=$answer_data[0][test_value]?></div>
        </div>
         <div class="ansbox" onclick="save_info('<?=$answer_data[1][idx]?>')" style="cursor:pointer;">
        	<div class="fl_left tag">B.</div>
            <div class="fl_left tagtext2"><?=$answer_data[1][test_value]?></div>
        </div>
        <div class="next_but"><a href="javascript:go_next_question('<?=$next_num?>','');"><img src="images/next_qu_but.jpg"/></a></div>
    </div>
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
