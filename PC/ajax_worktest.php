<?
	// 설정파일
	include_once "../config.php";
	mysqli_query($my_db,'set names utf8'); 
	
	// 질문 정보
	$question_data	= TK_GetTestQuestionInfo($_POST[test_idx]);

	$answer_data = TK_GetTestAnswerInfo($_POST[test_idx]);

	$next_num = $_POST[test_idx] + 1;
?>
<div>
  <h1><?=$question_data[test_value]?></h1>
  <p><?=$answer_data[0][test_value]?></p>
  <p><?=$answer_data[1][test_value]?></p>
  <a href="javascript:go_test('<?=$next_num?>');">답변 선택</a>
</div>

