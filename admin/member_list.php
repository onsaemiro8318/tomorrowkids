<?php

	// 설정파일
	include_once "../config.php";
	include "./head.php";

	$search_type = $_REQUEST['search_type'];
	$search_txt = $_REQUEST['search_txt'];
	$pg = $_REQUEST['pg'];

	if(!$pg) $pg = 1;	// $pg가 없으면 1로 생성
	$page_size = 20;	// 한 페이지에 나타날 개수
	$block_size = 10;	// 한 화면에 나타낼 페이지 번호 개수

	$applicant_count_main = '1';
	$topgirl_vote_count_main = '2';
	$story_vote_count_main = '3';

	$code_philippines = '1';
	$code_taiwan = '2';
	$code_indonesia = '3';
	$code_singapore = '4';

	if (!$search_type)
		$search_type = "search_by_name";
?>


<div id="page-wrapper">
  <div class="container-fluid">
  <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">테스트 참여자 목록</h1>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">
          <ol class="breadcrumb">
            <form name="frm_execute" method="POST">
              <input type="hidden" name="pg">
              <select name="search_type">
                <option value="search_by_name" <?php if($search_type == "search_by_name"){?>selected<?php }?>>이름</option>
                <option value="search_by_phone" <?php if($search_type == "search_by_phone"){?>selected<?php }?>>전화번호</option>
                <option value="search_by_country" <?php if($search_type == "search_by_country"){?>selected<?php }?>>국가</option>
              </select>
              <input type="text" name="search_txt" onkeyup="search_query(this.value,search_type.value)" value="<?php echo $search_txt?>">
            </form>
          </ol>
          <table id="coupon_used_applicant_list" class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>사용자 고유ID</th>
                <th>IP주소</th>
                <th>참여한 날짜</th>
                <th>최근 참여 날짜</th>
                <th>매체</th>
              </tr>
            </thead>
            <tbody>
<?php 

$member_count_query = "SELECT count(*) FROM ".$_gl[tk_member]."";
list($member_count) = mysqli_fetch_array(mysqli_query($my_db, $member_count_query));

$PAGE_CLASS = new Page($pg,$member_count,$page_size,$block_size);
$BLOCK_LIST = $PAGE_CLASS->blockList(); 
$PAGE_UNCOUNT = $PAGE_CLASS->page_uncount;


$applicant_list_query = "SELECT intseq, strNAME, strAGE, PHONE, EMAIL, ADDRESS , YOUTUBE, TYPE, LIKECOUNT, USERID, REGDATE, coupon_page, USED FROM event_topgirl_main WHERE USED = '1' Order by intseq DESC LIMIT $PAGE_CLASS->page_start, $page_size";
$res = mysqli_query($my_db, $applicant_list_query);

	while($applicant_data = mysqli_fetch_array($res))
	{
		if($applicant_data[TYPE]=="1"){
			$country = "필리핀";
		}else if($applicant_data[TYPE]=="2"){
			$country = "대만";
		}else if($applicant_data[TYPE]=="3"){
			$country = "인도네시아";
		}else if($applicant_data[TYPE]=="4"){
			$country = "싱가폴";
		}
?>
              <tr>
                <td><?php echo $PAGE_UNCOUNT--?></td>	<!-- No. 하나씩 감소 -->
                <td><?php echo $applicant_data[strNAME]?></td>
                <td><?php echo $applicant_data[strAGE]?></td>
                <td><?php echo $applicant_data[PHONE]?></td>
                <td><?php echo $applicant_data[EMAIL]?></td>
                <td><?php echo $country?></td>
              </tr>
<?php 
	}
?>
              <tr><td colspan="12"><div class="pageing"><?php echo $BLOCK_LIST?></div></td></tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- jQuery Version 1.11.0 -->
<script src="js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>



<script type="text/javascript">
 
	function pageRun(num)
	{
		f = document.frm_execute;
		f.pg.value = num;
		f.submit();
	}

	// 검색어 서칭 ajax 처리
	function search_query(val1,val2)
	{
		$.ajax({
			type	: "POST",
			url		: "ajax_coupon_used_applicant_list.php",
			data	: ({
						"search_txt"	: val1,
						"search_type"	: val2
					}),
			success	: function(msg) {
				$("#coupon_used_applicant_list").html(msg);
			}
		});
	}


</script>