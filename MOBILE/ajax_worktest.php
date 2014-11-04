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
  <div class="quas">
  <?=$question_data['test_value']?>
  </div>
    <div class="ansbox" onclick="save_info('<?=$answer_data[0]['idx']?>')" style="cursor:pointer;">
      <div class="fl_left tag">A.</div>
      <div class="fl_left tagtext2" id="answer1" onmouseover="select_answer(this.id,'over');" onmouseout="select_answer(this.id,'out')" onclick="go_next_question_mobile('<?=$answer_data[0]['idx']?>','<?=$next_num?>','<?=$_POST['selected_val']?>')"><?=$answer_data[0]['test_value']?></div>
    </div>
    <div class="ansbox" onclick="save_info('<?=$answer_data[1]['idx']?>')" style="cursor:pointer;">
      <div class="fl_left tag">B.</div>
      <div class="fl_left tagtext2" id="answer2" onmouseover="select_answer(this.id,'over');" onmouseout="select_answer(this.id,'out')" onclick="go_next_question_mobile('<?=$answer_data[1]['idx']?>','<?=$next_num?>','<?=$_POST['selected_val']?>')"><?=$answer_data[1]['test_value']?></div>
    </div>
<?
    //if($next_num == 11){
?>
    <!-- <div class="next_but"><a href="javascript:go_next_question('<?=$next_num?>','<?=$_POST['selected_val']?>');"><img src="images/go_result_bt_mob.png"/></a></div> -->
<?
    //}else{
?>
    <!-- <div class="next_but"><a href="javascript:go_next_question('<?=$next_num?>','<?=$_POST['selected_val']?>');"><img src="images/next_qu_but.jpg"/></a></div> -->
<?
    //}
?>    