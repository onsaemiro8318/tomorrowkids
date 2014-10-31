<?php
   $uploadfile1="http://www.tomorrowkids.or.kr/images/jobimg_49.jpg";
   $uploadfile2="http://www.tomorrowkids.or.kr/images/jobimg_50.jpg";
   $ch = curl_init("https://kapi.kakao.com/v1/api/story/upload/multi");
   curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Bearer xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"));
   curl_setopt($ch, CURLOPT_POSTFIELDS, array('file[0]'=>"@$uploadfile1", 'file[1]'=>"@$uploadfile2"));
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $postResult = curl_exec($ch);
   curl_close($ch);
   print_r($postResult);
   print_r("111");
?>
<!doctype HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>Login Demo - Kakao Javascript SDK</title>
<script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>
<body>
<div id="loginArea" style="display:none"><a href="#none" onclick="login()">카카오계정로그인</a></div>
<div id="logoutArea" style="display:none"><a href="#none" onclick="logout()">로그아웃</a></div>


<div>현재상태 : <span id="curStat"></span></div>
<div>ID : <span id="userId"></span></div>
<div>닉네임 : <span id="userNk"></span></div>
<div>썸네일 : <span id="userTh"></span></div>
<!--div>프로필 : <span id="userPf"></span></div-->




<br><br>
<!--a href="#none" onclick="_getAccessToken()">getAccessToken()</a><br><br-->
<!--a href="#none" onclick="_getRefreshToken()">getRefreshToken()</a><br><br-->
<div id="schemeFileDiv">
</div>
<br>
<textarea id="storyCont" style="width:400px;height:200px"></textarea><br>
<a href="#none" onclick="_storyNote()">스토리 글쓰기</a> &nbsp; <a href="#none" onclick="_storyPhoto()">스토리 사진첨부 글쓰기</a><br><br>

<a href="#none" onclick="_storyNote2()">특정 스토리 글쓰기</a>

<a href="#none" onclick="_pushMsg()">메시지 푸시</a><br><br>


<div id="storyMyList"></div>

<div id="post-result"></div>
<img src="" id="post-image">

<script>
Kakao.init('5675f40b361955e0b3fcf93944b5d444');

_getStatus();

function _getStatus()
{
 Kakao.Auth.getStatus(function(obj){
  $("#curStat").html(obj.status);
  if(obj.status=="connected")
  {
   $("#loginArea").hide();
   $("#logoutArea").show();
   $("#userId").html(obj.user.id);
   $("#userNk").html(obj.user.properties.nickname);
   $("#userTh").html("<img src=\""+obj.user.properties.thumbnail_image+"\">");
   //$("#userPf").html("<img src=\""+obj.user.properties.profile_image+"\">");

   _getStories();
  }
  else
  {
   $("#loginArea").show();
   $("#logoutArea").hide();
   $("#userId").html("");
   $("#userNk").html("");
   $("#userTh").html("");
   //$("#userPf").html("");
   $("#storyMyList").html("");
  }
 });
}
function _pushMsg()
{
}
function _getStories()
{
 alert("getStories");
 Kakao.API.request({
  url     : '/v1/api/story/mystories',
  success : function(obj){
   for(var i=0; i<obj.length ; ++i)
   {
    if(obj[i].media_type=="PHOTO")
    {
     $("#storyMyList").html($("#storyMyList").html() + obj[i].content);
     $("#storyMyList").html($("#storyMyList").html() + "<br>");
     for(var j=0; j<obj[i].media.length; ++j)
     {
      $("#storyMyList").html($("#storyMyList").html() + "<img src=\"" + obj[i].media[j].small + "\">");
     }
     $("#storyMyList").html($("#storyMyList").html() + "<br><br>");
    }
    else
    {
     $("#storyMyList").html($("#storyMyList").html() + obj[i].content + "<br><br>");
    }
   }
  },
  fail : function(obj){
   alert("스토리 가져오기 실패");
   $("#storyMyList").html("");
  },
  always : function(obj){
   alert("스토리 종료");
  }
 });
}
function _storyNote() {
 // API를 호출합니다.
 Kakao.Auth.getStatus(function(obj) {
  if (obj.status == "connected") {
   Kakao.API.request({
    url     : '/v1/api/story/post/note',
    data    : {content:$("#storyCont").val()},
    success : function(obj){alert("글 등록 완료");_getStories();}
   });
  }
  else
  {
   alert("로그인후 사용해주세요.");
  }
 });
}
function _storyNote2() {
 // API를 호출합니다.
 Kakao.Auth.getStatus(function(obj) {
  if (obj.status == "connected") {
   Kakao.API.request({
    url     : '/v1/api/story/post/note',
    data    : {content:"광고문구입력"},
    success : function(obj){alert("글 등록 완료");_getStories();}
   });
  }
  else
  {
   alert("로그인후 사용해주세요.");
  }
 });
}

