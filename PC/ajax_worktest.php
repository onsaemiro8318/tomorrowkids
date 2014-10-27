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
  <input type="text" name="selected_answer" id="selected_answer" value="">
  <h1><?=$question_data[test_value]?></h1>
  <p id="answer1" onmouseover="select_answer(this.id,'over');" onmouseout="select_answer(this.id,'out')" onclick="select_answer(this.id,'click');"><a href="javascript:save_info('<?=$answer_data[0][idx]?>');"><?=$answer_data[0][test_value]?></a></p>
  <p id="answer2" onmouseover="select_answer(this.id,'over');" onmouseout="select_answer(this.id,'out')" onclick="select_answer(this.id,'click');"><a href="javascript:save_info('<?=$answer_data[1][idx]?>');"><?=$answer_data[1][test_value]?></a></p>
  <a href="javascript:go_next_question('<?=$next_num?>','<?=$_POST[selected_val]?>');">답변 선택</a>
</div>
<script type="text/javascript">
	var sel_answer = $("#selected_answer").val();
	$(document).ready(function(){
		if (sel_answer != "")
			$("#"+ sel_answer).css("font-weight","bold");
	});

	function select_answer(answer_id, event_id)
	{
		if (event_id == "over"){
			$("#"+answer_id).css("font-weight","bold");
		}else if (event_id == "click"){
			$("#"+answer_id).css("font-weight","bold");
			$("#selected_answer").val(answer_id);
		}else{
			alert(sel_answer+"||"+answer_id);
			if (sel_answer != answer_id){
				$("#"+answer_id).css("font-weight","normal");
			}
		}
	}
</script>