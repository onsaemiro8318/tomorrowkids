Kakao.init('5675f40b361955e0b3fcf93944b5d444');
var jsonStr;
var obj;
var ka_access_token;
var ka_refresh_token;

var userAgent = navigator.userAgent.toLowerCase();
 
var browser = {
    msie    : /msie/.test( userAgent ) && !/opera/.test( userAgent ),
    safari  : /webkit/.test( userAgent ),
    firefox : /mozilla/.test( userAgent ) && !/(compatible|webkit)/.test( userAgent ),
    opera   : /opera/.test( userAgent )
};   




/********************** 이메일 입력 **********************/
function close_email(){
  $("#email_div").fadeOut(300);
  $("#donation_div").fadeIn(300);
}
function update_user_email(){
    var EMAIL1	= $.trim($('#email1').val());
    var EMAIL2	= $.trim($('#email2').val());
    var EMAIL = EMAIL1 + "@" + EMAIL2
    var re_email = /^[_a-zA-Z0-9-.]+@[\._a-zA-Z0-9-]+\.[a-zA-Z]+$/;
    
    if (EMAIL1 == ""){
    	alert('이메일 주소를 확인해주세요.');
    	return false;
    }else if (EMAIL2 == ""){
    	alert('이메일 주소를 확인해주세요.');
    	return false;
    }else if (!EMAIL.match(re_email)){
    	alert('이메일 주소를 확인해주세요.');
    	return false;
    }
    
	if ($("input:checkbox[id='chk_privacy']").is(":checked") == false)
	{
		alert("개인정보동의에 체크해 주세요. ");
		return false;
	}

    $.ajax({
    	type:"POST",
    	data:{
          "exec" : "update_user_email",
          "email" : EMAIL
           },
    	url: "../main_exec.php",
    	success: function(response){
        $("#email_div").fadeOut(300);
        $("#donation_div").fadeIn(300);
    	}
    });
}
/********************** 동영상 재생 **********************/
function play_movie(gubun){
	var width = $(window).width();
	//var height = $(window).height();

	var height = 0;

	if( browser.msie ){ //IE
		var scrollHeight = document.documentElement.scrollHeight;
		var browserHeight = document.documentElement.clientHeight;
		height = scrollHeight;

	} else if ( browser.safari ){ //Chrome || Safari
		height = document.body.scrollHeight;
	} else if ( browser.firefox ){ // Firefox || NS
		var bodyHeight = document.body.clientHeight;
		height = window.innerHeight < bodyHeight ? bodyHeight : window.innerHeight;
	} else if ( browser.opera ){ // Opera
		var bodyHeight = document.body.clientHeight;
		height = window.innerHeight < bodyHeight ? bodyHeight : window.innerHeight;
	}

	$(".mask").width(width);
	$(".mask").height(height);
	$(".mask").fadeTo(1000, 0.7);
	$(".video_fremebox").fadeTo(1000,1);
	//$(".video_but").hide();
	if (gubun == "PC")
		controllable_player.playVideo();
}
/********************** 모바일 카스 **********************/