function _storyPhoto() {
 Kakao.Auth.getStatus(function(obj) {
  if (obj.status == "connected") {
   // API를 호출합니다.
   Kakao.API.request({
    url   : '/v1/api/story/upload/multi',
    files : document.getElementById("storyFile").files
   }).then(function (res) {
    // 이전 API 호출이 성공한 경우 다음 API를 호출합니다.
    return Kakao.API.request({
     url  : '/v1/api/story/post/photo',
     data : {
      content        : $("#storyCont").val(),
      image_url_list : res
     }
    });
   }).then(function (res) {
    return Kakao.API.request({
     url  : '/v1/api/story/mystory',
     data : { id: res.id }
    });
   }).then(function (res) {
    document.getElementById('post-result').innerHTML = JSON.stringify(res);
    document.getElementById('post-image').src = res.media[0].original;
    _getStories();
   }, function(err) {
   alert(JSON.stringify(err));
   });
  } else {
   alert("로그인후 사용해주세요.");
  }
 });
}

function _getAccessToken() {
 alert(Kakao.Auth.getAccessToken());
}
function _getRefreshToken() {
 alert(Kakao.Auth.getRefreshToken());
}

function login() {
 // 로그인 창을 띄웁니다.
 Kakao.Auth.login({
  success: function(obj) {
   alert(JSON.stringify(obj));
   _getStatus();
  }
 });
}
function logout() {
 // 로그인 창을 띄웁니다.
 Kakao.Auth.logout(
  function(obj) {
   if(obj==true)
   {
    _getStatus();
    alert("로그아웃 되었습니다.");
   }
   else
   {
    alert("로그아웃 실패하였습니다.");
   }
  }
 );
}



function KAKAO_Send(){
 Kakao.Auth.login({
  success: function(obj) {
   Kakao.Auth.getStatus(function(obj) {
    if (obj.status == "connected") {
     Kakao.API.request({
      url     : '/v1/api/story/post/note',
      data    : {content:"테스트입력합니다."},
      success : function(obj){
       alert("글 등록 완료");
       window.open("https://story.kakao.com/","","");
      }
     });
    }
    else
    {
     alert("카카오톡 로그인후 사용할 수 있습니다.");
    }
   });
  }
 });
}

	function fncSelectFile(){

		document.getElementById("schemeFileDiv").innerHTML = "<input type='file' name='storyFile' id='storyFile' value='http://www.tomorrowkids.or.kr/images/jobimg_49.png'>";		
		
	 }

    $(document).ready(function(){
		fncSelectFile();
    });

</script>


<!--
<script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
function KAKAO_Send(){

Kakao.init('df7434c0c4f4657c3f1bd2e96e88e6b6'); //abrand 아크네스 key
 Kakao.Auth.login({
  success: function(obj) {
   Kakao.Auth.getStatus(function(obj) {
    if (obj.status == "connected") {
     Kakao.API.request({
      url     : '/v1/api/story/post/note',
      data    : {
       content:"[아크네스] 회원 가입하고 포텐포인트 받으세요. http://www.mentholatum-acnes.co.kr/promotion/1407/event01.php"},
      success : function(obj){
       if(confirm('카카오스토리에 등록하였습니다. 확인하시겠습니까?')){
        window.open("https://story.kakao.com/","","");
       }
      }
     });
    }
    else
    {
     alert("카카오톡 로그인후 사용할 수 있습니다.");
    }
   });
  }
 });
}
-->
</body>
</html>