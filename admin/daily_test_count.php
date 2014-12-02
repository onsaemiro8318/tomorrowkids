<?php
	// 설정파일
	include_once "../config.php";

	include "./head.php";
?>


<div id="page-wrapper">
  <div class="container-fluid">
  <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">일자별 테스트 응모자 수 PC / Mobile</h1>
      </div>
    </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-6">
          <div class="table-responsive">
            <div id="daily_topgirl_vote_count_div1" style="display:block">
              <table class="table table-hover">
                <thead>
                  <tr><th>날짜</th><th>PC</th><th>Mobile</th><th>Share</th><th>Total(PC+MOBILE)</th></tr>
                </thead>
                <tbody>
<?php
	$daily_date_query	= "SELECT regdate FROM ".$_gl['tk_test_result_table']." Group by substr(regdate,1,10)";
	$date_res			= mysqli_query($my_db, $daily_date_query);

	while($date_daily_data = mysqli_fetch_array($date_res))
	{
		$daily_date		= substr($date_daily_data['regdate'],0,10);
      $total_count = 0;
      $pc_count = 0;
      $mobile_count = 0;
      $share_count = 0;
			$pc_query		= "SELECT * FROM ".$_gl['tk_test_result_table']." WHERE regdate LIKE  '%".$daily_date."%' AND gubun='PC'";
			$pc_count		= mysqli_num_rows(mysqli_query($my_db, $pc_query));
			$mobile_query	= "SELECT * FROM ".$_gl['tk_test_result_table']." WHERE regdate LIKE  '%".$daily_date."%' AND gubun='MOBILE'";
			$mobile_count	= mysqli_num_rows(mysqli_query($my_db, $mobile_query));
			$share_query	= "SELECT * FROM ".$_gl['tk_test_result_table']." WHERE regdate LIKE  '%".$daily_date."%' AND share='Y'";
			$share_count	= mysqli_num_rows(mysqli_query($my_db, $mobile_query));
      $total_count = $pc_count + $mobile_count;
?>
                  <tr>
                    <td><?php echo $daily_date?></td>
                    <td><?=number_format($pc_count)?></td>
                    <td><?=number_format($mobile_count)?></td>
                    <td><?=number_format($share_count)?></td>
                    <td><?=number_format($total_count)?></td>
                  </tr>
<?
	}
?>
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