function ks_share_mobile(job, job_explain, test_idx, job_imgurl)
{
	Kakao.API.request( {
		url : '/v1/api/story/linkinfo',
		data : {
			url : 'http://www.dreamfull.or.kr/tomorrowkids/ks'
		}
	}).then(function(res) {
		// 이전 API 호출이 성공한 경우 다음 API를 호출합니다.
		return Kakao.API.request( {
			url : '/v1/api/story/post/link',
			data : {
			link_info : {
				url : 'http://www.dreamfull.or.kr/tomorrowkids/ks',
				host : 'www.dreamfull.or.kr',
				title : '내일을 부탁해',
				image : [job_imgurl],
				description : '내일(work)이 모여 아이들의 내일(Tomorrow)이 만들어집니다.'
			},
			content : "당신에게 어울리는 내일은\n " + job + "입니다!"
			},
			success: function(res) {
				alert("카카오스토리에 당신에게 어울리는 내일이 공유 되었습니다.");
				$.ajax({
					type     : "POST",
					async    : false,
					url      : "../main_exec.php",
					data     : ({
						"exec"     : "update_user_share" ,
						"test_idx" : test_idx,
						"share_gubun" : 'ks'
					}),
					success: function(response){
						var width = $(window).width();
						//var height = $(window).height();

						var height = 0;

						if( browser.msie ){ //IE
							var scrollHeight = document.documentElement.scrollHeight;
							var browserHeight = document.documentElement.clientHeight;
							height = scrollHeight;

						} else if ( browser.safari ){ //Chrome || Safari
							height = document.body.scrollHeight;
						} else if ( browser.firefox ){ // Firefox || NS
							var bodyHeight = document.body.clientHeight;
							height = window.innerHeight < bodyHeight ? bodyHeight : window.innerHeight;
						} else if ( browser.opera ){ // Opera
							var bodyHeight = document.body.clientHeight;
							height = window.innerHeight < bodyHeight ? bodyHeight : window.innerHeight;
						}

						$(".mask").width(width);
						$(".mask").height(height);
						$(".mask").fadeTo(1000, 0.7);
						$("#email_div").fadeIn(500);
					//$("#video_fremebox").fadeIn(500);
		  /*if (confirm("공유가 완료되었습니다. 직접 후원에도 참여하시겠습니까?")){
						//window.open("http://www.naver.com","newWindow","scrollbars=yes,toolbar=yes,location=yes,resizable=yes,status=yes,menubar=yes,resizable=yes");
						var openNewWindow = window.open("about:blank");
						openNewWindow.location.href = "http://www.naver.com";
					} */
					}
				}); 
			}
		});
	});	
  // kakao.link("story").send({
  //   post : "http://www.dreamfull.or.kr/tomorrowkids/ks",
  //   appid : "http://www.dreamfull.or.kr/tomorrowkids/ks",
  //   appver : "1.0",
  //   appname : "내일을 부탁해",
  //   urlinfo : JSON.stringify({title:"내일을 부탁해", desc:"당신에게 어울리는 내일은 " + job + " 입니다.", imageurl:[job_imgurl], type:"article"})
  // });
}


/********************** 공유하기 **********************/
var curURL=location.href;
var curTitle = document.getElementsByTagName("TITLE")[0].text;

function go_direct_donation(test_idx,gubun)
{
	$.ajax({
		type		: "POST",
		async		: false,
		url			: "../main_exec.php",
		data		: ({
			"exec"         : "update_user_donation",
			"test_idx" : test_idx
		}),
    success: function (response) {
      $("#donation_div").fadeOut(500);
      $(".mask").fadeOut(500);
      location.href="index.php";
	  if (gubun == "PC")
		window.open("http://www.dreamfull.or.kr/app/newdf/donation/collection_box_detail?themeNo=201401070002");
	  else
		window.open("http://dreamfull.mobilefarms.com/?link=by6och9o");
    }
    
	});

}

function show_sns_select_box(media)
{
	if( "facebook" == media){
		$("#sns_select_box_01").show();
	}else {
		$("#sns_select_box_02").show();
	}
}

function kt_share(job, job_explain, test_idx, job_imgurl, user_nickname)
{
	Kakao.Link.sendTalkLink({
		//container: '#kakao-link-btn',
		label: "저에게 어울리는 내일은 " + job + "입니다. 당신도 한번 테스트해 보세요.",
		image: {
			src: job_imgurl,
			width: '300',
			height: '200'
		},
		webButton: {
			text: '내일을 부탁해',
			url: 'http://www.dreamfull.or.kr/tomorrowkids/kt'
		}
	});
  
	setTimeout("kt_ajax("+test_idx+")",5000);
}

function kt_ajax(test_idx)
{
	$.ajax({
		type     : "POST",
		async    : false,
		url      : "../main_exec.php",
		data     : ({
			"exec"     : "update_user_share" ,
			"test_idx" : test_idx,
			"share_gubun" : 'kt'
		}),
		success: function(res) {
			var width = $(window).width();
			var height = $(window).height();
			$(".mask").width(width);
			$(".mask").height(height);
			$(".mask").fadeTo(1000, 0.7);
			$("#email_div").fadeIn(500);
//			if(confirm("공유가 완료되었습니다. 직접 후원에도 참여하시겠습니까?")){
//				window.open("http://www.naver.com/");
//			}
		}
	});
}

