<?php
 $CLIENT_ID     = "187f0043a08d4d040baba387b53e241e";
 $REDIRECT_URI  = "/include/kakao_auth.php";
 $TOKEN_API_URL = "https://kauth.kakao.com/oauth/token";
 
 $code   = $_GET["code"];
 $params = sprintf( 'grant_type=authorization_code&client_id=%s&redirect_uri=%s&code=%s', $CLIENT_ID, $REDIRECT_URI, $code);
 
 $opts = array(
   CURLOPT_URL => $TOKEN_API_URL,
   CURLOPT_SSL_VERIFYPEER => false,
   CURLOPT_SSLVERSION => 3,
   CURLOPT_POST => true,
   CURLOPT_POSTFIELDS => $params,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_HEADER => false
 );
 
 $curlSession = curl_init();
 curl_setopt_array($curlSession, $opts);
 $accessTokenJson = curl_exec($curlSession);
 curl_close($curlSession);
 

 echo "<script>alert('".$accessTokenJson."');</script>";
 echo $accessTokenJson;
?>