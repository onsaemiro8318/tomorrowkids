/********************** 카카오톡 **********************/

Kakao.init('5675f40b361955e0b3fcf93944b5d444');
var jsonStr;
var obj;
var ka_access_token;
var ka_refresh_token;

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
               type    : "POST",
               async    : false,
               url      : "../PC/main_exec.php",
               data    : ({
                 "exec" : "ka_user_info" ,
                 "kaUserId" : obj.id
               }),
               success: function(response){
                 if(response == "Y"){
                   return;
                 }else{
                   return;
                 }
               }
             });
             location.href="work_test.php";
          },
          fail: function(error) {
            alert(JSON.stringify(error))
          }
        });
      },
      fail: function(err) {
        alert(JSON.stringify(err))
      }
    });
};

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
	});
}

// 페이스북 로그인
function facebook_login()
{
	FB.login(function(response){
	_fbUserId = response.authResponse.userID;
	accessToken = response.authResponse.accessToken;	
    $.ajax({
      type    : "POST",
      async    : false,
      //AJAX 처리할것 중복응모체크 (아직 안만들었음)
      url      : "../PC/main_exec.php",
      data    : ({
        "exec" : "fb_user_info" ,
        "fbUserId" : _fbUserId
      }),
      success: function(response){
        if(response == "Y"){
          return;
        }else{
          return;
        }
      }
    }); 
    location.href="work_test.php"; 
	},{scope: 'public_profile,email'});
}



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
			//alert(response);
			$("#test_div").html(response);
		}
	});
}