function ks_share(job, job_explain, test_idx, job_imgurl)
{
	var url = "http://www.tomorrowkids.or.kr/?media=ks";
	var newwindow;

	var kakaoUrl = "https://story.kakao.com/share?";

	var linkUrl = url;
	var title = "나는 " + job + "!! 당신에게 어울리는 직업은?";
	var summary = "당신은 내일을 꿈꾸며 살아가고 있습니다. 당신에게 어울리는 직업을 찾아보세요!";
	//summary = summary.substring(0,100);

	var arr = [];
	arr.push("url=" + encodeURIComponent(linkUrl));
	arr.push("img=" + encodeURIComponent(job_imgurl));
	arr.push("title=" + encodeURIComponent(title));
	arr.push("summary=" + encodeURIComponent(summary));

	url += arr.join("&");
	var param = encodeURIComponent(url);

	kakaoUrl += ('url=' + param);

	var w = 530;
	var h = 480;
	var dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : screen.left;
	var dualScreenTop = window.screenTop !== undefined ? window.screenTop : screen.top;
	var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
	var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
	var left = ((width / 2) - (w / 2)) + dualScreenLeft - 20;
	var top = ((height / 2) - (h / 2)) + dualScreenTop + 30;
	newwindow = window.open(kakaoUrl, 'kakaoPopup', 'toolbar=0, status=0, width=530, height=480, top=' + top + ',left=' + left);

/*
	// 로그인 창을 띄웁니다.
	Kakao.Auth.login({
		success: function(authObj) {
			// 로그인 성공시 API를 호출합니다.
			Kakao.API.request({
				url: '/v1/user/me',
				success: function(res) {
					jsonStr = JSON.stringify(res);
					obj = JSON.parse(jsonStr);
					ka_access_token = Kakao.Auth.getAccessToken();
					ka_refresh_token = Kakao.Auth.getRefreshToken();

					Kakao.API.request({
						url: '/v1/api/story/isstoryuser',
						success: function(res) {
							var ksUserJsonStr = JSON.stringify(res);
							var ksUserObj = JSON.parse(ksUserJsonStr);
							var isStoryUser = ksUserObj.isStoryUser;

							// 카카오스토리 유저일 때
							if(isStoryUser == true){
								Kakao.API.request( {
									url : '/v1/api/story/linkinfo',
									data : {
										url : 'http://www.dreamfull.or.kr/tomorrowkids/ks'
									}
								}).then(function(res) {
									// 이전 API 호출이 성공한 경우 다음 API를 호출합니다.
									return Kakao.API.request( {
										url : '/v1/api/story/post/link',
										data : {
										link_info : {
											url : 'http://www.dreamfull.or.kr/tomorrowkids/ks',
											host : 'www.dreamfull.or.kr',
											title : '내일을 부탁해',
											image : [job_imgurl],
											description : '내일(work)이 모여 아이들의 내일(Tomorrow)이 만들어집니다.'
										},
										content : "당신에게 어울리는 내일은\n " + job + "입니다!"
										},
										success: function(res) {
											alert("카카오스토리에 당신에게 어울리는 내일이 공유 되었습니다.");
											$.ajax({
												type     : "POST",
												async    : false,
												url      : "../main_exec.php",
												data     : ({
													"exec"     : "update_user_share" ,
													"test_idx" : test_idx,
													"share_gubun" : 'ks'
												}),
												success: function(response){
													var width = $(window).width();
													//var height = $(window).height();

													var height = 0;

													if( browser.msie ){ //IE
														var scrollHeight = document.documentElement.scrollHeight;
														var browserHeight = document.documentElement.clientHeight;
														height = scrollHeight;

													} else if ( browser.safari ){ //Chrome || Safari
														height = document.body.scrollHeight;
													} else if ( browser.firefox ){ // Firefox || NS
														var bodyHeight = document.body.clientHeight;
														height = window.innerHeight < bodyHeight ? bodyHeight : window.innerHeight;
													} else if ( browser.opera ){ // Opera
														var bodyHeight = document.body.clientHeight;
														height = window.innerHeight < bodyHeight ? bodyHeight : window.innerHeight;
													}

													$(".mask").width(width);
													$(".mask").height(height);
													$(".mask").fadeTo(1000, 0.7);
													$("#email_div").fadeIn(500);
												}
											}); 
										}
									});
								});
							// 카카오스토리 유저 아닐 때
							}else { 
								alert("카카오스토리 이용자가 아닙니다. 가입하신 후 이용해주세요.");
								window.open("https://story.kakao.com/");
							}
						}
					});

				},
				fail : function(res) {
					alert(JSON.stringify(res));
				}
			});

		},
	});
*/
}

