
	function go_test(num)
	{
		$.ajax({
			type		: "POST",
			async		: false,
			url			: "./ajax_worktest.php",
			data		: ({
				"test_idx" : num
			}),
			success: function(response){
				$("test_div").html(response);
			}
		});
	}