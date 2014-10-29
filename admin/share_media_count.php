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
            <!-- 필리핀 -->
            <div id="daily_applicant_count_div1" style="display:block">
              <table class="table table-hover">
                <thead>
                  <tr><th>공유매체</th><th>PC</th><th>Mobile</th><th>Total</th></tr>
                </thead>
                <tbody>
<?php
		$media_query	= "SELECT media, COUNT( media ) media_cnt FROM ".$_gl[tk_test_result_table]." GROUP BY media";
		$media_res		= mysqli_query($my_db, $media_query);
		
		unset($media_name);
		unset($media_cnt);
		unset($pc_cnt);
		unset($mobile_cnt);
		$total_media_cnt = 0;
		while ($media_data = mysqli_fetch_array($media_res))
		{
			$media_name[]	= $media_data[media];
			$media_cnt[]	= $media_data[media_cnt];
			$pc_query		= "SELECT * FROM ".$_gl[tk_test_result_table]." WHERE media='".$media_data[media]."' AND gubun='PC' AND share='Y'";
			$pc_count		= mysqli_num_rows(mysqli_query($my_db, $pc_query));
			$mobile_query	= "SELECT * FROM ".$_gl[tk_test_result_table]." WHERE media='".$media_data[media]."' AND gubun='MOBILE' AND share='Y'";
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
                    <td><?=$val?></td>
                    <td><?=number_format($pc_cnt[$i])?></td>
                    <td><?=number_format($mobile_cnt[$i])?></td>
                    <td><?=number_format($media_cnt[$i])?></td>
                  </tr>
<?php
			$total_media_cnt += $media_cnt[$i];
            $total_pc_cnt += $pc_cnt[$i];
            $total_mobile_cnt += $mobile_cnt[$i];
			$i++;
		}
?>
                  <tr>
                    <td>합계</td>
                    <td><?php echo number_format($total_pc_cnt)?></td>
                    <td><?php echo number_format($total_mobile_cnt)?></td>
                    <td><?php echo number_format($total_media_cnt)?></td>
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
</body>

</html>