function fb_share(job, job_explain, test_idx, job_num)
{
	var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('http://www.dreamfull.or.kr/app/newdf/tomorrowkids/fb/?job_idx='+ job_num),'sharer','toolbar=0,status=0,width=600,height=325');
/*
	$.ajax({
		type     : "POST",
		async    : false,
		url      : "../main_exec.php",
		data     : ({
			"exec"     : "update_user_share" ,
			"test_idx" : test_idx,
			"share_gubun" : 'fb'
		})
	});
	var width = $(window).width();
	//var height = $(window).height();
	
	var height = 0;

	if( browser.msie ){ //IE
		var scrollHeight = document.documentElement.scrollHeight;
		var browserHeight = document.documentElement.clientHeight;
		height = scrollHeight;

	} else if ( browser.safari ){ //Chrome || Safari
		height = document.body.scrollHeight;
	} else if ( browser.firefox ){ // Firefox || NS
		var bodyHeight = document.body.clientHeight;
		height = window.innerHeight < bodyHeight ? bodyHeight : window.innerHeight;
	} else if ( browser.opera ){ // Opera
		var bodyHeight = document.body.clientHeight;
		height = window.innerHeight < bodyHeight ? bodyHeight : window.innerHeight;
	}

	$(".mask").width(width);
	$(".mask").height(height);

	$(".mask").fadeTo(1000, 0.7);
	$("#email_div").fadeIn(500);
*/
}

function fb_share2(job, job_explain, test_idx, job_num)
{
	FB.ui(
	{
		'method': 'share',
		'href': 'http://www.tomorrowkids.or.kr/PC/work_test_result2.php'
	},
		function(response) {
			if (response == "") {
				$.ajax({
					type     : "POST",
					async    : false,
					url      : "../main_exec.php",
					data     : ({
						"exec"     : "update_user_share" ,
						"test_idx" : test_idx,
						"share_gubun" : 'fb'
					})
				});
				var width = $(window).width();
				//var height = $(window).height();
				
				var height = 0;

				if( browser.msie ){ //IE
					var scrollHeight = document.documentElement.scrollHeight;
					var browserHeight = document.documentElement.clientHeight;
					height = scrollHeight;

				} else if ( browser.safari ){ //Chrome || Safari
					height = document.body.scrollHeight;
				} else if ( browser.firefox ){ // Firefox || NS
					var bodyHeight = document.body.clientHeight;
					height = window.innerHeight < bodyHeight ? bodyHeight : window.innerHeight;
				} else if ( browser.opera ){ // Opera
					var bodyHeight = document.body.clientHeight;
					height = window.innerHeight < bodyHeight ? bodyHeight : window.innerHeight;
				}

				$(".mask").width(width);
				$(".mask").height(height);

				$(".mask").fadeTo(1000, 0.7);
				$("#email_div").fadeIn(500);

				/*
				if(confirm("공유가 완료되었습니다. 직접 후원에도 참여하시겠습니까?")){
					window.open("http://www.naver.com/");
				}else{
					location.href="index.php";
				}
				*/
			}
		}
	);
}

/********************** 카카오톡 **********************/


