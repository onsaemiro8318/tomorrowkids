<?
	// 설정파일
	include_once "../config.php";
	mysqli_query($my_db,'set names utf8'); 
	$query 			= "SELECT * FROM ".$_gl[tk_worktest_table]." WHERE idx='".$_POST[test_idx]."'";
	$result 		= mysqli_query($my_db, $query);
	$question_data	= mysqli_fetch_array($result);

	$query 			= "SELECT * FROM ".$_gl[tk_worktest_table]." WHERE parent_idx='".$_POST[test_idx]."'";
	$result 		= mysqli_query($my_db, $query);
	while ($answer_data = mysqli_fetch_array($result))
	{
		$anser_array[idx][]			= $answer_data[idx];
		$anser_array[test_value][]	= $answer_data[test_value];
	}

	$next_num = $_POST[test_idx] + 1;
?>
<div>
  <h1><?=$question_data[test_value]?></h1>
  <p><?=$anser_array[test_value][0]?></p>
  <p><?=$anser_array[test_value][1]?></p>
  <a href="javascript:go_test('<?=$next_num?>');">답변 선택</a>
</div>