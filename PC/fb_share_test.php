<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta property="og:type" content="website" />	
		<meta property="og:title" content="모두가 행복해지는 편지 조르기" />	
		<meta property="og:image" content="http://www.skt-lte.co.kr/static/img/facebook_logo1.jpg" />
		<meta property="og:url" content="http://www.skt-lte.co.kr/contents/100letter_event.jsp"/>
		<meta property="og:description" content="너에게 받고 싶은, 100년의 편지\r\n지금 100년의 편지 조르고 행복한 선물도 받자!" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

		<meta property="og:site_name" content="SKT LTE-A" />
		<meta property="fb:app_id" content="293604627507652" />

		<script type='text/javascript' src='../js/jquery-1.11.0.min.js'></script>
		<script type="text/javascript">
			window.fbAsyncInit = function() {
				FB.init({
					appId      : '293604627507652', // 앱 ID
					status     : true,          // 로그인 상태를 확인
					cookie     : true,          // 쿠키허용
					xfbml      : true           // parse XFBML
				});

				FB.getLoginStatus(function(response) {
					if (response.status === 'connected') {
						FB.api('/me', function(user) {
							if (user) {
								$("#user_id").val(user.id);
								$("#user_name").val(user.name);
								$("#member_icon").val('http://graph.facebook.com/' + user.id + '/picture');
								$("#fShare").parent("a").attr("href", "javascript:fnShare()");
								$("#fShare").attr("src", "http://www.skt-lte.co.kr/img/event/btn_join.gif");
							}
						});    
					} else {
						$("#fShare").parent("a").attr("href", "javascript:fnFaceLogin()");
						$("#fShare").attr("src", "http://www.skt-lte.co.kr/img/event/btn_fb_lo.gif ");
					}
				});
				/*
				FB.Event.subscribe('auth.login', function(response) {
					document.location.reload();
				});

				FB.Event.subscribe('auth.logout', function(response) {
					document.location.reload();
				});
				*/

			};

		
			(function(d){
				var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
				js = d.createElement('script'); js.id = id; js.async = true;
				js.src = "//connect.facebook.net/ko_KR/all.js";
				d.getElementsByTagName('head')[0].appendChild(js);
			}(document));

			function fnShare() {
			
				var sIdx = $("#survey_idx").val();
				var sLink = "";
				switch (sIdx) {
					case "58":
						sLink = "http://www.skt-lte.co.kr/contents/letter_1.jsp";
						break;
					case "59":
						sLink = "http://www.skt-lte.co.kr/contents/letter_2.jsp";
						break;
					case "60":
						sLink = "http://www.skt-lte.co.kr/contents/letter_3.jsp";
						break;
					case "61":
						sLink = "http://www.skt-lte.co.kr/contents/letter_4.jsp";
						break;
					case "62":
						sLink = "http://www.skt-lte.co.kr/contents/letter_5.jsp";
						break;
					case "63":
						sLink = "http://www.skt-lte.co.kr/contents/letter_6.jsp";
						break;
				}

				FB.ui({
					app_id: '293604627507652',
					display: 'popup',
					method: 'share',
					name: 'SKT-LTE',
					description: 'SKT-LTE',
					picture: 'http://www.skt-lte.co.kr/static/img/facebook_logo.jpg',
					href: sLink,
				}, function(response){
					$("#etc1").val(response.post_id);
					//alert(response.post_id);
					
					
					if (!response.error_code) {
						console.log(response);
						console.log("success");
						$("#etc1").val(response.post_id);
						//alert(response.post_id);
						alert("이벤트 응모가 완료되었습니다.");
						
					} else {
					//	alert('Error while posting.');
					}
					fnMobileChk();
				});
				
			}

			function fnFaceLogin() {
				FB.login(
					function(response) {
						if (response.authResponse) {
	//						alert("login"); 
							FB.getLoginStatus(function(response) {
								if (response.status === 'connected') {

									FB.api('/me', function(user) {
										if (user) {
											$("#user_id").val(user.id);
											$("#user_name").val(user.name);
											$("#member_icon").val('http://graph.facebook.com/' + user.id + '/picture');
											$("#fShare").parent("a").attr("href", "javascript:fnShare()");
											$("#fShare").attr("src", "http://www.skt-lte.co.kr/img/event/btn_join.gif");
										}
									});    
								} else {
									$("#fShare").parent("a").attr("href", "javascript:fnFaceLogin()");
									$("#fShare").attr("src", "http://www.skt-lte.co.kr/img/event/btn_fb_lo.gif ");
								}
							});
						} else {
						//	alert("??"); 
						}
					}
					, {scope: "publish_stream,offline_access"} 
					// <!-- 이것은 권한 설정 입니다. 현제 담벼락 글남기기 입니다. 자세한건 다음에-->
				);
			}
		</script>
	</head>
 <body>
  <input type="text" id="user_id">
  <input type="text" id="user_name">
  <input type="text" id="member_icon">
  <input type="text" id="etc1">
  <a href="javascript:fnFaceLogin()">페이스북 공유</a>
  <img src="" id="fShare">
 </body>
</html>