function kakao_login(){
	// 로그인 창을 띄웁니다.
	Kakao.Auth.login({
		success: function(authObj) {
			// 로그인 성공시 API를 호출합니다.
			Kakao.API.request({
				url: '/v1/user/me',
				success: function(res) {
					jsonStr = JSON.stringify(res);
					obj = JSON.parse(jsonStr);
					ka_access_token = Kakao.Auth.getAccessToken();
					ka_refresh_token = Kakao.Auth.getRefreshToken();
          
					Kakao.API.request({
						url: '/v1/api/talk/profile',
						success: function(res) {
							profileJsonStr = JSON.stringify(res);
							profileObj = JSON.parse(profileJsonStr);
							kaUserImage = profileObj.thumbnailURL;
							kaUserProfile = profileObj.nickName;
							$.ajax({
								type     : "POST",
								async    : false,
								url      : "../main_exec.php",
								data     : ({
									"exec" : "ka_user_info" ,
									"kaUserId" : obj.id,
									"kaUserImage" : kaUserImage,
									"kaNickname"  : kaUserProfile
								}),
								success: function(response){
									$.ajax({
										type		: "POST",
										async		: false,
										url			: "../main_exec.php",
										data		: ({
											"exec"         : "user_test_check"
										}),
										success: function(response){
											//if (response == "Y")
											//{
												location.href="work_test.php";
											//}else{
											//	alert("테스트는 3번까지만 하실 수 있습니다.");
											//}
										}
									});
								}
							}); 
						}
					});
				},
				fail : function(res) {
					alert(JSON.stringify(res));
				}
			});
		},
	});
}

/********************** 페이스북 **********************/
      
var _fbUserId;
var accessToken;

function statusChangeCallback(response) {
	console.log('statusChangeCallback');
	console.log(response);
	
	if (response.status === 'connected') {
		_fbUserId = response.authResponse.userID;
		accessToken = response.authResponse.accessToken;	
		// Logged into your app and Facebook.
	} else if (response.status === 'not_authorized') {
		// The person is logged into Facebook, but not your app.
	} else {
		// The person is not logged into Facebook, so we're not sure if
		// they are logged into this app or not.
	}
}

function checkLoginState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}

// Here we run a very simple test of the Graph API after login is
// successful.  See statusChangeCallback() for when this call is made.

function testAPI() {
	FB.api('/me', function(response) {
		alert('111');
	});
}

// 페이스북 로그인
function facebook_login()
{
	//if( navigator.userAgent.match('CriOS') ){
	//	window.open('https://www.facebook.com/dialog/oauth?client_id=293604627507652&redirect_uri='+ document.location.href +'&scope=public_profile,email', '', null);
	//}else{
		FB.login(function(response){
			_fbUserId = response.authResponse.userID;
			accessToken = response.authResponse.accessToken;
		_fbUserImage = "http://graph.facebook.com/" + _fbUserId + "/picture?type=square"
			$.ajax({
				type     : "POST",
				async    : false,
				url      : "../main_exec.php",
				data     : ({
					"exec" : "fb_user_info" ,
					"fbUserId" : _fbUserId,
					"fbUserImage" : _fbUserImage
				}),
				success: function(response){
					$.ajax({
						type		: "POST",
						async		: false,
						url			: "../main_exec.php",
						data		: ({
							"exec"         : "user_test_check"
						}),
						success: function(response){
							//if (response == "Y")
							//{
								location.href="work_test.php"; 
							//}else{
							//	alert("테스트는 3번까지만 하실 수 있습니다.");
							//}
						}
					});
					/*
					if(response == "Y"){
						testAPI();
						return;
					}else{
						return;
					}
					*/
				}
			}); 
			//location.href="work_test.php"; 
		},{scope: 'public_profile,email'});
	//}
}

function facebook_logout()
{
	FB.logout(function(response) {
	// Person is now logged out
	});
}


