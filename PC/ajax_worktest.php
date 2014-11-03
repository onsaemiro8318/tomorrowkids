<?
	// 설정파일
	include_once "../config.php";

	// 질문 정보
	$question_data	= TK_GetTestQuestionInfo($_POST['test_idx']);

	$answer_data	= TK_GetTestAnswerInfo($_POST['test_idx']);

	$next_num		= $_POST['test_idx'] + 1;
?>
  <input type="hidden" name="sel_value" id="sel_value">
  <input type="hidden" name="selected_value" id="selected_value" value="<?=$_POST['selected_val']?>">
  <input type="hidden" name="selected_answer" id="selected_answer" value="">
  <div class="hidden">
    <div class="fl_left hidden plicon"><img src="images/step1_icon.jpg"/></div>
    <div class="fl_left textinbox">
      <p class="bluetext"><?=$question_data['test_value']?></p>
      <p>
        <div class="fl_left tag">A.</div><span class="anstextone fl_left" id="answer1" onmouseover="select_answer(this.id,'over');" onmouseout="select_answer(this.id,'out')" onclick="go_next_question('<?=$answer_data[0]['idx']?>','<?=$next_num?>','<?=$_POST['selected_val']?>')" style="cursor:pointer;padding-bottom:20px"><?=$answer_data[0]['test_value']?></span></p>
      <p><div class="fl_left tag">B.</div><span class="anstextone fl_left" id="answer2" onmouseover="select_answer(this.id,'over');" onmouseout="select_answer(this.id,'out')" onclick="go_next_question('<?=$answer_data[0]['idx']?>','<?=$next_num?>','<?=$_POST['selected_val']?>')" style="cursor:pointer;"><?=$answer_data[1]['test_value']?></span></p>
    </div>
  </div>
<?
    //if($next_num == 11){
?>
  <!-- <div class="hidden nextbut"><a href="javascript:go_next_question('<?=$next_num?>','<?=$_POST['selected_val']?>');"><img src="images/go_result_bt_pc.png" alt="결과 보기"/></a></div> -->
<?
    //}else{
?>
  <!-- <div class="hidden nextbut"><a href="javascript:go_next_question('<?=$next_num?>','<?=$_POST['selected_val']?>');"><img src="images/next_but.jpg" alt="다음 질문"/></a></div> -->
<?
    //}
?>

<script type="text/javascript">
	function select_answer(answer_id, event_id)
	{
		var sel_answer = $("#selected_answer").val();
		if (event_id == "over"){
			$("#"+answer_id).attr('class','anstext fl_left');
		}else if (event_id == "click"){
			$("#"+answer_id).attr('class','anstext fl_left');
			$("#selected_answer").val(answer_id);
			if (answer_id == "answer1")
				$("#answer2").attr('class','anstextone fl_left');
			else
				$("#answer1").attr('class','anstextone fl_left');
		}else{
			if (sel_answer != answer_id){
				$("#"+answer_id).attr('class','anstextone fl_left');
			}
		}
	}
</script>