Kakao.init('5675f40b361955e0b3fcf93944b5d444');
var jsonStr;
var obj;
var ka_access_token;
var ka_refresh_token;
/********************** 모바일 카스 **********************/

function ks_share_mobile()
{
	$.ajax({
		type     : "POST",
		async    : false,
		url      : "../main_exec.php",
		data     : ({
			"exec" : "update_user_share"
		}),
		success: function(res) {
		}
	}); 
  
  kakao.link("story").send({
    post : curURL,
    appid : "www.tomorrowkids.or.kr",
    appver : "1.0",
    appname : "Tomorrow Kids",
    urlinfo : JSON.stringify({title:curTitle, desc:"내일(work)이 모여 아이들의 내일(Tomorrow)이 만들어집니다.", imageurl:["http://topgirl.thefaceshop.com/philippines/PC/images/sns/gift_for_voter_mini.png"], type:"article"})
  });
}


/********************** 공유하기 **********************/
var curURL=location.href;
var curTitle = document.getElementsByTagName("TITLE")[0].text;

function go_direct_donation()
{
	$.ajax({
		type		: "POST",
		async		: false,
		url			: "../main_exec.php",
		data		: ({
			"exec"         : "update_user_donation"
		})
	});
}

function show_sns_select_box()
{
	alert("<?php echo $_SESSION['ss_media']?>");
  if( "facebook" == "<?php echo $_SESSION['ss_media']?>"){
  	$("#sns_select_box_01").show();    
  }else {
  	$("#sns_select_box_02").show();    
  }
/*
	$.ajax({
		type		: "POST",
		async		: false,
		url			: "../main_exec.php",
		data		: ({
			"exec"         : "user_test_check"
		}),
		success: function(response){
			if (response == "Y")
				$("#sns_select_box").show();
			else
				alert("공유를 통한 기부는 3번까지만 하실 수 있습니다.");
		}
	});
*/
}

function kt_share()
{   
	$.ajax({
		type     : "POST",
		async    : false,
		url      : "../main_exec.php",
		data     : ({
			"exec" : "update_user_share"
		}),
		success: function(res) {
    }
	}); 
  
  Kakao.Link.sendTalkLink({
    label: 'Tomorrow Kids',
    image: {
      src: 'http://topgirl.thefaceshop.com/philippines/PC/images/sns/gift_for_voter_mini.png',
      width: '300',
      height: '200'
    },
    webButton: {
      text: 'Tomorrow Kids',
      url: 'http://www.tomorrowkids.or.kr'
    }
  });
}

function ks_share()
{ 
  Kakao.API.request( {
    url : '/v1/api/story/linkinfo',
    data : {
      url : 'http://www.tomorrowkids.or.kr'
    }
  }).then(function(res) {
    // 이전 API 호출이 성공한 경우 다음 API를 호출합니다.
    return Kakao.API.request( {
      url : '/v1/api/story/post/link',
      data : {
        link_info : {
          url : 'http://www.tomorrowkids.or.kr',
          host : 'www.tomorrowkids.or.kr',
          title : 'Tomorrow Kids',
          description : '내일(work)이 모여 아이들의 내일(Tomorrow)이 만들어집니다.'
        },
        content : '내일(work)이 모여 아이들의 내일(Tomorrow)이 만들어집니다.'
      },
      success: function(res) {
    		$.ajax({
    			type     : "POST",
    			async    : false,
    			url      : "../main_exec.php",
    			data     : ({
    				"exec" : "update_user_share"
    			})
    		}); 
      }
    });
  }).then(function(res) {
    return Kakao.API.request( {
      url : '/v1/api/story/mystory',
      data : { id : res.id }
    });
  }).then(function(res) {
    document.getElementById('post-result').innerHTML = JSON.stringify(res);
  }, function (err) {
    alert(JSON.stringify(err));
  });

}

function fb_share()
{
	FB.ui(
	  {
		method: 'feed',
		name: 'Tomorrow Kids',
		link: 'http://www.tomorrowkids.or.kr',
		picture: 'http://topgirl.thefaceshop.com/philippines/PC/images/sns/gift_for_voter_mini.png',
		caption: 'http://www.tomorrowkids.or.kr',
		description: '내일(work)이 아이들의 내일(tomorrow)이 됩니다.'
	  },
		function(response) {
			if (response && response.post_id) {
    		$.ajax({
    			type     : "POST",
    			async    : false,
    			url      : "../main_exec.php",
    			data     : ({
    				"exec" : "update_user_share" ,
    			})
    		}); 
				location.href="index.php";
			} 
			else {
				location.href="index.php";
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
					$.ajax({
						type     : "POST",
						async    : false,
						url      : "../main_exec.php",
						data     : ({
							"exec" : "ka_user_info" ,
							"kaUserId" : obj.id
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
									if (response == "Y")
									{
										location.href="work_test.php";
									}else{
										alert("공유를 통한 기부는 3번까지만 하실 수 있습니다.");
									}
								}
							});
						}
					});
				},
				fail: function(error) {
				}
			});
		},
		fail: function(err) {
		}
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

window.fbAsyncInit = function() {
	FB.init({
		appId      : '293604627507652',
		cookie     : true,  // enable cookies to allow the server to access 
						// the session
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.1' // use version 2.1
	});

	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});

};

// Load the SDK asynchronously
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

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
	FB.login(function(response){
		_fbUserId = response.authResponse.userID;
		accessToken = response.authResponse.accessToken;
		$.ajax({
			type		: "POST",
			async		: false,
			url			: "../main_exec.php",
			data		: ({
				"exec"         : "user_test_check"
			}),
			success: function(response){
				if (response == "Y")
				{
					$.ajax({
						type     : "POST",
						async    : false,
						url      : "../main_exec.php",
						data     : ({
							"exec" : "fb_user_info" ,
							"fbUserId" : _fbUserId
						}),
						success: function(response){
							/*
							if(response == "Y"){
								testAPI();
								return;
							}else{
								return;
							}
							*/
							location.href="work_test.php"; 
						}
					}); 
				}else{
					alert("공유를 통한 기부는 3번까지만 하실 수 있습니다.");
				}
			}
		});
		//location.href="work_test.php"; 
	},{scope: 'public_profile,email'});
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
		$.ajax({
			type		: "POST",
			async		: false,
			url			: "../main_exec.php",
			data		: ({
				"exec"         : "insert_test_result",
				"selected_val" : val
			}),
			success: function(response){
				/*
				if (response == "N")
				{
					alert("공유를 통한 기부는 3번까지만 하실 수 있습니다.");
				}else{
					location.href = "work_test_result.php?job=" + response;
				}
				*/
				location.href = "work_test_result.php?job=" + response;
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
				$("#test_div").html(response);
			}
		});
	}
}

function save_info(idx)
{
	$("#sel_value").val(idx);
}

function go_next_question(num, selected_val)
{
	var sel_val = $("#sel_value").val();
	var gubun   = "";
	if (sel_val == "")
	{
		alert('하나의 답변을 꼭 선택해 주세요.');
		return false;
	}

	if (selected_val == "")
		gubun = "";
	else
		gubun = "|";

	sel_val = selected_val + gubun + sel_val;
	go_test(num, sel_val);
}
