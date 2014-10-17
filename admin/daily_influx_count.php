<?php
	// 설정파일
	include_once "../config.php";

	include "./head.php";

/* 
if(!$pg) $pg = 1;	// $pg가 없으면 1로 생성
$page_size = 20;	// 한 페이지에 나타날 개수
$block_size = 10;	// 한 화면에 나타낼 페이지 번호 개수

// 주차별 
$page_size = 7;
$block_size
*/

$applicant_count_main = '1';
$topgirl_vote_count_main = '2';
$story_vote_count_main = '3';
$coupon_used_count_main = '4';

$code_philippines = '1';
$code_taiwan = '2';
$code_indonesia = '3';
$code_singapore = '4';
?>

  <div id="page-wrapper">
    <div class="container-fluid">
    <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">일자별 유입매체별 유입자 수 PC / Mobile</h1>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-6">
          <div class="table-responsive">
            <!-- 필리핀 -->
            <div id="daily_applicant_count_div1" style="display:block">
              <table class="table table-hover">
                <thead>
                  <tr><th>날짜</th><th>유입매체</th><th>PC</th><th>Mobile</th><th>Total</th></tr>
                </thead>
                <tbody>
<?php
	$daily_date_query = "SELECT reg_date FROM ".$_gl[tk_tracking_info_table]." Group by substr(reg_date,1,10)";
	$date_res = mysqli_query($my_db, $daily_date_query);
	while($date_daily_data = mysqli_fetch_array($date_res))
	{
		$daily_date = substr($date_daily_data[reg_date],0,10);
		$media_query = "SELECT media, COUNT( media ) media_cnt FROM ".$_gl[tk_tracking_info_table]." WHERE reg_date LIKE  '%".$daily_date."%' GROUP BY media";
		$media_res = mysqli_query($my_db, $media_query);
		
		unset($media_name);
		unset($media_cnt);
		while ($media_daily_data = mysqli_fetch_array($media_res))
		{
			$media_name[]	= $media_daily_data[media];
			$media_cnt[]	= $media_daily_data[media_cnt];
			$pc_query		= "SELECT * FROM ".$_gl[tk_tracking_info_table]." WHERE reg_date LIKE  '%".$daily_date."%' AND media='".$media_daily_data[media]."' AND gubun='PC'";
			$pc_count		= mysqli_num_rows(mysqli_query($my_db, $pc_query));
			$mobile_query	= "SELECT * FROM ".$_gl[tk_tracking_info_table]." WHERE reg_date LIKE  '%".$daily_date."%' AND media='".$media_daily_data[media]."' AND gubun='MOBILE'";
			$mobile_count	= mysqli_num_rows(mysqli_query($my_db, $mobile_query));
			$pc_cnt[]		= $pc_count;
			$mobile_cnt[]	= $mobile_count;
		}
		$rowspan_cnt =  count($media_name);
		$i = 0;
		foreach($media_name as $key => $val)
		{
?>
                  <tr>
<?
			if ($i == 0)
			{
?>
                    <td rowspan="<?=$rowspan_cnt?>"><?php echo $daily_date?></td>
<?
			}
?>
                    <td><?=$val?></td>
                    <td><?=$pc_cnt[$i]?></td>
                    <td><?=$mobile_cnt[$i]?></td>
                    <td><?=$media_cnt[$i]?></td>
                  </tr>
<?php
			$i++;
		}
	}
?>
                  <tr><td>합계</td><td><?php echo $phi_daily_applicant_count_pc_sum?></td><td><?php echo $phi_daily_applicant_count_mobile_sum?></td><td><?php echo $phi_daily_applicant_count_total_sum?></td></tr>
                </tbody>
              </table>
            </div>
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
	function display_daily_count(val)
	{
		for(i=1; i<=4; i++) {
			if(i == val) {
				document.getElementById('daily_count_main' + i).style.display = "block";  
			} else {
				document.getElementById('daily_count_main' + i).style.display = "none";  
			}
		}
	}

	function display_daily_applicant_count(val)
	{
		for(i=1; i<=4; i++) {
			if(i == val) {
				document.getElementById('daily_applicant_count_div' + i).style.display = "block";  
			} else {
				document.getElementById('daily_applicant_count_div' + i).style.display = "none";  
			}
		}
	}

	function display_daily_topgirl_vote_count(val)
	{
		for(i=1; i<=4; i++) {
			if(i == val) {
				document.getElementById('daily_topgirl_vote_count_div' + i).style.display = "block";  
			} else {
				document.getElementById('daily_topgirl_vote_count_div' + i).style.display = "none";  
			}
		}
	}
	
	function display_daily_story_vote_count(val)
	{
		for(i=1; i<=4; i++) {
			if(i == val) {
				document.getElementById('daily_story_vote_count_div' + i).style.display = "block";  
			} else {
				document.getElementById('daily_story_vote_count_div' + i).style.display = "none";  
			}
		}
	}

	function display_daily_coupon_used_count(val)
	{
		for(i=1; i<=4; i++) {
			if(i == val) {
				document.getElementById('daily_coupon_used_count_div' + i).style.display = "block";  
			} else {
				document.getElementById('daily_coupon_used_count_div' + i).style.display = "none";  
			}
		}
	}

</script>