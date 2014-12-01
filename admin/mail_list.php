<?php

	// 설정파일
	include_once "../config.php";
	include "./head.php";

	if(isset($_REQUEST['search_type']) == false)
		$search_type = "search_by_name";
	else
		$search_type = $_REQUEST['search_type'];

	if(isset($_REQUEST['search_txt']) == false)
		$search_txt	= "";
	else
		$search_txt	= $_REQUEST['search_txt'];

	if(isset($_REQUEST['search_media']) == false)
		$search_media = "";   
	else
		$search_media = $_REQUEST['search_media'];

	if(isset($_REQUEST['search_share']) == false)
		$search_share = "";
	else
		$search_share = $_REQUEST['search_share'];

	if(isset($_REQUEST['sDate']) == false)
		$sDate = "";
	else
		$sDate = $_REQUEST['sDate'];
	
	if(isset($_REQUEST['eDate']) == false)
		$eDate = "";
	else
		$eDate = $_REQUEST['eDate'];

	if(isset($_REQUEST['pg']) == false)
		$pg = "1";
	else
		$pg = $_REQUEST['pg'];

	//if(isset($pg) == false) $pg = 1;	// $pg가 없으면 1로 생성
	$page_size = 20;	// 한 페이지에 나타날 개수
	$block_size = 10;	// 한 화면에 나타낼 페이지 번호 개수

	//if (isset($search_type) == false)
	//	$search_type = "search_by_name";
?>
<script type="text/javascript">
	$(function() {
		$( "#sDate" ).datepicker();
		$( "#eDate" ).datepicker();
	});

	function checkfrm()
	{
		if ($("#sDate").val() > $("#eDate").val())
		{
			alert("검색 시작일은 종료일보다 작아야 합니다.");
			return false;
		}
	}
</script>

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
          <table id="coupon_used_applicant_list" class="table table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>EMAIL</th>
              </tr>
            </thead>
            <tbody>
<?php 
	$mail_list_query = "SELECT * FROM ".$_gl['tk_member_table']." WHERE mb_email IS NOT NULL";
	$res = mysqli_query($my_db, $mail_list_query);

	while($mail_data = @mysqli_fetch_array($res))
	{
?>
              <tr>
                <td><?php echo $PAGE_UNCOUNT--?></td>	<!-- No. 하나씩 감소 -->
                <td><?php echo $mail_data['mb_email']?></td>
              </tr>
<?php 
	}
?>
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
</body>
admin
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