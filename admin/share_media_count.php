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
          <h1 class="page-header">공유 매체 count</h1>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-6">
          <div class="table-responsive">
              <table id="coupon_used_applicant_list" class="table table-hover">
                <thead>
                  <tr>
                      <th>공유매체</th>
                      <th>PC</th>
                      <th>Mobile</th>
                      <th>Total</th>
                  </tr>
                </thead>
                <tbody>
<?php
		$media_query	= "SELECT media, COUNT( media ) media_cnt FROM ".$_gl[tk_test_result_table]." WHERE share='Y' GROUP BY media";
		$media_res		= mysqli_query($my_db, $media_query);

		while ($media_data = mysqli_fetch_array($media_res))
		{
			$pc_query		= "SELECT * FROM ".$_gl[tk_test_result_table]." WHERE media='".$media_data[media]."' AND gubun='PC' AND share='Y'";
			$pc_count		= mysqli_num_rows(mysqli_query($my_db, $pc_query));
			$mobile_query	= "SELECT * FROM ".$_gl[tk_test_result_table]." WHERE media='".$media_data[media]."' AND gubun='MOBILE' AND share='Y'";
			$mobile_count	= mysqli_num_rows(mysqli_query($my_db, $mobile_query));
			$total_count		= $pc_count + $mobile_count;

?>
                  <tr>
                    <td><?=$val?></td>
                    <td><?=number_format($pc_count)?></td>
                    <td><?=number_format($mobile_count)?></td>
                    <td><?=number_format($total_count)?></td>
                  </tr>
<?php
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
</body>

</html>