<!doctype HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>API Demo - Kakao Javascript SDK</title>
  <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
</head>
<body>
<a id="kakao-login-btn"></a>

<script>
  // 사용할 앱의 Javascript 키를 설정해 주세요.
  Kakao.init('5675f40b361955e0b3fcf93944b5d444');
  // 카카오 로그인 버튼을 생성합니다.
  Kakao.Auth.createLoginButton({
    container: '#kakao-login-btn',
    success: function(authObj) {
      // 로그인 성공시 API를 호출합니다.
      Kakao.API.request({
        url: '/v1/user/me',
        success: function(res) {
          alert(JSON.stringify(res));
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
</script>
</body>
</html>