function go_test(num, val)
{
	if (num > 10)
	{
		$(".mask").fadeTo(1000,0.7);
		$.ajax({
			type		: "POST",
			async		: false,
			url			: "../main_exec.php",
			data		: ({
				"exec"         : "insert_test_result",
				"selected_val" : val
			}),
			success: function(response){
				var res_result = response.split("|");
				/*
				if (response == "N")
				{
					alert("공유를 통한 기부는 3번까지만 하실 수 있습니다.");
				}else{
					location.href = "work_test_result.php?job=" + response;
				}
				*/
				//location.href = "work_test_result.php?job=" + res_result[0] + "&idx=" + res_result[1];
				location.href = "work_test_result_" + res_result[0] + ".php?idx=" + res_result[1];
			}
		});
	}else{
		$.ajax({
			type		: "POST",
			async		: false,
			url			: "./ajax_worktest.php",
			data		: ({
				"test_idx"     : num,
				"selected_val" : val
			}),
			success: function(response){
				$("#sel_value").val("");
				$("#selected_answer").val("");
				$("#test_div").html(response);
			}
		});
	}
}

function save_info(idx)
{
	$("#sel_value").val(idx);
}

var flag_num = 0;

function go_next_question_mobile(idx,num, selected_val)
{
	var idx_gubun = idx % 2;
	var param1 = "";
	var param2 = "";
	var sel_val = idx;
	var gubun   = "";

	if (idx_gubun > 0)
	{
		param1 = "answer_al_2";
	}else{
		param1 = "answer_al_1";
	}

	$('#' + param1).fadeOut(300,function(){$('#' + param1).css("visibility","hidden‌​").css("visibility","hidden‌​");}).promise().done(function() {

		if (sel_val == "")
		{
			alert('하나의 답변을 꼭 선택해 주세요.');
			if (num == 2)
				location.href="work_test.php";
			return false;
		}

		if (num > 10)
		{
			flag_num = flag_num + 1;

			if (flag_num > 1)
			{
				return false;
			}

		}
	  
		if (selected_val == "")
			gubun = "";
		else
			gubun = "|";

		sel_val = selected_val + gubun + sel_val;
		go_test(num, sel_val);
	});
}

function go_next_question(idx,num, selected_val)
{
	 //id="answer_al_1
	var idx_gubun = idx % 2;
	var param1 = "";
	var param2 = "";
	var sel_val = idx;
	var gubun   = "";

	if (idx_gubun > 0)
	{
		param1 = "answer_al_2";
		param2 = "answer2";
	}else{
		param1 = "answer_al_1";
		param2 = "answer1";
	}

	$('#' + param1).fadeOut(300,function(){$('#' + param1).css("visibility","hidden‌​").css("visibility","hidden‌​");});
	$('#' + param2).fadeOut(300,function(){$('#' + param2).css("visibility","hidden‌​").css("visibility","hidden‌​");}).promise().done(function() {
		if (sel_val == "")
		{
			alert('하나의 답변을 꼭 선택해 주세요.');
			if (num == 2)
				location.href="work_test.php";
			return false;
		}

		if (num > 10)
		{
			flag_num = flag_num + 1;

			if (flag_num > 1)
			{
				return false;
			}

		}
	  
		if (selected_val == "")
			gubun = "";
		else
			gubun = "|";

		sel_val = selected_val + gubun + sel_val;
		go_test(num, sel_val);
	});

}

// 이메일 입력
function input_email(val)
{
	$("#email2").val(val);
  if (val == "")
  {
    $("#email2").attr('readonly',false);
  }else {
    $("#email2").attr('readonly',true);    
  }
}

// 이미지 리사이징 함수
function fitImageSize(obj, href) {
	var image = new Image();

	image.onload = function(){

		var maxWidth = $(".imgbox").width();
		var maxHeight = $(".imgbox").height();

		var width = image.width;
		var height = image.height;
		
		var scalex = maxWidth / width;
		var scaley = maxHeight / height;
		
		var scale = (scalex < scaley) ? scalex : scaley;
		if (scale > 1) 
			scale = 1;
		
		obj.width = scale * width;
		obj.height = scale * height;
		
		var div_height = scale * height;
		var div_width = scale * width + 2;
		obj.style.display = "";
	
		$(".imgbox").css("height", div_height);
		$(".imgbox").css("width", div_width);
	}
	image.src = href;
}

function test_start()
{
	$.ajax({
		type     : "POST",
		async    : false,
		url      : "../main_exec.php",
		data     : ({
			"exec" : "insert_user_info"
		}),
		success: function(response){
			location.href="work_test.php";
		}
	}); 
}