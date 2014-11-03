<?
	// 설정파일
	include_once "../config.php";

	// 질문 정보
	$question_data	= TK_GetTestQuestionInfo($_POST[test_idx]);

	$answer_data	= TK_GetTestAnswerInfo($_POST[test_idx]);

	$next_num		= $_POST[test_idx] + 1;
?>
<div>
  <input type="hidden" name="sel_value" id="sel_value">
  <input type="hidden" name="selected_value" id="selected_value" value="<?=$_POST[selected_val]?>">
  <h1><?=$question_data[test_value]?></h1>
  <p id="answer1"><a href="javascript:save_info('<?=$answer_data[0][idx]?>');"><?=$answer_data[0][test_value]?></a></p>
  <p id="answer2"><a href="javascript:save_info('<?=$answer_data[1][idx]?>');"><?=$answer_data[1][test_value]?></a></p>
  <a href="javascript:go_next_question('<?=$next_num?>','<?=$_POST[selected_val]?>');">답변 선택</a>
</div>
<div class="backLayer" style="display:none;background-color:black;position:absolute;left:0px;top:0px;z-index:999;"></div>