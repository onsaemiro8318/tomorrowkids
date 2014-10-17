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
                  <tr><th>날짜</th><th>PC</th><th>Mobile</th><th>Total</th></tr>
                </thead>
                <tbody>
<?
	$daily_date_query	= "SELECT reg_date FROM ".$_gl[tk_tracking_info_table]." Group by substr(reg_date,1,10)";
	$date_res			= mysqli_query($my_db, $daily_date_query);
	while($date_daily_data = mysqli_fetch_array($date_res))
	{
		$daily_date		= substr($date_daily_data[reg_date],0,10);
?>
                  <tr>
                    <td><?=$daily_date?></td>
                    <td><?php echo $phi_daily_topgirl_vote_count_pc?></td>
                    <td><?php echo $phi_daily_topgirl_vote_count_mobile?></td>
                    <td><?php echo $phi_daily_topgirl_vote_count_total?></td>
                  </tr>
<?
	}
?>
                  <tr><td>합계</td><td><?php echo $phi_daily_topgirl_vote_count_pc_sum?></td><td><?php echo $phi_daily_topgirl_vote_count_mobile_sum?></td><td><?php echo $phi_daily_topgirl_vote_count_total_sum?></td></tr>
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